@extends('layouts.app')
@section('title', 'Registrations')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <h1 class="text-xl font-semibold">Registrations</h1>
        <p class="text-sm text-slate-500 mt-1">Approve or remove course registrations.</p>
    </div>
    @can('manage registrations')
        <a href="{{ route('admin.registrations.create') }}" class="inline-flex items-center px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Register a student</a>
    @endcan
</div>

<form action="{{ route('admin.registrations.index') }}" method="GET" class="bg-white border border-slate-200 rounded-lg p-4 mb-6 grid grid-cols-1 sm:grid-cols-4 gap-3">
    <input type="search" name="q" value="{{ request('q') }}" class="input-field" placeholder="Search student">
    <select name="course" class="input-field">
        <option value="">All courses</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}" @selected((int) request('course') === $course->id)>{{ $course->code }} · {{ $course->title }}</option>
        @endforeach
    </select>
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
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Date</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Status</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $registration)
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-900">{{ $registration->student->name }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->course->code }} · {{ $registration->course->title }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4"><x-status-badge :status="$registration->status" /></td>
                        <td class="py-3 px-4 text-center">
                            @can('manage registrations')
                            <div class="flex items-center justify-center gap-3">
                                @if ($registration->status === 'pending')
                                    <form action="{{ route('admin.registrations.update', $registration) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-emerald-600" title="Approve"><i data-lucide="check-circle-2" class="w-4 h-4 inline"></i></button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" onsubmit="return confirm('Remove this registration?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600" title="Remove"><i data-lucide="trash-2" class="w-4 h-4 inline"></i></button>
                                </form>
                            </div>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-6 px-4 text-center text-sm text-slate-500">No registrations found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t border-slate-200 bg-slate-50 text-sm text-slate-500">
        @if ($registrations->total() > 0)
            Showing {{ $registrations->firstItem() }}–{{ $registrations->lastItem() }} of {{ $registrations->total() }} registrations
        @else
            No registrations to show
        @endif
    </div>
</div>
<div class="mt-4">{{ $registrations->links() }}</div>
@endsection
