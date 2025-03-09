<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company,
            'description' => $this->faker->optional()->text(200),
            'website' => $this->faker->optional()->url,
            'recruiter_id' => $this->faker->numberBetween(1, 30)
        ];
    }
}