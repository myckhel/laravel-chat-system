<?php

use Binkode\ChatSystem\Events\Message\Events;
use Illuminate\Support\Facades\Event;
use Binkode\ChatSystem\Models\Conversation;
use Binkode\ChatSystem\Models\ChatEvent;
use Binkode\ChatSystem\Events\Message\Created;

beforeEach(function () {
  $this->conversation = Conversation::inRandomOrder()->whereHas('messages')->first();
  $this->message = $this->conversation->messages()->latest()->first();
  $this->chatEvent = [
    'maker_type'  => $this->conversation->author::class,
    'maker_id'    => $this->conversation->user_id,
    'made_type'   => Conversation::class,
    'made_id'     => $this->conversation->id,
  ];
});

it('should dispatch Message/Events Event', function () {
  Event::fake();

  broadcast(new Events(
    new ChatEvent($this->chatEvent + ['type' => 'read'])
  ))->toOthers();

  Event::assertDispatched(Events::class);
});

it('should dispatch Message/Created Event', function () {
  Event::fake();

  broadcast(new Created($this->message));

  Event::assertDispatched(Created::class);
});
