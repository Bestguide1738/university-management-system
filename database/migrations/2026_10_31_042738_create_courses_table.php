<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->string('department');
            $table->unsignedTinyInteger('credits');
            $table->unsignedTinyInteger('semester'); // 1 or 2
            $table->unsignedSmallInteger('capacity')->default(60);
            $table->text('description')->nullable();

            // Each course is taught by one lecturer. If the lecturer is
            // deleted the course stays, but becomes unassigned.
            $table->foreignId('lecturer_id')
                ->nullable()
                ->constrained('lecturers')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
