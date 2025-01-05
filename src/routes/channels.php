<?php

use Illuminate\Support\Facades\Broadcast;
use Binkode\ChatSystem\Broadcasting\Chat\MessageChannel;
use Binkode\ChatSystem\Broadcasting\Chat\ConversationChannel;
use Binkode\ChatSystem\Broadcasting\Chat\UserMessageChannel;

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

Broadcast::channel('message-created.{conversation}', ConversationChannel::class);
Broadcast::channel('message-new.user.{user}', UserMessageChannel::class);
Broadcast::channel('message-event.user.{user}', UserMessageChannel::class);
