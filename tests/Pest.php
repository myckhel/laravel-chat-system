<?php

use Myckhel\ChatSystem\Tests\Models\User;
use Myckhel\ChatSystem\Tests\TestCase;

uses(TestCase::class)
    ->beforeEach(fn () => $this->actingAs(User::inRandomOrder()->first()))
    ->in(__DIR__);
