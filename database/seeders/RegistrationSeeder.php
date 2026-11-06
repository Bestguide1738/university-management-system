<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        // registration number => [course code => status]
        $registrations = [
            '2400101' => ['CSC1101' => 'registered', 'MAT1102' => 'registered', 'LAN1101' => 'pending'],
            '2400102' => ['MAT1102' => 'registered', 'CSC1101' => 'pending'],
            '2400103' => ['ISY1103' => 'registered', 'CSC1202' => 'registered', 'LAN1101' => 'registered'],
            '2400104' => ['STA1201' => 'registered', 'MAT1102' => 'registered'],
            '2400105' => ['CSC1202' => 'registered', 'ISY1103' => 'pending'],
            '2400106' => ['ISY1103' => 'registered', 'LAN1101' => 'registered', 'CSC1101' => 'registered'],
        ];

        foreach ($registrations as $regNo => $courseStatuses) {
            $student = Student::where('registration_number', $regNo)->first();

            $sync = [];
            foreach ($courseStatuses as $code => $status) {
                $courseId = Course::where('code', $code)->value('id');
                $sync[$courseId] = ['status' => $status];
            }

            // Adds missing rows, updates the status of existing ones, never duplicates
            $student->courses()->syncWithoutDetaching($sync);
        }
    }
}
