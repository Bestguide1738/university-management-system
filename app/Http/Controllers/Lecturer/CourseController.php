<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    // Only the courses assigned to the signed-in lecturer
    public function index(Request $request)
    {
        $lecturer = $request->user()->lecturer;
        abort_unless($lecturer, 403);

        $courses = $lecturer->courses()->withCount('registrations')->orderBy('code')->get();

        return view('lecturer.courses.index', compact('courses'));
    }

    // A course and its registered students, only if it is the lecturer's own
    public function show(Request $request, Course $course)
    {
        Gate::authorize('viewRegistrations', $course);   // 403 for another lecturer's course

        $registrations = $course->registrations()
            ->with('student')
            ->when($request->q, fn ($query, $q) => $query->whereHas('student', fn ($s) => $s
                ->where('name', 'like', "%{$q}%")
                ->orWhere('registration_number', 'like', "%{$q}%")))
            ->when($request->status, fn ($query, $s) => $query->where('status', $s))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('lecturer.courses.show', [
            'course'        => $course->loadCount('registrations'),
            'registrations' => $registrations,
        ]);
    }
}
