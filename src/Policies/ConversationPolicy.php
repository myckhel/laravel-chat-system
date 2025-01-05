<?php

namespace Binkode\ChatSystem\Policies;

use Binkode\ChatSystem\Contracts\IChatEventMaker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Binkode\ChatSystem\Contracts\IConversation;

class ConversationPolicy
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
   * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
   * @return mixed
   */
  public function view(IChatEventMaker $user, IConversation $conversation)
  {
    return $user->relatedToConversation($conversation);
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
   * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
   * @return mixed
   */
  public function update(IChatEventMaker $user, IConversation $conversation)
  {
    return $user->id == $conversation->user_id;
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
   * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
   * @return mixed
   */
  public function delete(IChatEventMaker $user, IConversation $conversation)
  {
    return $user->relatedToConversation($conversation);
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
   * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
   * @return mixed
   */
  public function restore(IChatEventMaker $user, IConversation $conversation)
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param  \Binkode\ChatSystem\Contracts\IChatEventMaker  $user
   * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
   * @return mixed
   */
  public function forceDelete(IChatEventMaker $user, IConversation $conversation)
  {
    //
  }

  function join(IChatEventMaker $user, IConversation $conversation)
  {
    return $conversation->type != 'private';
  }
}
