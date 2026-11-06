<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

// Pivot model for the course_registrations table. Because it has its own
// id column, it can also be used on its own (e.g. in the admin registrations list).
class CourseRegistration extends Pivot
{
    public $incrementing = true;

    protected $table = 'course_registrations';

    protected $fillable = ['student_id', 'course_id', 'status'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
