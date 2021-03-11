<?php

use Illuminate\Support\Facades\Broadcast;
use Myckhel\ChatSystem\Broadcasting\Chat\MessageChannel;
use Myckhel\ChatSystem\Broadcasting\Chat\ConversationChannel;
use Myckhel\ChatSystem\Broadcasting\Chat\UserMessageChannel;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
Broadcast::channel('message-event-created.{conversation}', ConversationChannel::class);
Broadcast::channel('message-created.{conversation}', ConversationChannel::class);
Broadcast::channel('message-new.user.{user}', UserMessageChannel::class);
Broadcast::channel('message-event.user.{user}', UserMessageChannel::class);
