<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Models\Message;
use Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
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
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function view(HasMakeChatEvent $user, Message $message)
    {
        //
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
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function update(HasMakeChatEvent $user, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function delete(HasMakeChatEvent $user, Message $message)
    {
      return $user->relatedToMessage($message);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function restore(HasMakeChatEvent $user, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function forceDelete(HasMakeChatEvent $user, Message $message)
    {
        //
    }
}
