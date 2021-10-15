<?php

use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Models\ChatEvent;

beforeEach(function() {
  $this->conversation = Conversation::inRandomOrder()->first();
  $this->mockMessage = fn ($conversation, $user) =>
    $conversation->createMessage([
      'user_id' => $user->id ?? $user, 'message' => $this->faker->sentence
    ]);

  $this->mockChatEvent = function ($model = 'Message', &$otherUser = null, &$user = null, &$conversation = null, &$mockedModel = null, $event = 'Delivered', $all = null) {
    $otherUser = ($this->mockUser)();
    $user = ($this->mockUser)();
    $conversation = $conversation ?? $this->conversation;

    $conversation->addParticipant($otherUser);

    $mockModel = "mock$model";

    $mockedModel = $mockedModel ?? ($this->$mockModel)($conversation, $user);

    $eventMethod = "make$event";

    $args = [];

    if($all) {
      $args['row'] = true;
      $args['all'] = $all;
    }

    return $mockedModel->$eventMethod($otherUser, ...$args);
  };
});

/* Method Tests */


/* Relationship Tests */

it('belongs to a user model', function() {
  $participant = $this->conversation->participant;
  expect($participant->user->toArray())->toHaveKeys(['id', 'name']);
});

it('belongs to a conversation model', function() {
  $participant = $this->conversation->participant;

  expect($participant->conversation->toArray())->toHaveKeys(['id', 'name', 'user_id', 'type']);
});

/* Query Tests */

/* Collection Tests */
