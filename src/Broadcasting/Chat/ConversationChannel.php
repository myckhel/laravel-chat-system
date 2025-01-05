<?php

namespace Binkode\ChatSystem\Broadcasting\Chat;

use Binkode\ChatSystem\Contracts\IConversation;

class ConversationChannel
{
  /**
   * Create a new channel instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Authenticate the user's access to the channel.
   *
   * @param  User  $user
   * @return array|bool
   */
  public function join($user, $conversation)
  {
    $conversation = config('chat-system.models.conversation')::find($conversation);

    return $user->relatedToConversation($conversation);
  }
}
