<?php

use Binkode\ChatSystem\Models\Conversation;
use Binkode\ChatSystem\Events\Message\Events;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
  $this->conversation = Conversation::inRandomOrder()->whereHas('messages')->first();

  $this->user_id = $this->conversation->user_id;

  $this->message = $this->conversation->messages()->latest()->first();

  $this->chatEvent = [
    'maker_type'  => $this->conversation->author::class,
    'maker_id'    => $this->conversation->user_id,
    'made_type'   => Conversation::class,
    'made_id'     => $this->conversation->id,
  ];

  $this->mockMessage = fn($conversation, $user) => $conversation->createMessage(['user_id' => $user->id ?? $user, 'message' => $this->faker->sentence]);
});


it('can make a read event', function () {
  Event::fake([Events::class]);

  $readEvent = $this->conversation->makeRead($this->conversation->author);

  expect($readEvent)->toMatchArray($this->chatEvent + ['type' => 'read']);

  Event::assertDispatched(Events::class);
});

it('can make a deliver event', function () {
  Event::fake([Events::class]);

  $readEvent = $this->conversation->makeDeliver($this->conversation->author);

  expect($readEvent)->toMatchArray($this->chatEvent + ['type' => 'deliver']);

  Event::assertDispatched(Events::class);
});

it('can make a delete event', function () {
  Event::fake([Events::class]);

  $readEvent = $this->conversation->makeDelete($this->conversation->author);

  expect($readEvent)->toMatchArray($this->chatEvent + ['type' => 'delete']);

  Event::assertDispatched(Events::class);
});

it(
  'has isSender attribute',
  fn() =>
  expect($this->message)->toHaveKey('isSender')
);

it('check whether all participants - 1 has deleted the message', function () {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();
  $conversation = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);

  $message = ($this->mockMessage)($conversation, $user);
  $message1 = ($this->mockMessage)($conversation, $user);

  $message->makeDelete($user);

  expect($message->participantsHasDeleted())->ToBeTrue();
  expect($message1->participantsHasDeleted())->ToBeFalse();
});

/*
 * Query Tests
*/

it('adds condition where user is not the message sender to query', function () {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();
  $conversation = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $user);
  ($this->mockMessage)($conversation, $otherUser);
  ($this->mockMessage)($conversation, $otherUser);

  expect($conversation->messages()->whereType('user')->whereNotSender($otherUser)->count())->toBe(1);
  expect($conversation->messages()->whereType('user')->whereNotSender($otherUser)->count())->toBe(1);
  expect($conversation->messages()->whereType('user')->whereNotSender($user)->count())->toBe(2);
});

it('adds condition where message is the given reply', function () {
  $conversation = $this->conversation;

  $replyMessage = $conversation->replyMessage($this->message, ['user_id' => $this->user_id, 'message' => $this->faker->word]);

  expect($conversation->messages()->whereReply($replyMessage)->first())->toMatchArray($replyMessage->toArray());
});

it('adds condition where conversation doesnt have chat events', function () {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();
  $conversation = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $this->user_id);
  $message1 = ($this->mockMessage)($conversation, $this->user_id);

  // sleep so chat_events.created_at wont equal messages.created_at
  sleep(1);

  $message1->makeDelete($otherUser);
  $conversation->makeRead($otherUser);
  $conversation->makeDeliver($otherUser);

  $query = $conversation->messages()->whereType('user');

  // messages not deleted by user
  expect(
    $query
      ->whereDoesntHaveChatEvents('delete', $user)
      ->count()
  )->tobe(2);

  // messages not deleted by other user
  expect(
    $query
      ->whereNotDeletedBy($otherUser)
      ->count()
  )->tobe(1);

  // messages not read by other user
  expect(
    $query
      ->whereNotReadBy($otherUser)
      ->count()
  )->tobe(0);

  // messages not delivered to other user
  expect(
    $query
      ->whereNotDeliveredTo($otherUser)
      ->count()
  )->tobe(0);
});

it('adds query where message have chat events', function () {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();
  $conversation = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $this->user_id);
  $message1 = ($this->mockMessage)($conversation, $this->user_id);

  $message1->makeDelete($otherUser);

  expect(
    $conversation->messages()->whereType('user')
      ->hasEvent(fn($q) => $q->whereMakerId($otherUser->id))
      ->count()
  )->tobe(1);
});

it('adds query where message doesnt have chat events', function () {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();
  $conversation = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $this->user_id);
  $message1 = ($this->mockMessage)($conversation, $this->user_id);

  $message1->makeDelete($otherUser);

  expect(
    $conversation->messages()->whereType('user')
      ->hasNoEvent(fn($q) => $q->whereMakerId($otherUser->id))
      ->count()
  )->tobe(1);
});

it('adds query where message conversation was not deleted after the message was created', function () {
  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();
  $conversation = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);

  ($this->mockMessage)($conversation, $this->user_id);

  sleep(1);

  $conversation->makeDelete($otherUser);
  ($this->mockMessage)($conversation, $this->user_id);
  ($this->mockMessage)($conversation, $this->user_id);

  expect(
    $conversation->messages()->whereType('user')
      ->whereConversationWasntDeleted($otherUser)
      ->count()
  )->tobe(2);
});

/*
 * Collection Tests
*/
it('should let collection make events', function () {
  Event::fake([Events::class]);

  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();

  $conversation = ($this->mockConversation)($user);

  $lMessage = $conversation->addParticipant($otherUser);

  $fMessage = ($this->mockMessage)($conversation, $this->user_id);
  $lMessage = ($this->mockMessage)($conversation, $this->user_id);

  $messages = $conversation->messages()->whereType('user')->get();

  $deliveredEvents = $messages->makeDeliver($otherUser);
  $readEvents = $messages->makeRead($otherUser);
  $deletedEvents = $messages->makeDelete($otherUser);

  expect(count($deliveredEvents))->toBe(2);
  expect(count($readEvents))->toBe(2);
  expect(count($deletedEvents))->toBe(2);

  Event::assertDispatched(Events::class, 2 * 3);
});

/* Relationship Tests */

it('belongs to a conversation', function () {
  $this->message->makeRead($this->message->sender);
  expect($this->message->conversation)->toHaveKeys(['id', 'name']);
});

it('have many chatEvents', function () {
  $this->message->makeRead($this->message->sender);
  expect($this->message->chatEvents->first())->toHaveKeys(['id', 'maker_id']);
});

it('belongs to a sender', function () {
  $this->message->makeRead($this->message->sender);
  expect($this->message->sender)->toHaveKeys(['id', 'name']);
});

it('belongs to a reply of a model', function () {
  $replyMessage = $this->conversation->replyMessage($this->message, ['user_id' => $this->user_id, 'message' => $this->faker->word]);

  expect($replyMessage->reply->id)->toBe($this->message->id);
});
