<?php

namespace Binkode\ChatSystem\Policies;

use Binkode\ChatSystem\Models\Message;
use Binkode\ChatSystem\Contracts\IChatEventMaker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Binkode\ChatSystem\Contracts\IMessage;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
     * @return mixed
     */
    public function viewAny(IChatEventMaker $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Binkode\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function view(IChatEventMaker $user, IMessage $message)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
     * @return mixed
     */
    public function create(IChatEventMaker $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Binkode\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function update(IChatEventMaker $user, IMessage $message)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Binkode\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function delete(IChatEventMaker $user, IMessage $message)
    {
        return $user->relatedToMessage($message);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Binkode\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function restore(IChatEventMaker $user, IMessage $message)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Binkode\ChatSystem\Contracts\IMessage  $message
     * @return mixed
     */
    public function forceDelete(IChatEventMaker $user, IMessage $message)
    {
        //
    }
}
