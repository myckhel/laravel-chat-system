<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Models\Message;
use Myckhel\ChatSystem\Contracts\ChatEventMaker;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @return mixed
     */
    public function viewAny(ChatEventMaker $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function view(ChatEventMaker $user, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @return mixed
     */
    public function create(ChatEventMaker $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function update(ChatEventMaker $user, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function delete(ChatEventMaker $user, Message $message)
    {
      return $user->relatedToMessage($message);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function restore(ChatEventMaker $user, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function forceDelete(ChatEventMaker $user, Message $message)
    {
        //
    }
}
