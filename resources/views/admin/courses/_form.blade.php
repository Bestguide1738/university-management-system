<div class="p-6 space-y-5">
    <x-form-group name="code" label="Course code">
        <input type="text" id="code" name="code" class="input-field" placeholder="e.g. CSC1101" value="{{ old('code', $course?->code) }}" required>
    </x-form-group>

    <x-form-group name="title" label="Course title">
        <input type="text" id="title" name="title" class="input-field" placeholder="Course title" value="{{ old('title', $course?->title) }}" required>
    </x-form-group>

    <x-form-group name="department" label="Department">
        <select id="department" name="department" class="input-field" required>
            @foreach (config('university.departments') as $department)
                <option value="{{ $department }}" @selected(old('department', $course?->department) === $department)>{{ $department }}</option>
            @endforeach
        </select>
    </x-form-group>

    <x-form-group name="lecturer_id" label="Lecturer">
        <select id="lecturer_id" name="lecturer_id" class="input-field" required>
            <option value="">Choose a lecturer</option>
            @foreach ($lecturers as $lecturer)
                <option value="{{ $lecturer->id }}" @selected((int) old('lecturer_id', $course?->lecturer_id) === $lecturer->id)>{{ $lecturer->name }}</option>
            @endforeach
        </select>
    </x-form-group>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <x-form-group name="credits" label="Credit units">
            <input type="number" id="credits" name="credits" min="1" max="6" class="input-field" value="{{ old('credits', $course?->credits ?? 3) }}" required>
        </x-form-group>

        <x-form-group name="semester" label="Semester">
            <select id="semester" name="semester" class="input-field" required>
                @foreach ([1, 2] as $semester)
                    <option value="{{ $semester }}" @selected((int) old('semester', $course?->semester ?? 1) === $semester)>Semester {{ $semester }}</option>
                @endforeach
            </select>
        </x-form-group>

        <x-form-group name="capacity" label="Capacity (seats)">
            <input type="number" id="capacity" name="capacity" min="1" max="500" class="input-field" value="{{ old('capacity', $course?->capacity ?? 60) }}" required>
        </x-form-group>
    </div>

    <x-form-group name="description" label="Description (optional)">
        <textarea id="description" name="description" rows="3" class="input-field" placeholder="What the course covers">{{ old('description', $course?->description) }}</textarea>
    </x-form-group>
</div>
