<?php

namespace Database\Factories;

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
        'title' => $this->faker->jobTitle,
        'description' => $this->faker->optional()->paragraph,
        'salary_range' => $this->faker->numberBetween(30000, 100000) . '-' . $this->faker->numberBetween(100001, 200000),
        'location' => $this->faker->city,
        'job_type' => $this->faker->randomElement(['On-site', 'Remote', 'Hybrid']),
        'company_id' => 1, // make this random
        ];
    }
}
