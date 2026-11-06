@extends('layouts.app')
@section('title', 'Register a student')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-xl font-semibold mb-2">Register a student</h1>
    <p class="text-sm text-slate-500 mb-6">Register a student for a course on their behalf.</p>
</div>

<form action="{{ route('admin.registrations.store') }}" method="POST" class="bg-white border border-slate-200 rounded-lg overflow-hidden max-w-2xl">
    @csrf
    <div class="p-6 space-y-5">
        <x-form-group name="student_id" label="Student">
            <select id="student_id" name="student_id" class="input-field" required>
                <option value="">Choose a student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" @selected((int) old('student_id') === $student->id)>{{ $student->name }} ({{ $student->registration_number }})</option>
                @endforeach
            </select>
        </x-form-group>

        <x-form-group name="course_id" label="Course">
            <select id="course_id" name="course_id" class="input-field" required>
                <option value="">Choose a course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" @selected((int) old('course_id') === $course->id)>
                        {{ $course->code }} · {{ $course->title }} ({{ $course->registrations_count }}/{{ $course->capacity }} seats{{ $course->registrations_count >= $course->capacity ? ', full' : '' }})
                    </option>
                @endforeach
            </select>
        </x-form-group>

        <x-form-group name="status" label="Status">
            <select id="status" name="status" class="input-field" required>
                @foreach (config('university.statuses') as $status)
                    <option value="{{ $status }}" @selected(old('status', 'registered') === $status)>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </x-form-group>
    </div>
    <div class="px-4 py-4 bg-white border-t border-slate-200 flex justify-between">
        <a href="{{ route('admin.registrations.index') }}" class="px-4 py-2 border border-slate-200 rounded-md text-sm text-slate-600 hover:bg-slate-100">Cancel</a>
        <button class="px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]">Save registration</button>
    </div>
</form>
@endsection
