<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $student = $request->user()->student;
        abort_unless($student, 403);

        $registrations = $student->registrations()->with('course.lecturer')->latest()->get();

        return view('student.dashboard', [
            'student'       => $student,
            'registrations' => $registrations,
            'creditCount'   => $registrations->sum(fn ($r) => $r->course->credits),
            'pendingCount'  => $registrations->where('status', 'pending')->count(),
            'openCourses'   => Course::count(),
        ]);
    }
}
