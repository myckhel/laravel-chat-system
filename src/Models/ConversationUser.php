<?php

namespace Myckhel\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Myckhel\ChatSystem\Database\Factories\ConversationUserFactory;
use Myckhel\ChatSystem\Config;
use Myckhel\ChatSystem\Contracts\IConversationUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConversationUser extends Model implements IConversationUser
{
  use HasFactory;
  protected $fillable = ['conversation_id', 'user_id'];
  protected $casts    = ['conversation_id' => 'int', 'user_id' => 'int'];
  protected $hidden   = ['pivot'];

  protected static function newFactory()
  {
    return ConversationUserFactory::new();
  }

  /**
   * ConversationUser belongs to a user.
   *
   * @return BelongsTo
   */
  function user(): BelongsTo
  {
    return $this->belongsTo(Config::config('models.user'));
  }

  /**
   * ConversationUser belongs to a conversation.
   *
   * @return BelongsTo
   */
  function conversation(): BelongsTo
  {
    return $this->belongsTo(Conversation::class);
  }
}
