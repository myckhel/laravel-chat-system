<?php

use Myckhel\ChatSystem\Tests\Models\User;
use Myckhel\ChatSystem\Tests\TestCase;
use Faker\Factory as Faker;

uses(TestCase::class)
    ->beforeEach(function () {
      $this->faker = Faker::create();

      $this->actingAs(User::inRandomOrder()->first());

      $this->user = auth()->user();

      $this->mockUser = fn () => User::create(['name' => $this->faker->name]);

      $this->mockConversation = fn ($user, $type = 'private') => $user->conversations()->create([
        'name'    => $this->faker->name.' Group',
        'user_id' => $user->id,
        'type'    => $type,
      ]);

      $this->conversation = ($this->mockConversation)($this->user);

      $this->mockMessage = fn ($conversation, $user) => $conversation->createMessage([
        'user_id' => $user->id ?? $user,
        'message' => $this->faker->sentence
      ]);
    })
    ->in(__DIR__);
