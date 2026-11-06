<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['code' => 'CSC1101', 'title' => 'Introduction to Programming', 'department' => 'Computer Science',    'credits' => 4, 'semester' => 1, 'capacity' => 60,  'lecturer' => 'L-0101', 'description' => 'Basic programming concepts, problem solving and algorithms.'],
            ['code' => 'CSC1202', 'title' => 'Data Structures',             'department' => 'Computer Science',    'credits' => 4, 'semester' => 2, 'capacity' => 50,  'lecturer' => 'L-0101', 'description' => 'Arrays, lists, stacks, queues, trees and graphs.'],
            ['code' => 'MAT1102', 'title' => 'Calculus I',                  'department' => 'Mathematics',         'credits' => 3, 'semester' => 1, 'capacity' => 80,  'lecturer' => 'L-0102', 'description' => 'Limits, differentiation and integration.'],
            ['code' => 'ISY1103', 'title' => 'Database Systems',            'department' => 'Information Systems', 'credits' => 3, 'semester' => 1, 'capacity' => 50,  'lecturer' => 'L-0103', 'description' => 'Relational design, SQL and normalisation.'],
            ['code' => 'STA1201', 'title' => 'Probability and Statistics',  'department' => 'Statistics',          'credits' => 3, 'semester' => 2, 'capacity' => 70,  'lecturer' => 'L-0104', 'description' => 'Probability theory, distributions and inference.'],
            ['code' => 'LAN1101', 'title' => 'Communication Skills',        'department' => 'Languages',           'credits' => 2, 'semester' => 1, 'capacity' => 100, 'lecturer' => 'L-0103', 'description' => 'Academic writing and presentation skills.'],
        ];

        foreach ($courses as $row) {
            $lecturerId = Lecturer::where('staff_number', $row['lecturer'])->value('id');
            unset($row['lecturer']);

            // Matched on the unique course code
            Course::updateOrCreate(
                ['code' => $row['code']],
                $row + ['lecturer_id' => $lecturerId]
            );
        }
    }
}
