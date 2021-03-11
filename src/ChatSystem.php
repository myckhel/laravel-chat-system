<?php

namespace Myckhel\ChatSystem;
use Illuminate\Support\Facades\Gate;
use Myckhel\ChatSystem\Models\Message;
use Myckhel\ChatSystem\Models\ChatEvent;
use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Observers\MessageObserver;
use Myckhel\ChatSystem\Observers\ChatEventObserver;
use Myckhel\ChatSystem\Observers\ConversationObserver;

class ChatSystem
{
  static function hello() {
    return 'hello-world';
  }

  static function registerPolicies() {
    Gate::guessPolicyNamesUsing(function ($modelClass) {
      $spilts = explode('\\', $modelClass);
      return 'Myckhel\\ChatSystem\\Policies\\'.array_pop($spilts).'Policy';
    });
  }

  static function registerObservers() {
    Message::observe(MessageObserver::class);
    ChatEvent::observe(ChatEventObserver::class);
    Conversation::observe(ConversationObserver::class);
  }

  static function registerBroadcastRoutes() {
    require __DIR__.'/routes/channels.php';
  }
}
