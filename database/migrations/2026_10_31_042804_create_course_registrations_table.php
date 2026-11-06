<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_registrations', function (Blueprint $table) {
            $table->id();

            // Foreign keys: a registration cannot exist without its student and course.
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();

            $table->string('status')->default('registered'); // registered | pending
            $table->timestamps();

            // Prevents the same student registering for the same course twice.
            $table->unique(['student_id', 'course_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_registrations');
    }
};
