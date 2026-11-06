@extends('layouts.app')
@section('title', 'Available courses')

@section('content')
<div class="mb-6">
    <h1 class="text-xl font-semibold">Available courses</h1>
    <p class="text-sm text-slate-500 mt-1">Browse this semester's courses and register for the ones you need.</p>
</div>

<form action="{{ route('student.courses.index') }}" method="GET" class="bg-white border border-slate-200 rounded-lg p-4 mb-6 grid grid-cols-1 sm:grid-cols-4 gap-3">
    <input type="search" name="q" value="{{ request('q') }}" class="input-field" placeholder="Search code or title">
    <select name="department" class="input-field">
        <option value="">All departments</option>
        @foreach (config('university.departments') as $department)
            <option value="{{ $department }}" @selected(request('department') === $department)>{{ $department }}</option>
        @endforeach
    </select>
    <select name="semester" class="input-field">
        <option value="">All semesters</option>
        <option value="1" @selected(request('semester') === '1')>Semester 1</option>
        <option value="2" @selected(request('semester') === '2')>Semester 2</option>
    </select>
    <button type="submit" class="px-4 py-2.5 bg-[#0f766e] rounded-lg text-sm font-medium text-white hover:bg-[#115e59]">Filter</button>
</form>

<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[760px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Department</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Lecturer</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Credits</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Seats</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    @php
                        $full = $course->registrations_count >= $course->capacity;
                        $myStatus = $mine[$course->id] ?? null;
                    @endphp
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm"><a href="{{ route('student.courses.show', $course) }}" class="hover:text-[#0f766e]"><span class="text-slate-900">{{ $course->code }}</span> · {{ $course->title }}</a></td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->department }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->lecturer?->name ?? 'Unassigned' }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->credits }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->registrations_count }} / {{ $course->capacity }}</td>
                        <td class="py-3 px-4 text-center">
                            @if ($myStatus)
                                <x-status-badge :status="$myStatus" />
                            @elseif ($full)
                                <span class="text-xs px-2 py-1 rounded-full bg-rose-50 text-rose-700">Full</span>
                            @else
                                @can('register courses')
                                    <form action="{{ route('student.registrations.store', $course) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1.5 bg-[#0f766e] rounded-md text-xs font-medium text-white hover:bg-[#115e59]">Register</button>
                                    </form>
                                @endcan
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-6 px-4 text-center text-sm text-slate-500">No courses found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t border-slate-200 bg-slate-50 text-sm text-slate-500">
        @if ($courses->total() > 0)
            Showing {{ $courses->firstItem() }}–{{ $courses->lastItem() }} of {{ $courses->total() }} courses
        @else
            No courses to show
        @endif
    </div>
</div>
<div class="mt-4">{{ $courses->links() }}</div>
@endsection
