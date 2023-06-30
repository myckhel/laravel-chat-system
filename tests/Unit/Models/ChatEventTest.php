<?php

use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Models\ChatEvent;

beforeEach(function () {
  $this->conversation = Conversation::inRandomOrder()->first();
  $this->mockMessage = fn ($conversation, $user) =>
  $conversation->createMessage([
    'user_id' => $user->id ?? $user, 'message' => $this->faker->sentence
  ]);

  $this->mockChatEvent = function ($model = 'Message', &$otherUser = null, &$user = null, &$conversation = null, &$mockedModel = null, $event = 'Deliver', $all = null) {
    $otherUser = ($this->mockUser)();
    $user = ($this->mockUser)();
    $conversation = $conversation ?? $this->conversation;

    $conversation->addParticipant($otherUser);

    $mockModel = "mock$model";

    $mockedModel = $mockedModel ?? ($this->$mockModel)($conversation, $user);

    $eventMethod = "make$event";

    $args = [];

    if ($all) {
      $args['row'] = true;
      $args['all'] = $all;
    }

    return $mockedModel->$eventMethod($otherUser, ...$args);
  };
});

/* Method Tests */


/* Relationship Tests */

it('belongs to a conversation', function () {
  $chatEvent = ($this->mockChatEvent)(event: 'Read', mockedModel: $this->conversation);

  expect($chatEvent->conversation->id)->toBe($this->conversation->id);
});

it('belongs to a message', function () {
  $message;
  $chatEvent = ($this->mockChatEvent)(mockedModel: $message);

  expect($chatEvent->message->id)->toBe($message->id);
});

it('morphs to a made model', function () {
  $message;
  $chatEvent = ($this->mockChatEvent)(mockedModel: $message);

  expect($chatEvent->made->id)->toBe($message->id);
});

it('morphs to a maker model', function () {
  $otherUser;
  $chatEvent = ($this->mockChatEvent)('Message', $otherUser);

  expect($chatEvent->maker->id)->toBe($otherUser->id);
});

/* Query Tests */

it('should query chat_events including item where all column = true', function () {
  $otherUser;
  $conversation = $this->conversation;
  $chatEvent = ($this->mockChatEvent)(event: 'Read', mockedModel: $conversation, all: true, otherUser: $otherUser);
  $chatEvent = ChatEvent::whereMadeId($conversation->id)
    ->whereMadeType($conversation::class)
    ->withAll($otherUser)->latest()->first();

  expect($chatEvent->all)->toBe(true);
});

it('should query chat_events where user is not the sender', function () {
  $otherUser;
  $conversation = $this->conversation;
  $chatEvent = ($this->mockChatEvent)(event: 'Read', mockedModel: $conversation, all: true, otherUser: $otherUser);
  $chatEventCount = ChatEvent::whereMadeId($conversation->id)
    ->whereMadeType($conversation::class)
    ->notMessenger($otherUser)->count();

  expect($chatEventCount)->toBe(0);
});

/* Collection Tests */
