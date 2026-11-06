@extends('layouts.app')
@section('title', 'Add course')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-xl font-semibold mb-2">Add course</h1>
    <p class="text-sm text-slate-500 mb-6">Add a course to the catalogue and assign a lecturer.</p>
</div>

<form action="{{ route('admin.courses.store') }}" method="POST" class="bg-white border border-slate-200 rounded-lg overflow-hidden max-w-2xl">
    @csrf
    @include('admin.courses._form', ['course' => null])
    <div class="px-4 py-4 bg-white border-t border-slate-200 flex justify-between">
        <a href="{{ route('admin.courses.index') }}" class="px-4 py-2 border border-slate-200 rounded-md text-sm text-slate-600 hover:bg-slate-100">Cancel</a>
        <button class="px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]">Save course</button>
    </div>
</form>
@endsection
