<?php

namespace Myckhel\ChatSystem\Policies;

use Myckhel\ChatSystem\Contracts\ChatEventMaker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Myckhel\ChatSystem\Contracts\IConversation;

class ConversationPolicy
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
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return mixed
     */
    public function view(ChatEventMaker $user, IConversation $conversation)
    {
      return $user->relatedToConversation($conversation);
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
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return mixed
     */
    public function update(ChatEventMaker $user, IConversation $conversation)
    {
      return $user->id == $conversation->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return mixed
     */
    public function delete(ChatEventMaker $user, IConversation $conversation)
    {
      return $user->relatedToConversation($conversation);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return mixed
     */
    public function restore(ChatEventMaker $user, IConversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Myckhel\ChatSystem\Contracts\ChatEventMaker  $user
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return mixed
     */
    public function forceDelete(ChatEventMaker $user, IConversation $conversation)
    {
        //
    }
}
