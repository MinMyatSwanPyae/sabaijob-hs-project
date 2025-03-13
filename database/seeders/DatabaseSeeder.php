<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\Company;
use App\Models\Application;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'MinMyatSwan',
            'email' => 'swan@gmail.com',
            'password' => '123456',
            'role' => 'admin'
        ]);

        Company::factory(10)->create();
        User::factory(10)->create(['role' => 'admin']);
        User::factory(40)->create(['role' => 'user']);
        Vacancy::factory(50)->create();
        Application::factory(100)->create();


    }
}
