<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 Companies FIRST
        $companies = Company::factory(10)->create();

        // Select the first company (OR choose a random one)
        $firstCompany = $companies->first(); // Assign to the first company
        // $randomCompany = $companies->random(); // If you prefer a random company

        // NOW create MinMyatSwan and assign to a company
        $adminUser = User::create([
            'name' => 'MinMyatSwan',
            'email' => 'swan@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'company_id' => $firstCompany->id, // Fix: Now $firstCompany exists
        ]);

        // Create a regular user (not assigned to a company)
        $regularUser = User::create([
            'name' => 'Calvin',
            'email' => 'calvin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
            'company_id' => null,
        ]);

        // Ensure each company has at least one admin and some users
        foreach ($companies as $company) {
            // Create another admin for each company (except the one MinMyatSwan is assigned to)
            if ($company->id !== $firstCompany->id) {
                User::factory()->create([
                    'company_id' => $company->id,
                    'role' => 'admin',
                ]);
            }

            // Create additional users (non-admins)
            User::factory(5)->create([
                'company_id' => $company->id,
                'role' => 'user',
            ]);
        }

        // Create vacancies for companies
        Vacancy::factory(50)->create();

        // Create applications for vacancies
        Application::factory(100)->create();
    }
}
