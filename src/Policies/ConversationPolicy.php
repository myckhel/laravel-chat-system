<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
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
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function view(HasMakeChatEvent $user, Conversation $conversation)
    {
      return $user->relatedToConversation($conversation);
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
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function update(HasMakeChatEvent $user, Conversation $conversation)
    {
      return $user->id == $conversation->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function delete(HasMakeChatEvent $user, Conversation $conversation)
    {
      return $user->relatedToConversation($conversation);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function restore(HasMakeChatEvent $user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Traits\ChatEvent\HasMakeChatEvent  $user
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function forceDelete(HasMakeChatEvent $user, Conversation $conversation)
    {
        //
    }
}
