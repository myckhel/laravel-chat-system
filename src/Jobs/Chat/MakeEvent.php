<?php

namespace Myckhel\ChatSystem\Jobs\Chat;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Myckhel\ChatSystem\Models\Message;
use Myckhel\ChatSystem\Traits\Config;

class MakeEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user, $type, $conversation;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $type = 'deliver', $conversation = null)
    {
      $this->user = $user;
      $this->type = $type;
      $this->conversation = $conversation;
      $this->onQueue(Config::config("jobs.chat.make-event"));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $conversation = $this->conversation;
      if ($this->type == 'read') {
        if ($conversation->unread($this->user)->first()) {
          $conversation->makeRead($this->user);
        }
      } else {
        // get unread msg for conversations
        $undelivered = Config::config('models.message')::with('conversation')
        ->notMsgEvents('deliver', $this->user->id, fn ($q) =>
          $q->whereIn('id', $conversation->pluck('id'))
        )->where('user_id', '!=', $this->user->id)->get();

        $undelivered->map(fn ($msg) => $msg->conversation->makeDelivery($this->user));
      }
    }
}
