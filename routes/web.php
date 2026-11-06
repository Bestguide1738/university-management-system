<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Lecturer;
use App\Http\Controllers\Student;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

// Administrator
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Admin\DashboardController::class)->name('dashboard');

    Route::resource('students', Admin\StudentController::class)
        ->except('show')->middleware('permission:manage students');

    Route::resource('courses', Admin\CourseController::class)
        ->except('show')->middleware('permission:manage courses');

    Route::resource('registrations', Admin\RegistrationController::class)
        ->only(['index', 'create', 'store', 'update', 'destroy'])
        ->middleware('permission:manage registrations');
});

// Lecturer
Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {
    Route::get('/dashboard', Lecturer\DashboardController::class)->name('dashboard');

    Route::get('/courses', [Lecturer\CourseController::class, 'index'])
        ->middleware('permission:view assigned courses')->name('courses.index');
    Route::get('/courses/{course}', [Lecturer\CourseController::class, 'show'])
        ->middleware('permission:view course students')->name('courses.show');
});

// Student
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', Student\DashboardController::class)->name('dashboard');

    Route::get('/courses', [Student\CourseController::class, 'index'])
        ->middleware('permission:view available courses')->name('courses.index');
    Route::get('/courses/{course}', [Student\CourseController::class, 'show'])
        ->middleware('permission:view available courses')->name('courses.show');

    Route::get('/registrations', [Student\RegistrationController::class, 'index'])
        ->middleware('permission:view own registrations')->name('registrations.index');
    Route::post('/courses/{course}/registrations', [Student\RegistrationController::class, 'store'])
        ->middleware('permission:register courses')->name('registrations.store');
    Route::delete('/registrations/{registration}', [Student\RegistrationController::class, 'destroy'])
        ->middleware('permission:view own registrations')->name('registrations.destroy');
});
