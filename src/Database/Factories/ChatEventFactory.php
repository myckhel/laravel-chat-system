<?php

namespace Myckhel\ChatSystem\Database\Factories;

use Myckhel\ChatSystem\Models\ChatEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'type' => $this->faker->randomElement(['read', 'delete', 'deliver']),
        ];
    }
}
