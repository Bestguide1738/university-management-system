<?php

namespace App\Http\Controllers\Student;

use App\Exceptions\RegistrationException;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Services\RegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RegistrationController extends Controller
{
    // Only the signed-in student's own registrations
    public function index(Request $request)
    {
        $student = $request->user()->student;
        abort_unless($student, 403);

        $registrations = $student->registrations()->with('course.lecturer')->latest()->get();

        return view('student.registrations.index', [
            'registrations' => $registrations,
            'creditCount'   => $registrations->sum(fn ($r) => $r->course->credits),
        ]);
    }

    // Register the signed-in student for a course
    public function store(Request $request, Course $course, RegistrationService $registrations)
    {
        $student = $request->user()->student;
        abort_unless($student, 403);

        try {
            // Student registrations wait for the administrator's approval
            $registrations->register($student, $course, 'pending');
        } catch (RegistrationException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('student.registrations.index')
            ->with('status', "You registered for {$course->code}. It is waiting for approval.");
    }

    // Drop a course; a student cannot drop someone else's registration
    public function destroy(CourseRegistration $registration)
    {
        Gate::authorize('delete', $registration);

        $code = $registration->course->code;
        $registration->delete();

        return back()->with('status', "You dropped {$code}.");
    }
}
