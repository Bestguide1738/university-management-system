<?php

namespace App\Services;

use App\Exceptions\RegistrationException;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;

// One place for the registration rules, used by both the admin and the student.
class RegistrationService
{
    public function register(Student $student, Course $course, string $status = 'registered'): CourseRegistration
    {
        return DB::transaction(function () use ($student, $course, $status) {
            // Lock the course row so two people cannot take the last seat together
            $course = Course::whereKey($course->id)->lockForUpdate()->firstOrFail();

            // Rule 1: no duplicate registrations
            $alreadyRegistered = CourseRegistration::where('student_id', $student->id)
                ->where('course_id', $course->id)
                ->exists();

            if ($alreadyRegistered) {
                throw new RegistrationException(
                    "{$student->name} is already registered for {$course->code}."
                );
            }

            // Rule 2: the course must still have seats
            if ($course->registrations()->count() >= $course->capacity) {
                throw new RegistrationException(
                    "{$course->code} is full ({$course->capacity} of {$course->capacity} seats taken)."
                );
            }

            try {
                return CourseRegistration::create([
                    'student_id' => $student->id,
                    'course_id'  => $course->id,
                    'status'     => $status,
                ]);
            } catch (UniqueConstraintViolationException) {
                // The database unique index is the last line of defence
                throw new RegistrationException(
                    "{$student->name} is already registered for {$course->code}."
                );
            }
        });
    }
}
