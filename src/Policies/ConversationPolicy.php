<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Interfaces\HasMakeChatEvent;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Myckhel\ChatSystem\Interfaces\HasMakeChatEvent  $user
     * @return mixed
     */
    public function viewAny($user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Myckhel\ChatSystem\Interfaces\HasMakeChatEvent  $user
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function view($user, Conversation $conversation)
    {
      return $user->relatedToConversation($conversation);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Myckhel\ChatSystem\Interfaces\HasMakeChatEvent  $user
     * @return mixed
     */
    public function create($user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Myckhel\ChatSystem\Interfaces\HasMakeChatEvent  $user
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function update($user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Interfaces\HasMakeChatEvent  $user
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function delete($user, Conversation $conversation)
    {
      return $user->relatedToConversation($conversation);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Interfaces\HasMakeChatEvent  $user
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function restore($user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Interfaces\HasMakeChatEvent  $user
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return mixed
     */
    public function forceDelete($user, Conversation $conversation)
    {
        //
    }
}
