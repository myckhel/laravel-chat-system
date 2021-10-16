<?php

beforeEach(function() {
  $this->user = auth()->user();
  $this->conversation = ($this->mockConversation)($this->user);
});

it('gets conversations', function () {
  $res = $this->getJson('api/conversations');

  $res->assertSuccessful();
});

it('creates a conversation', function () {
  $res = $this->postJson('api/conversations', [
    'name'    => $this->faker->name.' Group',
    'type'    => 'group',
  ]);

  $data = $res->getData();

  expect($data)->toHaveKeys(['id', 'name', 'type']);

  $res->assertSuccessful();
});

it('view a conversation', function () {

  $res = $this->getJson("api/conversations/{$this->conversation->id}");

  $res->assertSuccessful();
});

it('updates a conversation', function () {
  $name = 'Updated Group Name';
  $res = $this->putJson("api/conversations/{$this->conversation->id}", [
    'name'    => $name,
  ]);

  $data = $res->getData();

  expect($data->name)->toBe($name);

  $res->assertSuccessful();
});

it('deletes a conversation', function () {
  $conversation = ($this->mockConversation)($this->user);
  $res = $this->deleteJson("api/conversations/{$conversation->id}");

  $data = $res->getData();

  expect($data->status->type)->toBe('delete');

  $res->assertSuccessful();
});

it('counts conversations', function () {
  $res = $this->getJson("api/conversations/count");

  $data = $res->getContent();

  expect((int)$data)->toBeInt();

  $res->assertSuccessful();
});

it('joins a conversation', function () {
  $otherUser = ($this->mockUser)();
  $conversation = ($this->mockConversation)($otherUser, 'group');
  $res = $this->postJson("api/conversations/{$conversation->id}/join");

  $participant = $conversation->participants()
    ->whereUserId($this->user->id)
    ->first();

  expect($participant->user_id)->toBe($this->user->id);

  $res->assertSuccessful();
});

it('leaves a conversation', function () {
  $otherUser = ($this->mockUser)();
  $conversation = ($this->mockConversation)($otherUser, 'group');

  $conversation->addParticipant($this->user);

  $res = $this->deleteJson("api/conversations/{$conversation->id}/join");

  $participant = $conversation->participants()
    ->whereUserId($this->user->id)
    ->first();

  expect($participant)->toBeNull();

  $res->assertSuccessful();
});
