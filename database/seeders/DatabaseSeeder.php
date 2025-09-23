<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1) Company
        $company = Company::firstOrCreate(
            ['company_name' => 'Tech Corp'], // attribute pencarian
            [
                'company_address' => 'Jl. Mawar No. 123',
                'company_email'   => 'info@techcorp.com',
                'password'        => Hash::make('password'), // gabung di argumen ke-2
            ]
        );

        // 2) Department
        $dept = Department::firstOrCreate(
            [
                'company_id'       => $company->id,
                'department_name'  => 'IT Department',
            ]
        );

        // 3) Roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $userRole  = Role::firstOrCreate(['name' => 'User']); // tambahkan role User

        // 4) Users
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'company_id'     => $company->id,
                'department_id'  => $dept->id,
                'role_id'        => $adminRole->id, // admin pakai role Admin
                'full_name'      => 'Admin User',
                'phone_number'   => '08123456789',
                'password'       => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'company_id'     => $company->id,
                'department_id'  => $dept->id,
                'role_id'        => $userRole->id, // user pakai role User
                'full_name'      => 'Regular User',
                'phone_number'   => '08987654321',
                'password'       => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
