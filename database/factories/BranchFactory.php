<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Company;

class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'company_id' => Company::factory(),
            'description' => $this->faker->text(),
            'street_name' => $this->faker->word(),
            'street_number' => $this->faker->word(),
            'city' => $this->faker->city(),
        ];
    }
}
