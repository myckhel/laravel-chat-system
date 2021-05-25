<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Models\ChatEvent;
use Illuminate\Auth\Access\HandlesAuthorization;
use Myckhel\ChatSystem\Contracts\ChatEventMaker;

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
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function view(ChatEventMaker $user, ChatEvent $chatEvent)
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
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function update(ChatEventMaker $user, ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function delete(ChatEventMaker $user, ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function restore(ChatEventMaker $user, ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function forceDelete(ChatEventMaker $user, ChatEvent $chatEvent)
    {
        //
    }
}
