<?php

namespace Binkode\ChatSystem\Database\Seeders;

use Illuminate\Database\Seeder;
use Binkode\ChatSystem\Models\Conversation;
use Binkode\ChatSystem\Models\ConversationUser;
use Faker\Factory as Faker;
use Binkode\ChatSystem\Config;

class ConversationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $userModel  = Config::config('models.user');
    $conversationModel  = Config::config('models.conversation');
    $user_key = (new $userModel)->getKeyName();
    $faker = Faker::create();
    $users = $userModel::pluck($user_key)->toArray();
    $conversationModel::factory()->count($faker->numberBetween(min(100, count($users)), count($users)))
      ->hasParticipants(
        $faker->numberBetween(3, 5),
        fn($attributes, $conversation) =>
        [
          'user_id' => $faker->randomElement(
            collect($users)->filter(fn($id) => $id != $conversation->user_id)
          ),
          'conversation_id' => $conversation->id,
        ]
      )
      ->hasMessages(
        $faker->numberBetween(1, 5),
        fn(array $attributes, $conversation) =>
        [
          'conversation_id' => $conversation->id,
          'user_id' => $faker->randomElement([
            $conversation->author->id,
            $conversation
              ->query()
              ->whereNotParticipant($conversation->author)
              ->inRandomOrder()
              ->first()->user_id,
          ])
        ]
      )
      ->create([
        'user_id' => $faker->randomElement($users),
      ]);
  }
}
