@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
@php
    $hour = now()->hour;
    $greeting = $hour < 12 ? 'Good morning' : ($hour < 17 ? 'Good afternoon' : 'Good evening');
@endphp

<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-900">{{ $greeting }}, {{ explode(' ', auth()->user()->name)[0] }}</h1>
    <p class="text-slate-500 mt-1">
        {{ $pendingCount }} {{ Str::plural('registration', $pendingCount) }} {{ $pendingCount === 1 ? 'is' : 'are' }} waiting for approval.
        @if ($fullCourses > 0) {{ $fullCourses }} {{ Str::plural('course', $fullCourses) }} {{ $fullCourses === 1 ? 'is' : 'are' }} full. @endif
    </p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#0f766e] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-teal-50 flex items-center justify-center"><i data-lucide="users" class="w-5 h-5 text-[#0f766e]"></i></div>
            <div><p class="text-2xl font-bold">{{ number_format($studentCount) }}</p><p class="text-sm text-slate-500">Students</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#7c3aed] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-violet-50 flex items-center justify-center"><i data-lucide="presentation" class="w-5 h-5 text-[#7c3aed]"></i></div>
            <div><p class="text-2xl font-bold">{{ number_format($lecturerCount) }}</p><p class="text-sm text-slate-500">Lecturers</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#0f766e] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-teal-50 flex items-center justify-center"><i data-lucide="book-open" class="w-5 h-5 text-[#0f766e]"></i></div>
            <div><p class="text-2xl font-bold">{{ number_format($courseCount) }}</p><p class="text-sm text-slate-500">Courses</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-emerald-600 rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-emerald-50 flex items-center justify-center"><i data-lucide="clipboard-check" class="w-5 h-5 text-emerald-600"></i></div>
            <div><p class="text-2xl font-bold">{{ number_format($registrationCount) }}</p><p class="text-sm text-slate-500">Registrations</p></div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <a href="{{ route('admin.students.create') }}" class="flex items-center gap-3 p-4 bg-white border border-slate-200 rounded-lg hover:border-[#0f766e]/40"><i data-lucide="user-plus" class="w-5 h-5 text-[#0f766e]"></i><span class="text-sm font-medium">Add student</span></a>
    <a href="{{ route('admin.courses.create') }}" class="flex items-center gap-3 p-4 bg-white border border-slate-200 rounded-lg hover:border-[#0f766e]/40"><i data-lucide="book-plus" class="w-5 h-5 text-[#0f766e]"></i><span class="text-sm font-medium">Add course</span></a>
    <a href="{{ route('admin.registrations.create') }}" class="flex items-center gap-3 p-4 bg-white border border-slate-200 rounded-lg hover:border-[#7c3aed]/40"><i data-lucide="clipboard-check" class="w-5 h-5 text-[#7c3aed]"></i><span class="text-sm font-medium">Register a student</span></a>
</div>

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-4">
    <h2 class="text-lg font-semibold">Recent registrations</h2>
    <a href="{{ route('admin.registrations.index') }}" class="inline-flex items-center px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]"><i data-lucide="clipboard-check" class="w-4 h-4 mr-2"></i>View all registrations</a>
</div>
<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[560px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Student</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">When</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recent as $registration)
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-900">{{ $registration->student->name }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->course->code }} · {{ $registration->course->title }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->created_at->diffForHumans() }}</td>
                        <td class="py-3 px-4"><x-status-badge :status="$registration->status" /></td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-6 px-4 text-center text-sm text-slate-500">No registrations yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
