<?php

namespace Binkode\ChatSystem\Database\Factories;

use Binkode\ChatSystem\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConversationFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Conversation::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'name' => $this->faker->firstname . '\'s Group',
    ];
  }
}
