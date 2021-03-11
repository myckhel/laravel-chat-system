<?php

return [
  "user_model" => "App\\Models\\User",
  "route" => [
    "middlewares" => ['api'],
    "prefix" => 'api'
  ],
];
