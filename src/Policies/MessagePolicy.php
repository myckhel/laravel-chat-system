<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Models\Message;
use Myckhel\ChatSystem\Contracts\ChatEventMaker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Myckhel\ChatSystem\Contracts\IMessage;

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
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function view(ChatEventMaker $user, IMessage $message)
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
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function update(ChatEventMaker $user, IMessage $message)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function delete(ChatEventMaker $user, IMessage $message)
    {
      return $user->relatedToMessage($message);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function restore(ChatEventMaker $user, IMessage $message)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function forceDelete(ChatEventMaker $user, IMessage $message)
    {
        //
    }
}
