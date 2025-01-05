<?php

namespace Binkode\ChatSystem\Observers;

use Binkode\ChatSystem\Contracts\IConversation;

class ConversationObserver
{
    /**
     * Handle the conversation "created" event.
     *
     * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function created(IConversation $conversation)
    {
        // $conversation->participants()->create([
        // 'user_id' => $conversation->author->id
        // ]);
    }

    /**
     * Handle the conversation "updated" event.
     *
     * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function updated(IConversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "deleted" event.
     *
     * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function deleted(IConversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "restored" event.
     *
     * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function restored(IConversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "force deleted" event.
     *
     * @param  \Binkode\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function forceDeleted(IConversation $conversation)
    {
        //
    }
}
