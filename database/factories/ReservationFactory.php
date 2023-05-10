<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        $event = Event::factory()->create();

        return [
            'event_id' => $event->id,
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'num_tickets' => $this->faker->numberBetween(1, $event->max_attendees),
        ];
    }
}
