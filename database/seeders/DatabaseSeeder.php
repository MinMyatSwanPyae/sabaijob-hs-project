<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\Company;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(30)->create();
        Vacancy::factory(50)->create();
        Company::factory(20)->create();
    }
}
