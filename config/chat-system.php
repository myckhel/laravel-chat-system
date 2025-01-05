<?php

return [
  /*
  * ChatSystem Models
  */
  "models" => [
    /*
    * The model you want to use as a User model needs to implement the
    * `Binkode\ChatSystem\Contracts\IChatEventMaker` contract.
    */
    "user"                => "App\\Models\\User",

    /*
    * The model you want to use as a Conversation model needs to implement the
    * `Binkode\ChatSystem\Contracts\IConversation` contract.
    */
    "conversation"        => Binkode\ChatSystem\Models\Conversation::class,

    /*
    * The model you want to use as a ConversationUser model needs to implement the
    * `Binkode\ChatSystem\Contracts\IConversationUser` contract or extends the
    * `Binkode\ChatSystem\Models\ConversationUser`
    */
    "conversation_user"   => Binkode\ChatSystem\Models\ConversationUser::class,

    /*
    * The model you want to use as a Message model needs to implement the
    * `Binkode\ChatSystem\Contracts\IMessage` contract or extends the
    * `Binkode\ChatSystem\Models\Message`
    */
    "message"             => Binkode\ChatSystem\Models\Message::class,

    /*
    * The model you want to use as a ChatEvent model needs to implement the
    * `Binkode\ChatSystem\Contracts\IChatEvent` contract or extends the
    * `Binkode\ChatSystem\Models\ChatEvent`
    */
    "chat_event"          => Binkode\ChatSystem\Models\ChatEvent::class,
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
      "chat_event"    => Binkode\ChatSystem\Observers\ChatEventObserver::class,
      "conversation"  => Binkode\ChatSystem\Observers\ConversationObserver::class,
    ]
  ]
];
