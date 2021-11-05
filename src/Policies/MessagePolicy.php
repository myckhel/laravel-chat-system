<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Models\Message;
use Myckhel\ChatSystem\Contracts\IChatEventMaker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Myckhel\ChatSystem\Contracts\IMessage;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @return mixed
     */
    public function viewAny(IChatEventMaker $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function view(IChatEventMaker $user, IMessage $message)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @return mixed
     */
    public function create(IChatEventMaker $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function update(IChatEventMaker $user, IMessage $message)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function delete(IChatEventMaker $user, IMessage $message)
    {
      return $user->relatedToMessage($message);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function restore(IChatEventMaker $user, IMessage $message)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function forceDelete(IChatEventMaker $user, IMessage $message)
    {
        //
    }
}
