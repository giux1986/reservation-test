<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeThisYear,
            'time' => $this->faker->time('H:i'),
            'location' => $this->faker->address,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'attendee_limit' => $this->faker->numberBetween(10, 100),
        ];
    }
}
