<?php

namespace Myckhel\ChatSystem\Observers;

use Myckhel\ChatSystem\Models\ChatEvent;
use Myckhel\ChatSystem\Events\Message\Events;

class ChatEventObserver
{
    /**
     * Handle the ChatEvent "created" event.
     *
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return void
     */
    public function created(ChatEvent $chatEvent)
    {
      if ($chatEvent->type == 'delete') {
        broadcast(new Events($chatEvent));
      } else {
        broadcast(new Events($chatEvent))->toOthers();
      }
    }

    /**
     * Handle the ChatEvent "updated" event.
     *
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return void
     */
    public function updated(ChatEvent $chatEvent)
    {
      if ($chatEvent->isDirty('created_at')) {
        if ($chatEvent->type == 'delete') {
          broadcast(new Events($chatEvent));
        } else {
          broadcast(new Events($chatEvent))->toOthers();
        }
      }
    }

    /**
     * Handle the ChatEvent "deleted" event.
     *
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return void
     */
    public function deleted(ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Handle the ChatEvent "restored" event.
     *
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return void
     */
    public function restored(ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Handle the ChatEvent "force deleted" event.
     *
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return void
     */
    public function forceDeleted(ChatEvent $chatEvent)
    {
        //
    }
}
