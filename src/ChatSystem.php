<?php

namespace Myckhel\ChatSystem;
use Illuminate\Support\Facades\Gate;
use Myckhel\ChatSystem\Traits\Config;
use Laravel\Octane\Facades\Octane;

class ChatSystem
{
  use Config;

  /**
   * method to register policies ChatSystem provides.
   *
   */
  static function registerPolicies() {
    Gate::guessPolicyNamesUsing(function ($modelClass) {
      $spilts = explode('\\', $modelClass);
      return 'Myckhel\\ChatSystem\\Policies\\'.array_pop($spilts).'Policy';
    });
  }

  /**
   * method to register observers ChatSystem provides.
   *
   */
  static function registerObservers(array $exclude = []) {
    @[
      'chat_event' => $chat_event,
      'conversation' => $conversation
    ] = $exclude;

    $chat_event != true && self::config('models.chat_event')
      ::observe(self::config('observers.models.chat_event'));

    $conversation !== true && self::config('models.conversation')
      ::observe(self::config('observers.models.conversation'));
  }

  /**
   * method to register broadcast routes ChatSystem provides.
   *
   */
  static function registerBroadcastRoutes() {
    require __DIR__.'/routes/channels.php';
  }

  /**
   * method to asynchronously call fuctions
   * if only `laravel octane` is configured to use swoole
   * otherwise call functions synchronously.
   *
   * @param Closure ...$calls
   * @return array|Collection
   */
  static function async(...$calls){
    if (config('octane.server') === 'swoole') {
      return Octane::concurrently($calls);
    } else {
      return Collect($calls)->map(fn ($call) => $call());
    }
  }
}
