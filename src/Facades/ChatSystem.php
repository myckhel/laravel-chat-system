<?php

namespace Myckhel\ChatSystem\Facades;

use Illuminate\Support\Facades\Facade;

class ChatSystem extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'chat-system';
    }
}
