<?php

namespace Myckhel\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Myckhel\ChatSystem\Jobs\Chat\MakeEvent;
use Carbon\Carbon;
use Myckhel\ChatSystem\Database\Factories\ConversationFactory;
use Myckhel\ChatSystem\Traits\ChatEvent\HasChatEvent;
use Myckhel\ChatSystem\Traits\Config;
use Myckhel\ChatSystem\Contracts\IConversation;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Myckhel\ChatSystem\Contracts\IChatEventMaker;

class Conversation extends Model implements IConversation
{
  use HasFactory, HasChatEvent, Config;
  protected $fillable = ['user_id', 'name', 'type'];
  protected $casts    = ['user_id' => 'int'];
  protected $hidden   = ['pivot'];

  /**
   * Reply a message.
   *
   * @param array $message
   * @return Myckhel\ChatSystem\Models\Message
   */
  function replyMessage(Message|int $reply, array $message) {
    return $this
      ->messages()
      ->create([
        'reply_id' => $reply->id ?? $reply,
        'reply_type' => self::config('models.message'),
      ] + $message);
  }

  /**
   * Creates a message.
   *
   * @param array $message
   * @return Myckhel\ChatSystem\Models\Message
   */
  function createMessage(array $message) {
    return $this
      ->messages()
      ->create($message);
  }

  /**
   * Creates a message with token.
   *
   * @param string|int $token
   * @param array $message
   * @return Myckhel\ChatSystem\Models\Message
   */
  function createMessageWithToken($token, array $message) {
    return $this->messages()
      ->when(
        $token,
        fn ($q) => $q->where('metas->token', $token),
        fn ($q) => $q->whereNull('id')
      )
      ->firstOrCreate([], $message + ['metas' => $token ? ['token' => $token] : null]);
  }

  /**
   * Adds a user as participant of the conversaton.
   *
   * @param Myckhel\ChatSystem\Contracts\IChatEventMaker $user
   * @param string $message
   * @return Myckhel\ChatSystem\Models\ConversationUser
   */
  function addParticipant(IChatEventMaker $user, String $message = 'Someone joined the conversation') {
    $participant = ['user_id' => $user->getKey()];
    $participant = $this->participants()->firstOrCreate($participant, $participant);

    $participant->wasRecentlyCreated && $this->createActivityMessage([
        'user_id' => $user->getKey(),
        'message' => $message,
      ]);

    return $participant;
  }

  /**
   * Removes a user as participant of the conversaton.
   *
   * @param Myckhel\ChatSystem\Contracts\IChatEventMaker $user
   * @param string $message
   * @return bool|null
   */
  function removeParticipant(IChatEventMaker $user, String $message = 'Someone left the conversation') {
    $participant = ['user_id' => $user->getKey()];
    $participant = $this->participants()->whereUserId($user->getKey())->first();
    $participant && $this->createActivityMessage([
        'user_id' => $user->getKey(),
        'message' => $message,
      ]);
    return $participant?->delete();
  }

  protected function createActivityMessage(Array $message) {
    return $this->messages()->create($message + ['type'    => 'activity']);
  }

  protected static function newFactory(){
    return ConversationFactory::new();
  }

  /**
   * Adds query where conversation has latest message where message is not a system message.
   *
   * @param Myckhel\ChatSystem\Contarcts\IChatEventMaker $user
   * @return QueryBuilder
   */
  function scopeWhereHasLastMessage($q, IChatEventMaker $user = null) {
    $q->whereHas('last_message', fn ($q) =>
      $q->where('type', '!=', 'system')
      ->whereConversationWasntDeleted($user)
    );
  }

  function makeDelete(IChatEventMaker $user = null, $row = false, $all = false) {
    return $this->makeChatEvent($user, 'delete', $row, $all);
  }
  function makeRead(IChatEventMaker $user = null, $row = true, $all = false) {
    return $this->makeChatEvent($user, 'read', $row, $all);
  }
  function makeDeliver(IChatEventMaker $user = null, $row = true, $all = false) {
    return $this->makeChatEvent($user, 'deliver', $row, $all);
  }

  private function makeChatEvent(IChatEventMaker $user, $type = 'delete', $row = false, $all = false) {
    $create = [
      'made_id'    => $this->id,
      'made_type'  => $this::class,
      'type'       => $type,
      'all'        => $all,
    ];

    return $row
      ? $user->chatEventMakers()->create($create)
      : $user->chatEventMakers()->updateOrCreate(
          $create,
          array_merge($create, ['created_at' => now()])
        );
  }

  public function last_message(){
    return $this->hasOne(self::config('models.message'))->latest();
  }

  /**
   * Adds query where conversation doesn't have the given user as a participant.
   *
   * @param Myckhel\ChatSystem\Contarcts\IChatEventMaker $user
   * @return QueryBuilder
   */
  function scopeWhereNotParticipant($q, IChatEventMaker|int $user) {
    $q->whereDoesntHave('participants', fn ($q) => $q->whereUserId($user->id ?? $user));
  }

  public function participants(): HasMany {
    return $this->hasMany(self::config('models.conversation_user'));
  }

  public function participant($user = null): HasOne {
    return $this->hasOne(self::config('models.conversation_user'))->latest()
      ->when($user, fn ($q) => $q->whereUserId($user->id ?? $user));
  }

  public function otherParticipant($user = null): HasOne {
    return $this->participant()
      ->where('user_id', '!=', $user->id ?? $user);
  }

  public function otherParticipants($user = null): HasMany {
    return $this->participants()
      ->where('user_id', '!=', $user->id ?? $user);
  }

  public function messages(){
    return $this->hasMany(self::config('models.message'));
  }

  public function unread(int|IChatEventMaker $user = null){
    $user_id = $user->id ?? $user ?? auth()->user()?->id;

    return $this->doesntHaveChatEvents($user_id, 'read')->latest()
      ->when($user_id, fn ($q) => $q->whereNotSender($user_id));
  }

  function undelivered(int|IChatEventMaker $user = null){
    $user_id = $user->id ?? $user ?? auth()->user()?->id;

    return $this->doesntHaveChatEvents($user_id, 'deliver')
    ->where('user_id', '!=', $user_id);
  }

  function doesntHaveChatEvents(int|IChatEventMaker $user, $type = null) {
    $user_id = $user->id ?? $user;

    return $this->messages()
    ->whereType('user')
    ->whereHas('conversation', fn ($q) =>
      $q->whereDoesntHave('chatEvents', fn ($q) =>
        $q->latest()->whereMakerId($user_id)
        ->when($type, fn ($q) => $q->whereType($type))
        ->whereColumn('created_at', '>', 'messages.created_at')
      )
    );
  }

  public function author(){
    return $this->belongsTo(self::config('models.user'), 'user_id');
  }

  public function newCollection(array $models = Array()){
    return new ConversationCollection($models);
  }
}

class ConversationCollection extends Collection {
  function makeDelivered(IChatEventMaker $user){
    MakeEvent::dispatch($user, 'deliver', $this)->afterResponse();
    return $this;
  }
}
