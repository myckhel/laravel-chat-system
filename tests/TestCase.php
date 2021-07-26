<?php

namespace Myckhel\ChatSystem\Tests;
use Myckhel\ChatSystem\ChatSystemServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
  protected function getPackageProviders($app)
  {
    return [
      ChatSystemServiceProvider::class,
    ];
  }
}
