<?php

namespace Binkode\ChatSystem\Database\Factories;

use Binkode\ChatSystem\Models\Message;
use Binkode\ChatSystem\Models\ChatEvent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Binkode\ChatSystem\Config;

class MessageFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Message::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'message' => $this->faker->realText(200, 2),
    ];
  }

  function configure()
  {
    return $this->afterCreating(function ($message) {
      try {
        ChatEvent::factory()->count($this->faker->numberBetween(0, 3))->create([
          'made_id'     => $message->id,
          'made_type'   => $message::class,
          'maker_id'    => $this->faker->randomElement([
            $message->user_id,
            $message->load([
              'conversation' => fn($q) =>
              $q->whereNotParticipant($message->user_id)->with('participant')
            ])->conversation->participant->user_id,
          ]),
          'maker_type'   => Config::config('models.user'),
        ]);
      } catch (\Exception $e) {
      }
    });
  }
}
