<?php

namespace Myckhel\ChatSystem;

/**
 *
 */
class Config
{
  static function config(String $config = null)
  {
    return config("chat-system.$config");
  }
}
