<?php

return [
  "models" => [
    "user"          => "App\\Models\\User",
    "conversation"  => "Myckhel\\ChatSystem\\Models\\Conversation",
    "conversation_user"  => "Myckhel\\ChatSystem\\Models\\ConversationUser",
    "message"       => "Myckhel\\ChatSystem\\Models\\Message",
    "chat_event"    => "Myckhel\\ChatSystem\\Models\\ChatEvent",
    "meta"          => "Myckhel\\ChatSystem\\Models\\Meta",
  ],
  "route" => [
    "middlewares" => ['api'],
    "prefix" => 'api'
  ],
];
