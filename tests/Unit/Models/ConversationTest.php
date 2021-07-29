<?php
use Myckhel\ChatSystem\Models\Conversation;
use Carbon\Carbon;

beforeEach(function() {
  $this->conversation = Conversation::inRandomOrder()->first();
  $this->user_id = $this->conversation->user_id;
  $this->message = $this->conversation->messages()->latest()->first();
});

it('creates a message', function() {
  $message = $this->conversation->createMessage(
    ['user_id' => $this->user_id, 'message' => 'hello']
  );

  expect($message)->toMatchArray([
    'message' => 'hello',
    'user_id' => $this->user_id,
  ]);
});

it('creates a message with token', function() {
  $timestamp = Carbon::now()->timestamp;

  $message = $this->conversation->createMessageWithToken(
    $timestamp,
    ['user_id' => $this->conversation->user_id, 'message' => 'hello']
  );

  expect($message)->toMatchArray([
    'message' => 'hello',
    'metas' => ['token' => $timestamp],
  ]);
});

it('replies a message', function() {
  $reply = [
    'user_id' => $this->user_id,
    'message' => 'hello',
    'reply_id' => $this->message->id,
  ];

  $message = $this->conversation->replyMessage(
    $this->message,
    $reply
  );

  expect($message)->toMatchArray($reply + ['reply_id' => $this->message->id]);
});

it('creates types of messages', function() {
  $messageActivity = [
    'user_id' => $this->user_id,
    'message' => 'someone changed the conversation name',
    'type'    => 'activity',
  ];

  $messageSystem = [
    'type' => 'system',
    'message' => 'swipe right to reply a message',
  ];

  $message = $this->conversation->createMessage(
    $messageActivity
  );

  expect($message)->toMatchArray($messageActivity);

  $message = $this->conversation->createMessage($messageActivity + $messageSystem);

  expect($message)->toMatchArray($messageActivity + $messageSystem);
});

it('adds/removes participant to/from conversation', function() {
  $user = ($this->mockUser)();

  $participantsCount = $this->conversation->participants()->count();

  $participant = $this->conversation->addParticipant(
    $user,
  );

  $participantsAddedCount = $this->conversation->participants()->count();

  expect($participant)->toMatchArray([
    'user_id' => $user->id,
    'conversation_id' => $this->conversation->id,
  ]);

  expect($participantsAddedCount)->toBe($participantsCount + 1);

  $remove = $this->conversation->removeParticipant(
    $user,
  );

  $participantsRemovedCount = $this->conversation->participants()->count();

  expect($remove)->toBe(true);
  expect($participantsRemovedCount)->toBe($participantsCount);
});
