<?php

namespace Myckhel\ChatSystem;

use Illuminate\Support\ServiceProvider;

class ChatSystemServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'myckhel');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'myckhel');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/chatsystem.php', 'chatsystem');

        // Register the service the package provides.
        $this->app->singleton('chat-system', function ($app) {
            return new ChatSystem;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['chatsystem'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/chatsystem.php' => config_path('chatsystem.php'),
        ], 'chatsystem.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/myckhel'),
        ], 'chatsystem.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/myckhel'),
        ], 'chatsystem.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/myckhel'),
        ], 'chatsystem.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
