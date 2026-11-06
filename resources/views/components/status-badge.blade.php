@props(['status'])
@php
    $classes = match ($status) {
        'registered' => 'bg-emerald-50 text-emerald-700',
        'pending'    => 'bg-amber-50 text-amber-700',
        default      => 'bg-slate-100 text-slate-600',
    };
@endphp
<span class="text-xs px-2 py-1 rounded-full {{ $classes }}">{{ ucfirst($status) }}</span>
