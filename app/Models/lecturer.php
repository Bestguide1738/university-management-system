<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecturer extends Model
{
    protected $fillable = ['user_id', 'name', 'staff_number', 'department', 'email'];

    // The login account for this lecturer
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // One lecturer teaches many courses
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
