<?php

namespace Myckhel\ChatSystem\Observers;

use Myckhel\ChatSystem\Models\Conversation;

class ConversationObserver
{
    /**
     * Handle the conversation "created" event.
     *
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return void
     */
    public function created(Conversation $conversation)
    {
     // $conversation->participants()->create([
       // 'user_id' => $conversation->author->id
     // ]);
    }

    /**
     * Handle the conversation "updated" event.
     *
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return void
     */
    public function updated(Conversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "deleted" event.
     *
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return void
     */
    public function deleted(Conversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "restored" event.
     *
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return void
     */
    public function restored(Conversation $conversation)
    {
        //
    }

    /**
     * Handle the conversation "force deleted" event.
     *
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return void
     */
    public function forceDeleted(Conversation $conversation)
    {
        //
    }
}
