<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Requirement;
use App\Models\ApplicationRequirement;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequirementApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApplicationRequirement::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'application_id' => Application::factory(),
            'requirement_id' => Requirement::factory(),
        ];
    }
}
