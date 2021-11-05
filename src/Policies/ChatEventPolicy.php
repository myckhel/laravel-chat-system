<?php

namespace Myckhel\ChatSystem\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Myckhel\ChatSystem\Contracts\IChatEventMaker;
use Myckhel\ChatSystem\Contracts\IChatEvent;

class ChatEventPolicy
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
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function view(IChatEventMaker $user, IChatEvent $chatEvent)
    {
      // TODO: authorize
      return true;
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
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function update(IChatEventMaker $user, IChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function delete(IChatEventMaker $user, IChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function restore(IChatEventMaker $user, IChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IChatEvent  $chatEvent
     * @return mixed
     */
    public function forceDelete(IChatEventMaker $user, IChatEvent $chatEvent)
    {
        //
    }
}
