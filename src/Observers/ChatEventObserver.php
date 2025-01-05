<?php

namespace Binkode\ChatSystem\Observers;

use Binkode\ChatSystem\Contracts\IChatEvent;
use Binkode\ChatSystem\Events\Message\Events;

class ChatEventObserver
{
  /**
   * Handle the ChatEvent "created" event.
   *
   * @param  \Binkode\ChatSystem\Contracts\IChatEvent  $chatEvent
   * @return void
   */
  public function created(IChatEvent $chatEvent)
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
   * @param  \Binkode\ChatSystem\Contracts\IChatEvent  $chatEvent
   * @return void
   */
  public function updated(IChatEvent $chatEvent)
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
   * @param  \Binkode\ChatSystem\Contracts\IChatEvent  $chatEvent
   * @return void
   */
  public function deleted(IChatEvent $chatEvent)
  {
    //
  }

  /**
   * Handle the ChatEvent "restored" event.
   *
   * @param  \Binkode\ChatSystem\Contracts\IChatEvent  $chatEvent
   * @return void
   */
  public function restored(IChatEvent $chatEvent)
  {
    //
  }

  /**
   * Handle the ChatEvent "force deleted" event.
   *
   * @param  \Binkode\ChatSystem\Contracts\IChatEvent  $chatEvent
   * @return void
   */
  public function forceDeleted(IChatEvent $chatEvent)
  {
    //
  }
}
