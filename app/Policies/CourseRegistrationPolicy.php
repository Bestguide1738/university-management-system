<?php

namespace App\Policies;

use App\Models\CourseRegistration;
use App\Models\User;

class CourseRegistrationPolicy
{
    public function view(User $user, CourseRegistration $registration): bool
    {
        return $user->hasRole('admin') || $this->owns($user, $registration);
    }

    public function delete(User $user, CourseRegistration $registration): bool
    {
        return $user->hasRole('admin') || $this->owns($user, $registration);
    }

    private function owns(User $user, CourseRegistration $registration): bool
    {
        return $user->hasRole('student')
            && $registration->student?->user_id === $user->id;
    }
}
