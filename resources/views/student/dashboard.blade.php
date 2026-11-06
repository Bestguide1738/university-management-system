@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
@php
    $hour = now()->hour;
    $greeting = $hour < 12 ? 'Good morning' : ($hour < 17 ? 'Good afternoon' : 'Good evening');
    $total = $registrations->count();
@endphp

<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-900">{{ $greeting }}, {{ explode(' ', $student->name)[0] }}</h1>
    <p class="text-slate-500 mt-1">
        You are registered for {{ $total }} {{ Str::plural('course', $total) }}.
        @if ($pendingCount > 0)
            {{ $pendingCount }} {{ Str::plural('registration', $pendingCount) }} {{ $pendingCount === 1 ? 'is' : 'are' }} waiting for approval.
        @endif
    </p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 mb-8">
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#0f766e] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-teal-50 flex items-center justify-center"><i data-lucide="clipboard-check" class="w-5 h-5 text-[#0f766e]"></i></div>
            <div><p class="text-2xl font-bold">{{ $total }}</p><p class="text-sm text-slate-500">My registrations</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-emerald-600 rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-emerald-50 flex items-center justify-center"><i data-lucide="layers" class="w-5 h-5 text-emerald-600"></i></div>
            <div><p class="text-2xl font-bold">{{ $creditCount }}</p><p class="text-sm text-slate-500">Credit units</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#7c3aed] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-violet-50 flex items-center justify-center"><i data-lucide="book-open" class="w-5 h-5 text-[#7c3aed]"></i></div>
            <div><p class="text-2xl font-bold">{{ $openCourses }}</p><p class="text-sm text-slate-500">Courses open</p></div>
        </div>
    </div>
</div>

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-4">
    <h2 class="text-lg font-semibold">My newest registrations</h2>
    <a href="{{ route('student.courses.index') }}" class="inline-flex items-center px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Register for a course</a>
</div>
<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[640px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Lecturer</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Credits</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Status</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Open</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations->take(5) as $registration)
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-900">{{ $registration->course->code }} · {{ $registration->course->title }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->course->lecturer?->name ?? 'Unassigned' }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->course->credits }}</td>
                        <td class="py-3 px-4"><x-status-badge :status="$registration->status" /></td>
                        <td class="py-3 px-4 text-center"><a href="{{ route('student.courses.show', $registration->course) }}" class="text-[#0f766e]" title="Open course"><i data-lucide="arrow-right" class="w-4 h-4 inline"></i></a></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-6 px-4 text-center text-sm text-slate-500">You have not registered for any course yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
