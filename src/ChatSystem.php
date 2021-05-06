<?php

namespace Myckhel\ChatSystem;
use Illuminate\Support\Facades\Gate;
use Myckhel\ChatSystem\Observers\ChatEventObserver;
use Myckhel\ChatSystem\Observers\ConversationObserver;
use Myckhel\ChatSystem\Traits\Config;

class ChatSystem
{
  use Config;
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
    self::config('models.chat_event')::observe(ChatEventObserver::class);
    self::config('models.conversation')::observe(ConversationObserver::class);
  }

  static function registerBroadcastRoutes() {
    require __DIR__.'/routes/channels.php';
  }
}
