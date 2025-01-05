<?php

namespace Binkode\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Collection;
// use App\Traits\HasVideo;
// use App\Traits\HasImage;
use Carbon\Carbon;
use Binkode\ChatSystem\Traits\ChatEvent\HasChatEvent;
use Binkode\ChatSystem\Contracts\IChatEventMaker;
use Binkode\ChatSystem\Database\Factories\MessageFactory;
use Binkode\ChatSystem\Config;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Binkode\ChatSystem\Contracts\IMessage;

class Message extends Model implements IMessage
{
  use HasFactory, HasChatEvent;
  protected $fillable = ['conversation_id', 'user_id', 'reply_id', 'reply_type', 'message', 'type', 'metas'];
  protected $casts    = ['conversation_id' => 'int', 'reply_id' => 'int', 'user_id' => 'int', 'metas' => 'array'];
  protected $searches = ['message'];
  protected $appends  = ['isSender'];
  protected $hidden   = ['media'];

  /**
   * adds query to to exclude the given user
   *
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker $user
   * @return QueryBuilder
   */
  function scopeWhereNotSender($q, IChatEventMaker|int $user = null)
  {
    $user_id = $user->id ?? $user ?? auth()->user()->id;
    $q->where('user_id', '!=', $user_id);
  }

  /**
   * adds query condition on the given reply_id and or reply_type
   *
   * @param Array $reply
   * @return QueryBuilder
   */
  function scopeWhereReply($q, $reply)
  {
    $q->when(
      $reply['reply_id'] ?? null,
      fn($q) => $q->whereReplyId($reply['reply_id'])
    )->when(
      $reply['reply_type'] ?? null,
      fn($q) => $q->whereReplyType($reply['reply_type'])
    );
  }

  protected static function newFactory()
  {
    return MessageFactory::new();
  }

  /**
   * adds query where message doesn't have chatEvents
   *
   * @param string|null $type
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker|null $user
   * @param Closure|null $conversationScope
   * @return QueryBuilder
   */
  function scopeWhereDoesntHaveChatEvents($q, $type = null, IChatEventMaker|int $user = null, $conversationScope = null)
  {
    $user_id = $user->id ?? $user ?? auth()->user()->id;

    if ($type == 'delete') {
      $q->whereDoesntHave(
        'chatEvents',
        fn($q) =>
        $q->whereMakerId($user_id)->whereType($type)
      );
    } else {
      $q->whereHas(
        'conversation',
        fn($q) =>
        $q->whereDoesntHave(
          'chatEvents',
          fn($q) =>
          $q->whereMakerId($user_id)
            ->when($type, fn($q) => $q->whereType($type))
            ->whereColumn('created_at', '>', 'messages.created_at')
        )->when($conversationScope, $conversationScope)
      );
    }
  }

  /**
   * adds query where message is not read by the given user
   *
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker|null $user
   * @return QueryBuilder
   */
  function scopeWhereNotReadBy($q, IChatEventMaker|int $user)
  {
    return $q->whereDoesntHaveChatEvents('read', $user);
  }

  /**
   * adds query where message is not delivered to the given user
   *
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker|null $user
   * @return QueryBuilder
   */
  function scopeWhereNotDeliveredTo($q, IChatEventMaker|int $user)
  {
    return $q->whereDoesntHaveChatEvents('deliver', $user);
  }

  /**
   * adds query where message is not deleted by the given user
   *
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker|null $user
   * @return QueryBuilder
   */
  function scopeWhereNotDeletedBy($q, IChatEventMaker|int $user)
  {
    return $q->whereDoesntHaveChatEvents('delete', $user);
  }

  /**
   * adds query where message has participant = user
   *
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker|null $user
   * @return QueryBuilder
   */
  function scopeWhereRelatedTo($q, IChatEventMaker|int $user)
  {
    $q->whereHas(
      'conversation',
      fn($q) =>
      $q->whereHas('participants', fn($q) => $q->whereUserId($user->id ?? $user))
    );
  }

  /**
   * adds query where message has chatEvents
   *
   * @param Closure $eventScope
   * @return QueryBuilder
   */
  function scopeHasEvent($q, callable $eventScope = null)
  {
    $q->whereHas(
      'chatEvents',
      fn($q) =>
      $q->when($eventScope, $eventScope)
    );
  }

  /**
   * adds query where message has no chatEvents
   *
   * @param Closure $eventScope
   * @return QueryBuilder
   */
  function scopeHasNoEvent($q, callable $eventScope = null)
  {
    $q->whereDoesntHave(
      'chatEvents',
      fn($q) =>
      $q->when($eventScope, $eventScope)
    );
  }

  /**
   * query where message's conversation has not been deleted
   *
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker|null $by
   * @return QueryBuilder
   */
  function scopeWhereConversationWasntDeleted($q, IChatEventMaker $by = null)
  {
    $q->whereDoesntHave(
      'conversation',
      fn($q) =>
      $q->whereHas(
        'chatEvents',
        fn($q) =>
        $q->whereType('delete')
          ->whereColumn('created_at', '>', 'messages.created_at')
          ->where(fn($q) => $q->where('all', true)->when($by, fn($q) => $q->orWhere('maker_id', $by->id)))
      )
    );
  }


  function getIsSenderAttribute()
  {
    $user_id = auth()->user()->id ?? null;
    return $user_id === $this->user_id;
  }

  /**
   * > check if message has been deleted by all participants of the conversation message belongs to.
   *
   * @param int|null $maker_id
   * @return bool
   */
  function participantsHasDeleted(int $maker_id = null)
  {
    [$participantsCount, $deleteEventsCount] = [
      $this->conversation->participants()->count(),
      $this->chatEvents(false)->whereType('delete')
        ->when($maker_id, fn($q) => $q->where('maker_id', '!=', $maker_id))
        ->count()
    ];
    return $deleteEventsCount == $participantsCount - 1;
  }

  /**
   * create a chatEvent of type `delete` for the `message` through the given `user`
   *
   * @param IChatEventMaker $user
   * @param bool $all
   * @return Binkode\ChatSystem\Models\ChatEvent
   */
  function makeDelete(IChatEventMaker $user, $all = false)
  {
    return $this->makeChatEvent($user, 'delete', $all);
  }

  /**
   * create a chatEvent of type `read` for the `message` through the given `user`
   *
   * @param IChatEventMaker $user
   * @return Binkode\ChatSystem\Models\ChatEvent
   */
  function makeRead(IChatEventMaker $user)
  {
    return $this->makeChatEvent($user, 'read');
  }

  /**
   * create a chatEvent of type `deliver` for the `message` through the given `user`
   *
   * @param IChatEventMaker $user
   * @return Binkode\ChatSystem\Models\ChatEvent
   */
  function makeDeliver(IChatEventMaker $user)
  {
    return $this->makeChatEvent($user, 'deliver');
  }

  /**
   * create a chatEvent of type `deliver` for the `message` through the given `user`
   *
   * @param IChatEventMaker $user
   * @param string $type
   * @param bool $all
   * @return Binkode\ChatSystem\Models\ChatEvent
   */
  private function makeChatEvent(IChatEventMaker $user, $type = 'read', $all = false)
  {
    $create = [
      'made_id'    => $this->id,
      'made_type'  => $this::class,
      'type'       => $type,
      'all'        => $all,
    ];

    return $user->chatEventMakers()->firstOrCreate($create, $create);
  }

  /**
   * Query participants of the conversation the message belongs to.
   *
   * @param IChatEventMaker $user
   * @return Binkode\ChatSystem\Models\ChatEvent
   */
  public function participants(IChatEventMaker|int $user = null)
  {
    $user_id = $user->id ?? $user ?? null;
    return Config::config('models.conversation_user')::whereHas(
      'conversation',
      fn($q) =>
      $q->whereId($this->conversation_id)->whereHas('participants', fn($q) => $q->when($user_id, fn($q) => $q->whereUserId($user_id)))
    );
  }

  /**
   * Conversation message belongs to.
   *
   * @return BelongsTo
   */
  public function conversation(): BelongsTo
  {
    return $this->belongsTo(Config::config('models.conversation'));
  }

  /**
   * Message has many chat events
   *
   * @param bool $distinctType
   * @return MorphMany
   */
  function chatEvents(bool $distinctType = true): MorphMany
  {
    return $this->morphMany(Config::config('models.chat_event'), 'made')
      ->when($distinctType, fn($q) => $q->distinct('type'))
      ->latest();
  }

  // function latestMedia(){
  //   return $this->morphOne(Media::class, 'model')->latest();
  // }

  /**
   * Message belongs to user
   *
   * @return BelongsTo
   */
  public function sender(): BelongsTo
  {
    return $this->belongsTo(Config::config('models.user'), 'user_id');
  }

  /**
   * Message belongs to message as reply
   *
   * @return MorphTo
   */
  public function reply(): MorphTo
  {
    return $this->morphTo();
  }

  public function newCollection(array $models = array())
  {
    return new MessageCollection($models);
  }
}

class MessageCollection extends Collection
{
  /**
   * Method to mark messages as read,
   * pass a user arg to specify the user reading the messages.
   *
   * @param IChatEventMaker $user
   * @return ChatEvent
   */
  function makeRead($user = null)
  {
    return $this->makeChatEvent($user);
  }

  /**
   * Method to mark messages as deleted,
   * pass a user arg to specify the user deleting the messages.
   * pass a all arg to delete the messages for a participants of the message conversation.
   *
   * @param IChatEventMaker $user
   * @param bool $all
   * @return ChatEvent
   */
  function makeDelete(IChatEventMaker $user = null, $all = false)
  {
    return $this->makeChatEvent($user, 'delete', $all);
  }

  /**
   * Method to mark messages as delivered,
   * pass a user arg to specify the user which messages are being delivered to.
   *
   * @param IChatEventMaker $user
   * @return ChatEvent
   */
  function makeDeliver($user = null)
  {
    return $this->makeChatEvent($user, 'deliver');
  }

  /**
   * Method to make events for messages,
   * pass a user arg to specify the user making the event.
   * pass a type arg to specify the type of the event.
   * pass a all arg to specify the event is for all participant of the conversation message belongs to.
   *
   * @param IChatEventMaker $user
   * @param string $all
   * @param bool $all
   * @return ChatEvent
   */
  private function makeChatEvent(IChatEventMaker $user, $type = 'read', $all = false)
  {
    $create = $this->map(fn($msg) => [
      'made_id'    => $msg->id,
      'made_type'  => $msg::class,
      'type'       => 'delete',
      'all'        => $all ? $msg->user_id === $user->id : false,
    ]);

    return $user->chatEventMakers()->createMany($create);
  }
}
