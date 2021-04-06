<?php

namespace Myckhel\ChatSystem\Broadcasting\Chat;

use Myckhel\ChatSystem\Models\Message;

class MessageChannel
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
     * @param  \User  $user
     * @return array|bool
     */
    public function join($user, Message $message)
    {
      return $user->relatedToMessage($message);
    }
}
