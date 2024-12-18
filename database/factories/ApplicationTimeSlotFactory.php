<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Application;
use App\Models\ApplicationTimeSlot;
use App\Models\Day;
use App\Models\Vacancy;

class ApplicationTimeSlotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApplicationTimeSlot::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'day_id' => Day::factory(),
            'vacancy_id' => Vacancy::factory(),
            'application_id' => Application::factory(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'optional' => $this->faker->boolean(),
        ];
    }
}
