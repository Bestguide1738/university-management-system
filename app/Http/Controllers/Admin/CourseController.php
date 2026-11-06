<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::query()
            ->with('lecturer')
            ->withCount('registrations')
            ->when($request->q, fn ($query, $q) => $query->where(
                fn ($w) => $w->where('code', 'like', "%{$q}%")->orWhere('title', 'like', "%{$q}%")
            ))
            ->when($request->department, fn ($query, $d) => $query->where('department', $d))
            ->when($request->semester, fn ($query, $s) => $query->where('semester', $s))
            ->orderBy('code')
            ->paginate(10)
            ->withQueryString();

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create', ['lecturers' => Lecturer::orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        $course = Course::create($request->validate($this->rules()));

        return redirect()->route('admin.courses.index')
            ->with('status', "Course {$course->code} was added.");
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', [
            'course'    => $course,
            'lecturers' => Lecturer::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate($this->rules($course));

        $registered = $course->registrations()->count();
        if ($data['capacity'] < $registered) {
            return back()->withInput()->withErrors([
                'capacity' => "Capacity cannot be lower than the {$registered} students already registered.",
            ]);
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')
            ->with('status', "Course {$course->code} was updated.");
    }

    public function destroy(Course $course)
    {
        $code = $course->code;
        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('status', "Course {$code} was deleted.");
    }

    private function rules(?Course $course = null): array
    {
        return [
            'code'        => ['required', 'string', 'max:20', Rule::unique('courses', 'code')->ignore($course)],
            'title'       => ['required', 'string', 'max:255'],
            'department'  => ['required', Rule::in(config('university.departments'))],
            'credits'     => ['required', 'integer', 'between:1,6'],
            'semester'    => ['required', 'in:1,2'],
            'capacity'    => ['required', 'integer', 'between:1,500'],
            'lecturer_id' => ['required', 'exists:lecturers,id'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
