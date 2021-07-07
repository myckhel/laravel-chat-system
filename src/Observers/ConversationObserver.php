<?php

namespace Myckhel\ChatSystem\Observers;

use Myckhel\ChatSystem\Contracts\IConversation;

class ConversationObserver
{
    /**
     * Handle the conversation "created" event.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
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
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function updated(IConversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "deleted" event.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function deleted(IConversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "restored" event.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function restored(IConversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "force deleted" event.
     *
     * @param  \Myckhel\ChatSystem\Contracts\IConversation  $conversation
     * @return void
     */
    public function forceDeleted(IConversation $conversation)
    {
        //
    }
}
