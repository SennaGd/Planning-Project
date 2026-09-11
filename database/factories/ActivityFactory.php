<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('now', '+2 days');

        return [
            'uid' => fake()->uuid(),
            'dt_stamp' => now(),
            'dt_start' => $start,
            'dt_end' => (clone $start)->modify('+1 hour'),
            'summary' => fake()->sentence(3),
            'description' => fake()->sentence(),
            'location' => fake()->bothify('Gate ##'),
            'status' => 'CONFIRMED',
            'text' => fake()->word(),
            'version' => 1,
            'attendee' => fake()->company(),
        ];
    }
}
