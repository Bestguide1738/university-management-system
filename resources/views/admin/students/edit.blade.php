@extends('layouts.app')
@section('title', 'Edit student')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-xl font-semibold mb-2">Edit student</h1>
    <p class="text-sm text-slate-500 mb-6">Update {{ $student->name }}'s record.</p>
</div>

<form action="{{ route('admin.students.update', $student) }}" method="POST" class="bg-white border border-slate-200 rounded-lg overflow-hidden max-w-2xl">
    @csrf
    @method('PUT')
    @include('admin.students._form')
    <div class="px-4 py-4 bg-white border-t border-slate-200 flex justify-between">
        <a href="{{ route('admin.students.index') }}" class="px-4 py-2 border border-slate-200 rounded-md text-sm text-slate-600 hover:bg-slate-100">Cancel</a>
        <button class="px-4 py-2 bg-[#0f766e] rounded-md text-sm font-medium text-white hover:bg-[#115e59]">Save changes</button>
    </div>
</form>
@endsection
