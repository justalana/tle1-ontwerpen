<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Day;
use App\Models\TimeSlot;
use App\Models\Vacancy;

class TimeSlotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimeSlot::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'day_id' => Day::factory(),
            'vacancy_id' => Vacancy::factory(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'optional' => $this->faker->boolean(),
        ];
    }
}
