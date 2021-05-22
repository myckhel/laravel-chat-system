<?php

return [
  /*
  * Models
  */
  "models" => [
    "user"          => "App\\Models\\User",
    "conversation"  => "Myckhel\\ChatSystem\\Models\\Conversation",
    "conversation_user"  => "Myckhel\\ChatSystem\\Models\\ConversationUser",
    "message"       => "Myckhel\\ChatSystem\\Models\\Message",
    "chat_event"    => "Myckhel\\ChatSystem\\Models\\ChatEvent",
    "meta"          => "Myckhel\\ChatSystem\\Models\\Meta",
  ],

  /*
  * Routes
  */
  "route" => [
    "middlewares" => ['api'],
    "prefix" => 'api'
  ],

  /*
  * Events Queues
  */
  "queues" => [
    "events" => [
      "message" => [
        "created" => "chat",
        "events" => "chat-event",
      ],
    ],
    "jobs" => [
      "chat" => [
        "make-event" => "chat-event",
      ],
    ],
  ],

  /*
  * Model Observers
  */
  "observers"         => [
    "models"          => [
      "chat_event"    => 'Myckhel\\ChatSystem\\Observers\\ChatEventObserver',
      "conversation"  => 'Myckhel\\ChatSystem\\Observers\\ConversationObserver',
    ]
  ]
];
