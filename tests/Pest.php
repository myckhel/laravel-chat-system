<?php

use Myckhel\ChatSystem\Tests\Models\User;
use Myckhel\ChatSystem\Tests\TestCase;
use Faker\Factory as Faker;

uses(TestCase::class)
    ->beforeEach(function () {
      $this->faker = Faker::create();
      $this->actingAs(User::inRandomOrder()->first());
      $this->mockUser = fn () => User::create(['name' => $this->faker->name]);
      $this->mockConversation = fn ($user) => $user->conversations()->create([
        'name'    => $this->faker->name.' Group',
        'user_id' => $user->id,
      ]);
    })
    ->in(__DIR__);
