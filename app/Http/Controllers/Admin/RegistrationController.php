<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\RegistrationException;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $registrations = CourseRegistration::query()
            ->with(['student', 'course'])
            ->when($request->q, fn ($query, $q) => $query->whereHas('student', fn ($s) => $s
                ->where('name', 'like', "%{$q}%")
                ->orWhere('registration_number', 'like', "%{$q}%")))
            ->when($request->course, fn ($query, $c) => $query->where('course_id', $c))
            ->when($request->status, fn ($query, $s) => $query->where('status', $s))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.registrations.index', [
            'registrations' => $registrations,
            'courses'       => Course::orderBy('code')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.registrations.create', [
            'students' => Student::orderBy('name')->get(),
            'courses'  => Course::withCount('registrations')->orderBy('code')->get(),
        ]);
    }

    public function store(Request $request, RegistrationService $registrations)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_id'  => ['required', 'exists:courses,id'],
            'status'     => ['required', 'in:' . implode(',', config('university.statuses'))],
        ]);

        $student = Student::findOrFail($data['student_id']);
        $course  = Course::findOrFail($data['course_id']);

        try {
            $registrations->register($student, $course, $data['status']);
        } catch (RegistrationException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.registrations.index')
            ->with('status', "{$student->name} was registered for {$course->code}.");
    }

    // Approve a pending registration
    public function update(CourseRegistration $registration)
    {
        $registration->update(['status' => 'registered']);

        return back()->with('status', "Registration for {$registration->course->code} was approved.");
    }

    public function destroy(CourseRegistration $registration)
    {
        $label = "{$registration->student->name} / {$registration->course->code}";
        $registration->delete();

        return back()->with('status', "Registration removed ({$label}).");
    }
}
