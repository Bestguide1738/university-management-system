<div class="p-6 space-y-5">
    <x-form-group name="name" label="Full name">
        <input type="text" id="name" name="name" class="input-field" placeholder="Full name" value="{{ old('name', $student?->name) }}" required>
    </x-form-group>

    <x-form-group name="registration_number" label="Registration number">
        <input type="text" id="registration_number" name="registration_number" class="input-field" placeholder="e.g. 2400101" value="{{ old('registration_number', $student?->registration_number) }}" required>
    </x-form-group>

    <x-form-group name="programme" label="Programme">
        <select id="programme" name="programme" class="input-field" required>
            @foreach (config('university.programmes') as $programme)
                <option value="{{ $programme }}" @selected(old('programme', $student?->programme) === $programme)>{{ $programme }}</option>
            @endforeach
        </select>
    </x-form-group>

    <x-form-group name="email" label="University email">
        <input type="email" id="email" name="email" class="input-field" placeholder="name@university.ac.ug" value="{{ old('email', $student?->email) }}" required>
    </x-form-group>

    <x-form-group name="year" label="Year of study">
        <select id="year" name="year" class="input-field" required>
            @foreach (range(1, 4) as $year)
                <option value="{{ $year }}" @selected((int) old('year', $student?->year ?? 1) === $year)>Year {{ $year }}</option>
            @endforeach
        </select>
    </x-form-group>

    <x-form-group name="password" :label="$student ? 'New password (leave blank to keep the current one)' : 'Temporary password'">
        <input type="password" id="password" name="password" class="input-field" placeholder="Minimum 8 characters" @required(! $student)>
    </x-form-group>
</div>
