<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\Company;
use App\Models\Application;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory(10)->create();
        User::factory(10)->create(['role' => 'recruiter']);
        User::factory(40)->create(['role' => 'user']);
        Vacancy::factory(50)->create();
        Application::factory(100)->create();


    }
}
