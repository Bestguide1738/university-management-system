@extends('layouts.app')
@section('title', 'Courses')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <h1 class="text-xl font-semibold">Courses</h1>
        <p class="text-sm text-slate-500 mt-1">The course catalogue, with the lecturer assigned to each course.</p>
    </div>
    @can('manage courses')
        <a href="{{ route('admin.courses.create') }}" class="inline-flex items-center px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Add course</a>
    @endcan
</div>

<form action="{{ route('admin.courses.index') }}" method="GET" class="bg-white border border-slate-200 rounded-lg p-4 mb-6 grid grid-cols-1 sm:grid-cols-4 gap-3">
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
        <table class="w-full min-w-[900px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Department</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Lecturer</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Credits</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Semester</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Seats</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm"><span class="text-slate-900">{{ $course->code }}</span> · {{ $course->title }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->department }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->lecturer?->name ?? 'Unassigned' }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->credits }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Semester {{ $course->semester }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $course->registrations_count }} / {{ $course->capacity }}</td>
                        <td class="py-3 px-4 text-center">
                            @can('manage courses')
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.courses.edit', $course) }}" class="text-[#0f766e]" title="Edit"><i data-lucide="edit" class="w-4 h-4 inline"></i></a>
                                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Delete {{ $course->code }}? Its registrations will be removed too.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-600" title="Delete"><i data-lucide="trash-2" class="w-4 h-4 inline"></i></button>
                                    </form>
                                </div>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="py-6 px-4 text-center text-sm text-slate-500">No courses found.</td></tr>
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
