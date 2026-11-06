<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['name' => 'Amina Kato',    'registration_number' => '2400101', 'programme' => 'BSc Computer Science',    'email' => 'amina.kato@university.ac.ug',    'year' => 1],
            ['name' => 'Brian Okello',  'registration_number' => '2400102', 'programme' => 'BSc Mathematics',         'email' => 'brian.okello@university.ac.ug',  'year' => 1],
            ['name' => 'Carol Namuli',  'registration_number' => '2400103', 'programme' => 'BSc Information Systems', 'email' => 'carol.namuli@university.ac.ug',  'year' => 2],
            ['name' => 'David Mugabi',  'registration_number' => '2400104', 'programme' => 'BSc Statistics',          'email' => 'david.mugabi@university.ac.ug',  'year' => 2],
            ['name' => 'Esther Atim',   'registration_number' => '2400105', 'programme' => 'BSc Computer Science',    'email' => 'esther.atim@university.ac.ug',   'year' => 3],
            ['name' => 'Felix Ochieng', 'registration_number' => '2400106', 'programme' => 'BSc Information Systems', 'email' => 'felix.ochieng@university.ac.ug', 'year' => 1],
        ];

        foreach ($students as $row) {
            $user = User::updateOrCreate(
                ['email' => $row['email']],
                [
                    'name'     => $row['name'],
                    'password' => Hash::make('password'),
                ]
            );
            $user->syncRoles('student');

            Student::updateOrCreate(
                ['registration_number' => $row['registration_number']],
                [
                    'name'      => $row['name'],
                    'programme' => $row['programme'],
                    'email'     => $row['email'],
                    'year'      => $row['year'],
                    'user_id'   => $user->id,
                ]
            );
        }
    }
}
