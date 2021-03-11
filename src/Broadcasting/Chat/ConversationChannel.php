<?php

namespace Myckhel\ChatSystem\Broadcasting\Chat;

use Myckhel\ChatSystem\Models\Conversation;

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
    public function join($user, Conversation $conversation)
    {
      return $user->relatedToConversation($conversation);
    }
}
