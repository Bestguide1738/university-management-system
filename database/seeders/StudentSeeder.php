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
            ['name' => 'Ainomugisha Rodney',    'registration_number' => '2400101', 'programme' => 'BSc Computer Science',    'email' => 'rodney.a@university.uni.ug',    'year' => 1],
            ['name' => 'Ahabwe Blessing',  'registration_number' => '2400102', 'programme' => 'BSc Mathematics',         'email' => 'blessing.a@university.uni.ug',  'year' => 1],
            ['name' => 'Tumwine ceasar',  'registration_number' => '2400103', 'programme' => 'BSc Information Systems', 'email' => 'ceasar.T@university.uni.ug',  'year' => 2],
            ['name' => 'Ninsiima Nicole',  'registration_number' => '2400104', 'programme' => 'BSc Statistics',          'email' => 'nicole.n@university.uni.ug',  'year' => 2],
            ['name' => 'Akankunda Doreen',   'registration_number' => '2400105', 'programme' => 'BSc Computer Science',    'email' => 'doreen.a@university.uni.ug',   'year' => 3],
            ['name' => 'Asiimwe husna', 'registration_number' => '2400106', 'programme' => 'BSc Information Systems', 'email' => 'husna.a@university.uni.ug', 'year' => 1],
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
