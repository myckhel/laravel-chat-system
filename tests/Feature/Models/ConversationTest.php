<?php
use Myckhel\ChatSystem\Models\Conversation;
use Carbon\Carbon;

beforeEach(function() {
  $this->conversation = Conversation::inRandomOrder()->first();
  $this->user_id = $this->conversation->user_id;
  $this->message = $this->conversation->messages()->latest()->first();
});
