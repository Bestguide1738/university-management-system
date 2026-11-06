<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    public function run(): void
    {
        $lecturers = [
            ['name' => 'Dr. Grace Nakato',       'staff_number' => 'L-0101', 'department' => 'Computer Science',    'email' => 'grace.nakato@university.UG.ug'],
            ['name' => 'Dr. Ruth Achieng',       'staff_number' => 'L-0102', 'department' => 'Mathematics',         'email' => 'ruth.achieng@university.UG.ug'],
            ['name' => 'Mr. Peter Ssemwogerere', 'staff_number' => 'L-0103', 'department' => 'Information Systems', 'email' => 'peter.ssemwogerere@university.UG.ug'],
            ['name' => 'Prof. Samuel Mugisha',   'staff_number' => 'L-0104', 'department' => 'Statistics',          'email' => 'samuel.mugisha@university.UG.ug'],
        ];

        foreach ($lecturers as $row) {
            $user = User::updateOrCreate(
                ['email' => $row['email']],
                [
                    'name'     => $row['name'],
                    'password' => Hash::make('password'),
                ]
            );
            $user->syncRoles('lecturer');

            Lecturer::updateOrCreate(
                ['staff_number' => $row['staff_number']],
                [
                    'name'       => $row['name'],
                    'department' => $row['department'],
                    'email'      => $row['email'],
                    'user_id'    => $user->id,
                ]
            );
        }
    }
}
