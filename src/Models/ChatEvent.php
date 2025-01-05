<?php

namespace Binkode\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Binkode\ChatSystem\Contracts\IChatEventMaker;
use Binkode\ChatSystem\Database\Factories\ChatEventFactory;
use Binkode\ChatSystem\Config;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Binkode\ChatSystem\Contracts\IChatEvent;

class ChatEvent extends Model implements IChatEvent
{
  use HasFactory;
  protected $fillable = ['maker_id', 'maker_type', 'made_id', 'made_type', 'type', 'all', 'created_at'];
  protected $casts    = ['maker_id' => 'int', 'made_id' => 'int', 'all' => 'bool'];

  protected static function newFactory()
  {
    return ChatEventFactory::new();
  }

  /**
   * Adds query where maker is the given user or chat event is for all participants.
   *
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker $user
   * @return QueryBuilder
   */
  function scopeWithAll($q, IChatEventMaker $user)
  {
    $q->select('*')->whereMakerId($user->id)->orWhere('all', true);
  }

  /**
   * adds query where the chat event message sender is not the given user.
   *
   * @param Binkode\ChatSystem\Contarcts\IChatEventMaker $user
   * @return QueryBuilder
   */
  function scopeNotMessenger($q, IChatEventMaker|int $user)
  {
    $q->whereDoesntHave('message', fn($q) => $q->whereUserId($user->id ?? $user))->whereType('user');
  }

  /**
   * ChatEvent belongs to a message.
   *
   * @return BelongsTo
   */
  function message(): BelongsTo
  {
    return $this->belongsTo(Config::config('models.message'), 'made_id');
  }

  /**
   * ChatEvent belongs to a conversation.
   *
   * @return BelongsTo
   */
  function conversation(): BelongsTo
  {
    return $this->belongsTo(Config::config('models.conversation'), 'made_id');
  }

  /**
   * ChatEvent morph to maker models.
   *
   * @return MorphTo
   */
  function maker(): MorphTo
  {
    return $this->morphTo();
  }

  /**
   * ChatEvent morph to made models.
   *
   * @return MorphTo
   */
  function made(): MorphTo
  {
    return $this->morphTo();
  }
}
