<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Every course is open for students to browse
    public function index(Request $request)
    {
        $student = $request->user()->student;
        abort_unless($student, 403);

        $courses = Course::query()
            ->with('lecturer')
            ->withCount('registrations')
            ->when($request->q, fn ($query, $q) => $query->where(
                fn ($w) => $w->where('code', 'like', "%{$q}%")->orWhere('title', 'like', "%{$q}%")
            ))
            ->when($request->department, fn ($query, $d) => $query->where('department', $d))
            ->when($request->semester, fn ($query, $s) => $query->where('semester', $s))
            ->orderBy('code')
            ->paginate(10)
            ->withQueryString();

        return view('student.courses.index', [
            'courses' => $courses,
            // course_id => status, for the courses this student already registered for
            'mine'    => $student->registrations()->pluck('status', 'course_id'),
        ]);
    }

    public function show(Request $request, Course $course)
    {
        $student = $request->user()->student;
        abort_unless($student, 403);

        return view('student.courses.show', [
            'course' => $course->load('lecturer')->loadCount('registrations'),
            'status' => $student->registrations()->where('course_id', $course->id)->value('status'),
        ]);
    }
}
