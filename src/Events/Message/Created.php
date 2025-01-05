<?php

namespace Binkode\ChatSystem\Events\Message;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Binkode\ChatSystem\Config;
use Binkode\ChatSystem\Contracts\IMessage;

class Created implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;
  public $broadcastQueue = 'chat';
  public $message;

  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(IMessage $message)
  {
    $this->message = $message;
    $this->broadcastQueue = Config::config("queues.events.message.created");
  }

  public function broadcastAs()
  {
    return 'App\\Events\\Binkode\\ChatSystem\\Events\\Message';
  }

  function broadcastWith()
  {
    return [
      'message' => $this->message,
    ];
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
  public function broadcastOn()
  {
    $ids = $this->message->participants()->pluck('user_id')->toArray();

    return array_merge(
      [new PrivateChannel("message-created.{$this->message->conversation_id}")],
      array_map(fn($id) => new PrivateChannel("message-new.user.{$id}"), $ids)
    );
  }
}
