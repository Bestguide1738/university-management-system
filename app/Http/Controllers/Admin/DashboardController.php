<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Lecturer;
use App\Models\Student;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $fullCourses = Course::withCount('registrations')->get()
            ->filter(fn ($course) => $course->registrations_count >= $course->capacity)
            ->count();

        return view('admin.dashboard', [
            'studentCount'      => Student::count(),
            'lecturerCount'     => Lecturer::count(),
            'courseCount'       => Course::count(),
            'registrationCount' => CourseRegistration::count(),
            'pendingCount'      => CourseRegistration::where('status', 'pending')->count(),
            'fullCourses'       => $fullCourses,
            'recent'            => CourseRegistration::with(['student', 'course'])->latest()->take(5)->get(),
        ]);
    }
}
