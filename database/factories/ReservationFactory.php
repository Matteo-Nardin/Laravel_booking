<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Activity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $begin = fake()->date();
        $end = fake()->dateTimeBetween($begin, '+1 hour');
        return [
            'begin' => $begin,
            'end' => $end,

            'user_id' =>  User::get()->random()->id,
            'activity_id' =>  Activity::get()->random()->id,

            //$end_date = fake()->dateTimeBetween($start_date, '+1 month');
        ];
    }
}
