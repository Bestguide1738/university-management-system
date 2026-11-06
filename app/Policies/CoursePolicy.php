<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    public function view(User $user, Course $course): bool
    {
        return $user->hasAnyRole(['admin', 'lecturer', 'student']);
    }

    public function viewRegistrations(User $user, Course $course): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasRole('lecturer')
            && $course->lecturer?->user_id === $user->id;
    }
}
