@props(['name', 'label'])
<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-600 mb-2">{{ $label }}</label>
    {{ $slot }}
    @error($name)
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div>
