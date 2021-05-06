<?php

namespace Myckhel\ChatSystem\Traits;
/**
 *
 */
trait Config
{
  static function config(String $config = null) {
    return config("chat-system.$config");
  }
}
