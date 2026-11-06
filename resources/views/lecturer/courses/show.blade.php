@extends('layouts.app')
@section('title', $course->code)

@section('content')
<div class="mb-6">
    <a href="{{ route('lecturer.courses.index') }}" class="inline-flex items-center text-sm text-slate-500 hover:text-slate-900 mb-3"><i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i>Back to my courses</a>
    <h1 class="text-xl font-semibold">{{ $course->code }} · {{ $course->title }}</h1>
    <p class="text-sm text-slate-500 mt-1">{{ $course->department }} · Semester {{ $course->semester }} · {{ $course->credits }} credit units · {{ $course->registrations_count }} of {{ $course->capacity }} seats taken</p>
</div>

<form action="{{ route('lecturer.courses.show', $course) }}" method="GET" class="bg-white border border-slate-200 rounded-lg p-4 mb-6 grid grid-cols-1 sm:grid-cols-3 gap-3">
    <input type="search" name="q" value="{{ request('q') }}" class="input-field" placeholder="Search name or registration number">
    <select name="status" class="input-field">
        <option value="">All statuses</option>
        @foreach (config('university.statuses') as $status)
            <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
    <button type="submit" class="px-4 py-2.5 bg-[#0f766e] rounded-lg text-sm font-medium text-white hover:bg-[#115e59]">Filter</button>
</form>

<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[760px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Student</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Reg. no.</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Programme</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Year</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Registered on</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $registration)
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-900">{{ $registration->student->name }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->student->registration_number }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->student->programme }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Year {{ $registration->student->year }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4"><x-status-badge :status="$registration->status" /></td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-6 px-4 text-center text-sm text-slate-500">No students are registered for this course yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t border-slate-200 bg-slate-50 text-sm text-slate-500">
        @if ($registrations->total() > 0)
            Showing {{ $registrations->firstItem() }}–{{ $registrations->lastItem() }} of {{ $registrations->total() }} students
        @else
            No students to show
        @endif
    </div>
</div>
<div class="mt-4">{{ $registrations->links() }}</div>
@endsection
