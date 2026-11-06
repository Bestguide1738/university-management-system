@extends('layouts.app')
@section('title', 'My registrations')

@section('content')
@php
    $registeredCount = $registrations->where('status', 'registered')->count();
    $pendingCount = $registrations->where('status', 'pending')->count();
@endphp

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <h1 class="text-xl font-semibold">My registrations</h1>
        <p class="text-sm text-slate-500 mt-1">Courses you have registered In.</p>
    </div>
    @can('register courses')
        <a href="{{ route('student.courses.index') }}" class="inline-flex items-center px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Register for a course</a>
    @endcan
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 mb-8">
    <div class="bg-white border border-slate-200 border-t-4 border-t-emerald-600 rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-emerald-50 flex items-center justify-center"><i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600"></i></div>
            <div><p class="text-2xl font-bold">{{ $registeredCount }}</p><p class="text-sm text-slate-500">Registered</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#7c3aed] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-violet-50 flex items-center justify-center"><i data-lucide="loader" class="w-5 h-5 text-[#7c3aed]"></i></div>
            <div><p class="text-2xl font-bold">{{ $pendingCount }}</p><p class="text-sm text-slate-500">Pending approval</p></div>
        </div>
    </div>
    <div class="bg-white border border-slate-200 border-t-4 border-t-[#0f766e] rounded-lg p-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-md bg-teal-50 flex items-center justify-center"><i data-lucide="layers" class="w-5 h-5 text-[#0f766e]"></i></div>
            <div><p class="text-2xl font-bold">{{ $creditCount }}</p><p class="text-sm text-slate-500">Credit units (incl. pending)</p></div>
        </div>
    </div>
</div>

<div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[700px]">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Semester</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Credits</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Registered on</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Status</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Drop</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $registration)
                    <tr class="hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-900">{{ $registration->course->code }} · {{ $registration->course->title }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Semester {{ $registration->course->semester }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->course->credits }}</td>
                        <td class="py-3 px-4 text-sm text-slate-500">{{ $registration->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4"><x-status-badge :status="$registration->status" /></td>
                        <td class="py-3 px-4 text-center">
                            @can('view own registrations')
                                <form action="{{ route('student.registrations.destroy', $registration) }}" method="POST" onsubmit="return confirm('Drop {{ $registration->course->code }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600" title="Drop course"><i data-lucide="trash-2" class="w-4 h-4 inline"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-6 px-4 text-center text-sm text-slate-500">You have not registered for any course yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
