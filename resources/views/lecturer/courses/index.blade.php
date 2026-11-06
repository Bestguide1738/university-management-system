@extends('layouts.app')
@section('title', 'My courses')

@section('content')
<div class="mb-6">
    <h1 class="text-xl font-semibold">My courses</h1>
    <p class="text-sm text-slate-500 mt-1">Courses assigned to you by the Registrar. Records are read-only.</p>
</div>

<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[720px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Department</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Credits</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Semester</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Students</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Class list</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr class="hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm"><span class="text-slate-900">{{ $course->code }}</span> · {{ $course->title }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->department }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->credits }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Semester {{ $course->semester }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->registrations_count }} / {{ $course->capacity }}</td>
                        <td class="py-3 px-4 text-center">
                            @can('view course students')
                                <a href="{{ route('lecturer.courses.show', $course) }}" class="text-[#0f766e]" title="View students"><i data-lucide="users" class="w-4 h-4 inline"></i></a>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-6 px-4 text-center text-sm text-slate-500">No courses are assigned to you yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
