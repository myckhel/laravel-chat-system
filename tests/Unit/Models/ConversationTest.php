<?php

use Myckhel\ChatSystem\Models\Conversation;
use Carbon\Carbon;
use Myckhel\ChatSystem\Events\Message\Events;
use Myckhel\ChatSystem\Jobs\Chat\MakeEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Bus;

beforeEach(function() {
  $this->conversation = Conversation::inRandomOrder()->first();
  $this->user_id = $this->conversation->user_id;
  $this->message = $this->conversation->messages()->latest()->first();
  $this->chatEvent = [
    'maker_type'  => $this->conversation->author::class,
    'maker_id'    => $this->conversation->user_id,
    'made_type'   => Conversation::class,
    'made_id'     => $this->conversation->id,
  ];
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

it('can make a read event', function() {
  Event::fake([Events::class]);

  $readEvent = $this->conversation->makeRead($this->conversation->author);

  expect($readEvent)->toMatchArray($this->chatEvent + ['type' => 'read']);

  Event::assertDispatched(Events::class);
});

it('can make a deliver event', function() {
  Event::fake([Events::class]);

  $readEvent = $this->conversation->makeDeliver($this->conversation->author);

  expect($readEvent)->toMatchArray($this->chatEvent + ['type' => 'deliver']);

  Event::assertDispatched(Events::class);
});

it('can make a delete event', function() {
  Event::fake([Events::class]);

  $readEvent = $this->conversation->makeDelete($this->conversation->author);

  expect($readEvent)->toMatchArray($this->chatEvent + ['type' => 'delete']);

  Event::assertDispatched(Events::class);
});

/* Relationship Tests */

it('has a last message', function() {
  $user = auth()->user();
  $conversation = $user->conversations()->create([
    'name'    => $this->faker->name.' Group',
    'user_id' => $user->id,
  ]);

  $fMessage = $conversation->createMessage(['user_id' => $this->user_id, 'message' => 'first message of the day']);
  $lMessage = $conversation->createMessage(['user_id' => $this->user_id, 'message' => 'last message of the day']);

  expect($conversation->last_message()->latest('id')->first()->id)->toBe($lMessage->id);
});

it('has many participants', fn () =>
  expect($this->conversation->participants()->count())->toBeGreaterThan(0)
);

it('has one latest participant', function() {
  $user = auth()->user();
  $conversation = $user->conversations()->create([
    'name'    => $this->faker->name.' Group',
    'user_id' => $user->id,
  ]);

  $otherUser = ($this->mockUser)();

  $conversation->addParticipant($otherUser);
  $participant = $conversation->participant()->latest('id')->first();

  expect($participant->user_id)->toBe($otherUser->id);
});

it('has one other participant', function() {
  $otherParticipant = $this->conversation->otherParticipant($this->user_id)->first();

  expect($otherParticipant->user_id)->not->toBe($this->user_id);
});

it('has many other participants', function() {
  $otherParticipants = $this->conversation->otherParticipants($this->user_id)->pluck('user_id');

  expect(in_array($this->user_id, $otherParticipants->toArray()))->toBe(false);
});

it('has many messages', function() {
  $this->conversation->createMessage(
    ['user_id' => $this->user_id, 'message' => 'hello1']
  );
  $this->conversation->createMessage(
    ['user_id' => $this->user_id, 'message' => 'hello2']
  );

  $count = $this->conversation->messages()->whereType('user')->count();

  expect($count)->toBeGreaterThan(1);
});

it('has many unread messages', function() {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();

  $conversation = $user->conversations()->create([
    'name'    => $this->faker->name.' Group',
    'user_id' => $user->id,
  ]);

  $conversation->addParticipant($otherUser);

  $participant = $conversation->participant($otherUser->id)->first();

  expect($participant->user_id)->toBe($otherUser->id);

  $conversation->createMessage(
    ['user_id' => $participant->user_id, 'message' => $this->faker->sentence]
  );
  $conversation->createMessage(
    ['user_id' => $participant->user_id, 'message' => $this->faker->sentence]
  );
  $conversation->createMessage(
    ['user_id' => $user->id, 'message' => 'user message1']
  );

  $count = $conversation->unread($user)->count();

  expect($count)->toBe(2);
});

/* Query Tests */

it('should query conversations that have at least a message', function() {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();

  $conversation = ($this->mockConversation)($user);
  $conversation1 = ($this->mockConversation)($user);

  $conversation->createMessage(
    ['user_id' => $user->id, 'message' => $this->faker->sentence]
  );

  expect($user->conversations()->whereHasLastMessage()->count())->toBe(1);
});

it('should query for conversations that doesnt have the user as participant', function() {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();

  $conversation = ($this->mockConversation)($user);
  $conversation1 = ($this->mockConversation)($user);
  $conversation2 = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);

  expect($user->conversations()->whereNotParticipant($otherUser)->count())->toBe(2);
});

/* Collection Tests */

it('should let collection make deliver events', function() {
  Bus::fake();

  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();

  $conversation = ($this->mockConversation)($user);
  $conversation2 = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);
  $conversation2->addParticipant($otherUser);

  $conversation->createMessage(['user_id' => $this->user_id, 'message' => 'first message of the day']);
  $conversation2->createMessage(['user_id' => $this->user_id, 'message' => 'last message of the day']);

  $conversations = Conversation::whereIn('id', [$conversation->id, $conversation2->id])->get();
  $deliveredEvents = $conversations->makeDeliver($otherUser);

  expect(count($deliveredEvents))->toBe(2);

  Bus::assertDispatched(MakeEvent::class);
});
