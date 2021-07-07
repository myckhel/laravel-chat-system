<?php

namespace Myckhel\ChatSystem\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Myckhel\ChatSystem\Contracts\ChatEventMaker;
use Myckhel\ChatSystem\Contracts\IChatEvent;

class ChatEventPolicy
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
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function view(ChatEventMaker $user, IChatEvent $chatEvent)
    {
      // TODO: authorize
      return true;
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
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function update(ChatEventMaker $user, IChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function delete(ChatEventMaker $user, IChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function restore(ChatEventMaker $user, IChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function forceDelete(ChatEventMaker $user, IChatEvent $chatEvent)
    {
        //
    }
}
