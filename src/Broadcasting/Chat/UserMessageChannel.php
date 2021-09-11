<?php

namespace Myckhel\ChatSystem\Broadcasting\Chat;

class UserMessageChannel
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
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join($user, $messageUser)
    {
      return (int) $user->id == (int) $messageUser;
    }
}
