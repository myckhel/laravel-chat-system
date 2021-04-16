<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Models\ChatEvent;
use Illuminate\Auth\Access\HandlesAuthorization;
use Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent;

class ChatEventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @return mixed
     */
    public function viewAny(HasMakeChatEvent $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function view(HasMakeChatEvent $user, ChatEvent $chatEvent)
    {
      // TODO: authorize
      return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @return mixed
     */
    public function create(HasMakeChatEvent $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function update(HasMakeChatEvent $user, ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function delete(HasMakeChatEvent $user, ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function restore(HasMakeChatEvent $user, ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \App\Models\ChatEvent  $chatEvent
     * @return mixed
     */
    public function forceDelete(HasMakeChatEvent $user, ChatEvent $chatEvent)
    {
        //
    }
}
