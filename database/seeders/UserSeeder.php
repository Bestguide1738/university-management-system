<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@university.ac.ug'],
            [
                'name'     => 'System Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // Replaces any existing roles with exactly this one
        $admin->syncRoles('admin');
    }
}
