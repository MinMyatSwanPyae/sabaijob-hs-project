<?php

namespace Database\Factories;

use App\Models\Vacancy;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text,
            'location' => $this->faker->city,
            'closing_date' => $this->faker->date,
        ];
    }
}
