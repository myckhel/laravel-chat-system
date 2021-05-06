<?php
namespace Myckhel\ChatSystem\Traits\Message;

use Myckhel\ChatSystem\Models\Message;
use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Jobs\Chat\MakeEvent;
use Myckhel\ChatSystem\Traits\Config;

/**
 *
 */
trait HasMessage
{
  use Config;
  function messages($conversation = null, $otherUser = null, Array $reply = []){
    if ($conversation || $otherUser) {
      $conversation = $this->conversations($conversation, $otherUser)->first();
      // if conversation doesnt exist and add participant
      if (!$conversation) {
        $conversation = $this->conversations()->create([
          'user_id' => $this->id,
        ]);

        if ($otherUser) {
          $conversation->participants()->create([
            'user_id' => $otherUser->id ?? $otherUser,
          ]);
        }
      }
      MakeEvent::dispatch($this, 'read', $conversation)->afterResponse();
      return $conversation->messages()->whereReply($reply);
    } elseif ($reply) {
      return self::config('models.message')::whereReplyId($reply['reply_id'])
      ->whereReplyType($reply['reply_type']);
    } else {
      $conversation_ids = $this->conversations()->pluck('conversations.id');
      return $this->hasMany(self::config('models.message'))
      ->where(fn ($q) =>
        $q->orWhereHas('conversation', fn ($q) =>
          $q->whereIn('conversations.id', $conversation_ids)
        )
      )->whereReply($reply)->latest();
    }
  }

  function undelivered() {
    return self::config('models.message')
    ::where('user_id', '!=', $this->id)
    ->whereBelongsToMessages($this)
    ->hasNoEvent(fn ($q) => $q->whereMakerId($this->id)->whereType('deliver'))
    ->latest();
  }

  function conversations($conversation = null, $otherUser = null){
    return $this->belongsToMany(
      self::config('models.conversation'), 'conversation_users'
    )->withTimestamps()
    ->when($conversation, fn ($q) => $q->where('conversations.id', $conversation->id ?? $conversation))
    ->when($otherUser, fn ($q) => $q->whereHas('participants', fn ($q) => $q->whereUserId($otherUser->id ?? $otherUser)));
  }

  function relatedToMessage($message) {
    return $this->id === $message->user_id || !!$message->participants($this->id)->first();
  }
  function relatedToConversation($conversation) {
    return $this->id === $conversation->user_id || !!$conversation->participant($this->id)->first();
  }
}
