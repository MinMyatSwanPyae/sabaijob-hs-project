<?php

namespace Database\Factories;
use App\Models\User; 
use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\applications>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'user')->inRandomOrder()->first()->id ?? User::factory()->create(['role' => 'user'])->id,
            'vacancy_id' => Vacancy::factory(),
            'applied_at' => $this->faker->dateTimeThisYear(),
            'cover_letter' => $this->faker->paragraph,
        ];
    }
}
