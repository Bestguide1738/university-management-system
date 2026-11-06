@extends('layouts.app')
@section('title', 'Students')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <h1 class="text-xl font-semibold">Students</h1>
        <p class="text-sm text-slate-500 mt-1">Student records and the programme each student belongs to.</p>
    </div>
    @can('manage students')
        <a href="{{ route('admin.students.create') }}" class="inline-flex items-center px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Add student</a>
    @endcan
</div>

<form action="{{ route('admin.students.index') }}" method="GET" class="bg-white border border-slate-200 rounded-lg p-4 mb-6 grid grid-cols-1 sm:grid-cols-3 gap-3">
    <input type="search" name="q" value="{{ request('q') }}" class="input-field" placeholder="Search name or reg. number">
    <select name="programme" class="input-field">
        <option value="">All programmes</option>
        @foreach (config('university.programmes') as $programme)
            <option value="{{ $programme }}" @selected(request('programme') === $programme)>{{ $programme }}</option>
        @endforeach
    </select>
    <button type="submit" class="px-4 py-2.5 bg-[#0f766e] rounded-lg text-sm font-medium text-white hover:bg-[#115e59]">Filter</button>
</form>

<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[860px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Name</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Reg. no.</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Programme</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Year</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-900">{{ $student->name }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $student->registration_number }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $student->programme }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $student->email }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Year {{ $student->year }}</td>
                        <td class="py-3 px-4 text-center">
                            @can('manage students')
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.students.edit', $student) }}" class="text-[#0f766e]" title="Edit"><i data-lucide="edit" class="w-4 h-4 inline"></i></a>
                                    <form action="{{ route('admin.students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete {{ addslashes($student->name) }}? Their registrations will be removed too.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-600" title="Delete"><i data-lucide="trash-2" class="w-4 h-4 inline"></i></button>
                                    </form>
                                </div>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-6 px-4 text-center text-sm text-slate-500">No students found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t border-slate-200 bg-slate-50 text-sm text-slate-500">
        @if ($students->total() > 0)
            Showing {{ $students->firstItem() }}–{{ $students->lastItem() }} of {{ $students->total() }} students
        @else
            No students to show
        @endif
    </div>
</div>
<div class="mt-4">{{ $students->links() }}</div>
@endsection
