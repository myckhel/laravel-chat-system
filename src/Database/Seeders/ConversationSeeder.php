<?php

namespace Myckhel\ChatSystem\Database\Seeders;

use Illuminate\Database\Seeder;
use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Models\ConversationUser;
use Faker\Factory as Faker;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $userModel  = config('chat-system.models.user');
      $conversationModel  = config('chat-system.models.conversation');
      $user_key = (new $userModel)->getKeyName();
      $faker = Faker::create();
      $users = $userModel::pluck($user_key)->toArray();
      $conversationModel::factory()->count($faker->numberBetween(min(100, count($users)), count($users)))
      ->hasParticipants($faker->numberBetween(2, 4), fn ($attributes, $conversation) =>
        [
          'user_id' => $faker->randomElement($users),
          'conversation_id' => $conversation->id,
        ]
      )
      ->hasMessages($faker->numberBetween(1, 5), fn (array $attributes, $conversation) =>
        [
          'conversation_id' => $conversation->id,
          'user_id' => $faker->randomElement([
            $conversation->author->id,
            $conversation->query()->whereNotParticipant($conversation->author)
              ->first()->user_id,
          ])
        ]
      )
      ->create([
        'user_id' => $faker->randomElement($users),
      ]);
    }
}
