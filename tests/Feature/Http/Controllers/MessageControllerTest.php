<?php
use Myckhel\ChatSystem\Traits\Config;

beforeEach(function() {
  $this->user = auth()->user();
  $this->conversation = ($this->mockConversation)($this->user);
  $this->mockMessage = fn ($conversation, $user) => $conversation->createMessage(['user_id' => $user->id ?? $user, 'message' => $this->faker->sentence]);
  $this->message = ($this->mockMessage)($this->conversation, $this->user);
});

it('gets messages', function () {
  $res = $this->getJson('api/messages');

  $res->assertSuccessful();
});

it('gets messages for a conversation', function () {
  $conversation = $this->conversation;
  ($this->mockMessage)($conversation, $this->user);
  ($this->mockMessage)($conversation, $this->user);

  $res = $this->getJson('api/messages', [
    'conversation_id' => $conversation->id,
  ]);

  $data = $res->getData();

  expect($data->total)->toBeGreaterThan(1);
  expect($data->data[0]->conversation_id)->toBe($conversation->id);

  $res->assertSuccessful();
});

it('gets messages within other user', function () {
  $otherUser = ($this->mockUser)();
  $conversation = $this->conversation;

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $otherUser);
  ($this->mockMessage)($conversation, $otherUser);

  $res = $this->getJson("api/messages?other_user_id={$otherUser->id}&g=1");

  $data = $res->getData();

  expect($data->total)->toBeGreaterThan(1);
  expect($data->data[count($data->data) - 1]->user_id)->toBe($otherUser->id);

  $res->assertSuccessful();
});

it('gets messages of reply', function () {
  $otherUser = ($this->mockUser)();
  $conversation = $this->conversation;

  $conversation->addParticipant($otherUser);

  $message = ($this->mockMessage)($conversation, $otherUser);

  $conversation->replyMessage($message, [
    'message' => 'done',
    'user_id' => $this->user->id,
  ]);

  $type = Config::config('models.message');
  $res = $this->getJson("api/messages?reply_id={$message->id}&reply_type=$type");

  $data = $res->getData();

  expect($data->total)->toBeGreaterThan(0);
  expect($data->data[count($data->data) - 1]->reply_id)->toBe($message->id);

  $res->assertSuccessful();
});

it('creates a message', function () {
  $res = $this->postJson('api/messages', [
    'message'         => $this->faker->word,
    'conversation_id' => $this->conversation->id,
    'token'           => '123'
  ]);

  $data = $res->getData();

  expect($data)->toHaveKeys(['id', 'message', 'type']);
  expect($data->metas->token)->toBe('123');

  $res->assertSuccessful();
});

it('creates a message reply', function () {
  $message = ($this->mockMessage)($this->conversation, $this->user);

  $res = $this->postJson('api/messages', [
    'message'         => $this->faker->word,
    'conversation_id' => $this->conversation->id,
    'reply_type'      => $message::class,
    'reply_id'        => $message->id,
  ]);

  $data = $res->getData();

  expect($data->reply_id)->toBe($message->id);

  $res->assertSuccessful();
});

it('creates a message of type activity', function () {
  $res = $this->postJson('api/messages', [
    'message'         => 'User emitted action',
    'conversation_id' => $this->conversation->id,
    'type'            => 'activity'
  ]);

  $data = $res->getData();

  expect($data->type)->toBe('activity');

  $res->assertSuccessful();
});

it('view a message', function () {
  $res = $this->getJson("api/messages/{$this->message->id}");

  $res->assertSuccessful();
});

it('deletes a message', function () {
  $message = ($this->mockMessage)($this->conversation, $this->user);
  $res = $this->deleteJson("api/messages/{$message->id}");

  $data = $res->getData();

  expect($data->status)->toBe(true);

  $res->assertSuccessful();
});

it('deletes messages', function () {
  $message = ($this->mockMessage)($this->conversation, $this->user);
  $message1 = ($this->mockMessage)($this->conversation, $this->user);
  $res = $this->deleteJson("api/messages?messages[]=$message->id&messages[]=$message1->id");

  $data = $res->getData();

  expect(count($data))->toBe(2);

  $res->assertSuccessful();
});
