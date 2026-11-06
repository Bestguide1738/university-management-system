<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'code', 'title', 'department', 'credits',
        'semester', 'capacity', 'description', 'lecturer_id',
    ];

    // A course is taught by one lecturer
    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }

    // Many-to-many: the students registered for this course
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'course_registrations')
            ->using(CourseRegistration::class)
            ->withPivot('id', 'status')
            ->withTimestamps();
    }

    // The registration records for this course
    public function registrations(): HasMany
    {
        return $this->hasMany(CourseRegistration::class);
    }
}
