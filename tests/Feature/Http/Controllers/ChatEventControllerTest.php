<?php

use Myckhel\ChatSystem\Config;

beforeEach(function () {
  $this->user = auth()->user();
  $this->conversation = ($this->mockConversation)($this->user);
});

it('gets chat_events', function () {
  $res = $this->getJson('api/chat_events');

  $res->assertSuccessful();
});

it('gets chat_events with request parameters', function () {
  $otherUser = ($this->mockUser)();
  $conversation = $this->conversation;

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $otherUser);

  $conversation->makeRead($this->user);

  $type = Config::config('models.conversation');

  $res = $this->getJson("api/chat_events?type=read&made_type=$type&made_id=$conversation->id");

  $data = $res->getData();

  expect($data->data[0]->type)->toBe('read');

  $res->assertSuccessful();
});

it('creates a chat_event', function () {
  $type = Config::config('models.conversation');

  $res = $this->postJson('api/chat_events', [
    'made_id'      => $this->conversation->id,
    'made_type'    => $type,
    'type'         => 'deliver',
  ]);

  $data = $res->getData();

  expect($data->type)->toBe('deliver');

  $res->assertSuccessful();
});

it('view a chat_event', function () {
  $otherUser = ($this->mockUser)();
  $conversation = $this->conversation;

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $otherUser);

  $chatEvent = $conversation->makeRead($this->user);

  $res = $this->getJson("api/chat_events/{$chatEvent->id}");

  $res->assertSuccessful();
});

it('deletes a chat_event', function () {
  $otherUser = ($this->mockUser)();
  $conversation = $this->conversation;

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $otherUser);

  $chatEvent = $conversation->makeRead($this->user);

  $res = $this->deleteJson("api/chat_events/{$chatEvent->id}");

  $data = $res->getData();

  expect($data->status)->toBe(true);

  $res->assertSuccessful();
});
