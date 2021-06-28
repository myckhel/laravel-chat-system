<?php

namespace Myckhel\ChatSystem;

use Illuminate\Support\ServiceProvider;

class ChatSystemServiceProvider extends ServiceProvider {
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot(): void {
    // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'myckhel');
    // $this->loadViewsFrom(__DIR__.'/../resources/views', 'myckhel');
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    $this->loadRoutesFrom(__DIR__.'/routes/api.php');

    // Publishing is only necessary when using the CLI.
    if ($this->app->runningInConsole()) {
        $this->bootForConsole();
    }
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  function register(): void {
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'chat-system');

    // Register the service the package provides.
    $this->app->singleton('chat-system', fn ($app) =>
        new ChatSystem
    );
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  function provides(){
    return ['chat-system'];
  }

  /**
   * Console-specific booting.
   *
   * @return void
   */
  function bootForConsole(): void {
    // Publishing the configuration file.
    $this->publishes([
        __DIR__.'/../config/config.php' => config_path('chat-system.php'),
    ], 'config');

    // Publishing the migration file.
    if (! class_exists('CreateConversationsTable')) {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }

    // Publishing the views.
    /*$this->publishes([
        __DIR__.'/../resources/views' => base_path('resources/views/vendor/myckhel'),
    ], 'chat-system.views');*/

    // Publishing the seeders.
    $this->publishes([
        __DIR__.'/database/seeders' => database_path('seeders'),
    ], 'seeders');

    // Publishing the factories.
    $this->publishes([
        __DIR__.'/database/factories' => database_path('factories'),
    ], 'factories');

    // Publishing assets.
    /*$this->publishes([
        __DIR__.'/../resources/assets' => public_path('vendor/myckhel'),
    ], 'chat-system.views');*/

    // Publishing the translation files.
    /*$this->publishes([
        __DIR__.'/../resources/lang' => resource_path('lang/vendor/myckhel'),
    ], 'chat-system.views');*/

    // Registering package commands.
    // $this->commands([]);
  }
}
