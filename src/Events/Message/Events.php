<?php

namespace Myckhel\ChatSystem\Events\Message;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Myckhel\ChatSystem\Models\Message;

class Events implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $broadcastQueue = 'chat-event';
    public $event, $conversation_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($event){
      $this->event = $event;
      if ($event->type == 'delete' && $event->made_type == Message::class) {
        $this->conversation_id = $event->made->conversation->id;
        $event->unsetRelation('made');
      }
      $this->broadcastQueue = config("chat-system.queues.events.message.events");
    }

    public function broadcastAs()
    {
      return "message";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
      $event = $this->event;
      $conversation_id = $this->conversation_id;
      if ($event->type == 'delete' && $event->made_type == Message::class) {
        if ($event->all) {
          return new PrivateChannel("message-event-created.{$conversation_id}");
        } else {
          return new PrivateChannel("message-event.user.{$this->event->maker_id}");
        }
      } else {
        return new PrivateChannel("message-event-created.{$this->event->made_id}");
      }
    }
}
