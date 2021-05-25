<?php

namespace Myckhel\ChatSystem;
use Illuminate\Support\Facades\Gate;
use Myckhel\ChatSystem\Traits\Config;
use Laravel\Octane\Facades\Octane;

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
    self::config('models.chat_event')
      ::observe(self::config('observers.models.chat_event'));
    self::config('models.conversation')
      ::observe(self::config('observers.models.conversation'));
  }

  static function registerBroadcastRoutes() {
    require __DIR__.'/routes/channels.php';
  }

  static function async(...$calls){
    if (config('octane.server') === 'swoole') {
      return Octane::concurrently($calls);
    } else {
      return Collect($calls)->map(fn ($call) => $call());
    }
  }
}
