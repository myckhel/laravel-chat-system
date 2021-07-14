<?php

return [
  /*
  * ChatSystem Models
  */
  "models" => [
    /*
    * The model you want to use as a User model needs to implement the
    * `Myckhel\ChatSystem\Contracts\ChatEventMaker` contract.
    */
    "user"                => "App\\Models\\User",

    /*
    * The model you want to use as a Conversation model needs to implement the
    * `Myckhel\ChatSystem\Contracts\IConversation` contract.
    */
    "conversation"        => Myckhel\ChatSystem\Models\Conversation::class,

    /*
    * The model you want to use as a ConversationUser model needs to implement the
    * `Myckhel\ChatSystem\Contracts\IConversationUser` contract or extends the
    * `Myckhel\ChatSystem\Models\ConversationUser`
    */
    "conversation_user"   => Myckhel\ChatSystem\Models\ConversationUser::class,

    /*
    * The model you want to use as a Message model needs to implement the
    * `Myckhel\ChatSystem\Contracts\IMessage` contract or extends the
    * `Myckhel\ChatSystem\Models\Message`
    */
    "message"             => Myckhel\ChatSystem\Models\Message::class,

    /*
    * The model you want to use as a ChatEvent model needs to implement the
    * `Myckhel\ChatSystem\Contracts\IChatEvent` contract or extends the
    * `Myckhel\ChatSystem\Models\ChatEvent`
    */
    "chat_event"          => Myckhel\ChatSystem\Models\ChatEvent::class,
  ],

  /*
  * ChatSystem Routes
  * Change if you want to add middleware or prefix to
  * chatSystem routes.
  */
  "route" => [
    "middlewares" => ['api'],
    "prefix"      => 'api'
  ],

  /*
  * Events Queues
  * Change if you want to rename the broadcast queue
  */
  "queues" => [
    "events" => [
      "message" => [
        "created" => "chat",
        "events"  => "chat-event",
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
  * The class you want to use for model Observer
  */
  "observers"         => [
    "models"          => [
      "chat_event"    => Myckhel\ChatSystem\Observers\ChatEventObserver::class,
      "conversation"  => Myckhel\ChatSystem\Observers\ConversationObserver::class,
    ]
  ]
];
