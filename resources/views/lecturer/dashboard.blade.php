@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
@php
    $hour = now()->hour;
    $greeting = $hour < 12 ? 'Good morning' : ($hour < 17 ? 'Good afternoon' : 'Good evening');
@endphp

<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-900">{{ $greeting }}, {{ $lecturer->name }}</h1>
    <p class="text-slate-500 mt-1">You teach {{ $courses->count() }} {{ Str::plural('course', $courses->count()) }} with {{ $studentCount }} registered {{ Str::plural('student', $studentCount) }}.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 mb-8">
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#0f766e] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-teal-50 flex items-center justify-center"><i data-lucide="book-marked" class="w-5 h-5 text-[#0f766e]"></i></div>
            <div><p class="text-2xl font-bold">{{ $courses->count() }}</p><p class="text-sm text-slate-500">Assigned courses</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-emerald-600 rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-emerald-50 flex items-center justify-center"><i data-lucide="users" class="w-5 h-5 text-emerald-600"></i></div>
            <div><p class="text-2xl font-bold">{{ $studentCount }}</p><p class="text-sm text-slate-500">Registered students</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#7c3aed] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-violet-50 flex items-center justify-center"><i data-lucide="layers" class="w-5 h-5 text-[#7c3aed]"></i></div>
            <div><p class="text-2xl font-bold">{{ $creditCount }}</p><p class="text-sm text-slate-500">Credit units taught</p></div>
        </div>
    </div>
</div>

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-4">
    <h2 class="text-lg font-semibold">My courses</h2>
    <a href="{{ route('lecturer.courses.index') }}" class="inline-flex items-center px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]"><i data-lucide="book-marked" class="w-4 h-4 mr-2"></i>View all courses</a>
</div>
<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[560px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Semester</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Students</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Open</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-900">{{ $course->code }} · {{ $course->title }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Semester {{ $course->semester }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->registrations_count }} / {{ $course->capacity }}</td>
                        <td class="py-3 px-4 text-center"><a href="{{ route('lecturer.courses.show', $course) }}" class="text-[#0f766e]" title="View students"><i data-lucide="arrow-right" class="w-4 h-4 inline"></i></a></td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-6 px-4 text-center text-sm text-slate-500">No courses are assigned to you yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
