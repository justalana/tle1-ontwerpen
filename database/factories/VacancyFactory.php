<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Vacancy;

class VacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::factory(),
            'salary_min' => $this->faker->randomFloat(0, 0, 9999999999.),
            'salary_max' => $this->faker->randomFloat(0, 0, 9999999999.),
            'work_hours' => $this->faker->numberBetween(-8, 8),
            'contract_duration' => $this->faker->randomNumber(),
            'description' => $this->faker->text(),
            'image_file_path' => $this->faker->word(),
        ];
    }
}
