@extends('layouts.app')
@section('title', $course->code)

@section('content')
@php
    $seatsLeft = max($course->capacity - $course->registrations_count, 0);
    $percent = $course->capacity > 0 ? min(100, round($course->registrations_count / $course->capacity * 100)) : 0;
@endphp

<div class="mb-6">
    <a href="{{ route('student.courses.index') }}" class="inline-flex items-center text-sm text-slate-500 hover:text-slate-900 mb-3"><i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i>Back to courses</a>
    <h1 class="text-xl font-semibold">{{ $course->code }} · {{ $course->title }}</h1>
    <p class="text-sm text-slate-500 mt-1">{{ $course->department }} · Semester {{ $course->semester }} · {{ $course->credits }} credit units</p>
</div>

<div class="grid lg:grid-cols-3 gap-6 max-w-5xl">
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white border border-slate-200 rounded-lg p-5">
            <h2 class="text-base font-semibold mb-2">About this course</h2>
            <p class="text-sm text-slate-600 leading-relaxed">{{ $course->description ?: 'No description has been added for this course yet.' }}</p>
        </div>
    </div>
    <div class="space-y-6">
        <div class="bg-white border border-slate-200 rounded-lg p-5">
            <p class="text-sm text-slate-500 mb-1">Seats</p>
            <p class="text-2xl font-bold mb-1">{{ $seatsLeft }} <span class="text-sm font-normal text-slate-500">of {{ $course->capacity }} left</span></p>
            <div class="w-full h-2 bg-slate-100 rounded-full mb-4"><div class="h-2 bg-[#7c3aed] rounded-full" style="width: {{ $percent }}%"></div></div>

            @if ($status)
                <div class="flex items-center justify-between text-sm text-slate-600">
                    <span>Your registration</span>
                    <x-status-badge :status="$status" />
                </div>
            @elseif ($seatsLeft === 0)
                <p class="text-sm text-rose-700">This course is full.</p>
            @else
                @can('register courses')
                    <form action="{{ route('student.registrations.store', $course) }}" method="POST">
                        @csrf
                        <button class="w-full px-4 py-2.5 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]">Register for this course</button>
                    </form>
                @endcan
            @endif
        </div>
        <div class="bg-white border border-slate-200 rounded-lg p-5">
            <p class="text-sm text-slate-500 mb-3">Lecturer</p>
            @if ($course->lecturer)
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-violet-50 border border-violet-100 flex items-center justify-center text-[#7c3aed] text-xs font-semibold">{{ collect(explode(' ', $course->lecturer->name))->map(fn ($p) => mb_strtoupper(mb_substr($p, 0, 1)))->take(2)->join('') }}</div>
                    <div><p class="text-sm font-medium">{{ $course->lecturer->name }}</p><p class="text-xs text-slate-500">{{ $course->lecturer->email }}</p></div>
                </div>
            @else
                <p class="text-sm text-slate-500">No lecturer assigned yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
