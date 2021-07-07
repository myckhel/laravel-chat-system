<?php

namespace Myckhel\ChatSystem\Broadcasting\Chat;

use Myckhel\ChatSystem\Contracts\IMessage;

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
    public function join($user, IMessage $message)
    {
      return $user->relatedToMessage($message);
    }
}
