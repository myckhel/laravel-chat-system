<?php

namespace Myckhel\ChatSystem\Traits\Message;

use Myckhel\ChatSystem\Jobs\Chat\MakeEvent;
use Myckhel\ChatSystem\Config;
use Myckhel\ChatSystem\Contracts\IConversation;
use Myckhel\ChatSystem\Contracts\IMessage;

/**
 *
 */
trait HasMessage
{
  /**
   * adds query for model's messages
   *
   * @param IConversation|int|null $conversation
   * @param nullable $otherUser
   * @param array $reply
   * @param string $type
   * @return QueryBuilder
   */
  function messages(IConversation|int $conversation = null, $otherUser = null, array $reply = [], $type = 'private')
  {
    if ($type == 'private') {
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
        return Config::config('models.message')::whereReplyId($reply['reply_id'])
          ->whereReplyType($reply['reply_type']);
      } else {
        $conversation_ids = $this->conversations(type: [$type])->pluck('conversations.id');
        return $this->hasMany(Config::config('models.message'))
          ->where(
            fn ($q) =>
            $q->orWhereHas(
              'conversation',
              fn ($q) =>
              $q->whereIn('conversations.id', $conversation_ids)
            )
          )->whereReply($reply)->latest();
      }
    } else {
      $conversation = Config::config('models.conversation')::whereType($type)
        ->when($conversation, fn ($q) => $q->whereId($conversation->id ?? $conversation))
        ->first();

      $conversation && MakeEvent::dispatch($this, 'read', $conversation)->afterResponse();

      return $conversation?->messages();
    }
  }

  /**
   * adds query for model where it messages has not been delivered
   *
   * @return QueryBuilder
   */
  function undelivered()
  {
    return Config::config('models.message')
      ::where('user_id', '!=', $this->id)
      ->whereRelatedTo($this)
      ->hasNoEvent(fn ($q) => $q->whereMakerId($this->id)->whereType('deliver'))
      ->latest();
  }

  /**
   * adds query for model's conversations
   *
   * @param IConversation|int|null $conversation
   * @param nullable $otherUser
   * @param array $type
   * @return BelongsToMany
   */
  function conversations(IConversation|int $conversation = null, $otherUser = null, array $type = [])
  {
    return $this->belongsToMany(
      Config::config('models.conversation'),
      'conversation_users'
    )->withTimestamps()
      ->when($type, fn ($q) => $q->whereIn('type', $type))
      ->when($conversation, fn ($q) => $q->where('conversations.id', $conversation->id ?? $conversation))
      ->when($otherUser, fn ($q) => $q->whereHas('participants', fn ($q) => $q->whereUserId($otherUser->id ?? $otherUser)));
  }

  /**
   * checks wherther model is related to the given message
   *
   * @param IMessage $message
   * @return bool
   */
  function relatedToMessage(IMessage $message)
  {
    return $this->id === $message->user_id || !!$message->participants($this->id)->first();
  }

  /**
   * checks wherther model is related to the given conversation
   *
   * @param IConversation $conversation
   * @return bool
   */
  function relatedToConversation(IConversation $conversation)
  {
    return $this->id === $conversation->user_id || !!$conversation->participant($this->id)->first();
  }
}
