<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Roles must exist before any user is given one.
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            LecturerSeeder::class,
            CourseSeeder::class,
            StudentSeeder::class,
            RegistrationSeeder::class,
        ]);
    }
}
