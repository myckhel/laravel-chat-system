<?php

use Illuminate\Support\Facades\Queue;
use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Jobs\Chat\MakeEvent;

beforeEach(function() {
  $this->conversation = Conversation::inRandomOrder()->first();
  $this->message = $this->conversation->messages()->latest()->first();
  $this->chatEvent = [
    'maker_type'  => $this->conversation->author::class,
    'maker_id'    => $this->conversation->user_id,
    'made_type'   => Conversation::class,
    'made_id'     => $this->conversation->id,
  ];
});

it('should dispatch MakeEvent Job', function () {
  Queue::fake();

  $user = ($this->mockUser)();
  $otherUser = ($this->mockUser)();

  $conversation = ($this->mockConversation)($user);
  $conversation1 = ($this->mockConversation)($user);

  $conversation->addParticipant($otherUser);
  $conversation1->addParticipant($otherUser);

  $conversation->createMessage(
    ['user_id' => $otherUser->id, 'message' => $this->faker->sentence]
  );
  $conversation1->createMessage(
    ['user_id' => $otherUser->id, 'message' => $this->faker->sentence]
  );

  $conversations = $user->conversations;

  MakeEvent::dispatch($user, 'deliver', $conversations);

  Queue::assertPushed(MakeEvent::class);
});
