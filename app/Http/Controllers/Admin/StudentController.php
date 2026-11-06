<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::query()
            ->when($request->q, fn ($query, $q) => $query->where(
                fn ($w) => $w->where('name', 'like', "%{$q}%")
                             ->orWhere('registration_number', 'like', "%{$q}%")
            ))
            ->when($request->programme, fn ($query, $p) => $query->where('programme', $p))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        DB::transaction(function () use ($data) {
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $user->assignRole('student');

            Student::create([
                'user_id'             => $user->id,
                'name'                => $data['name'],
                'registration_number' => $data['registration_number'],
                'programme'           => $data['programme'],
                'email'               => $data['email'],
                'year'                => $data['year'],
            ]);
        });

        return redirect()->route('admin.students.index')
            ->with('status', "Student {$data['name']} was added.");
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate($this->rules($student));

        DB::transaction(function () use ($data, $student) {
            $student->update([
                'name'                => $data['name'],
                'registration_number' => $data['registration_number'],
                'programme'           => $data['programme'],
                'email'               => $data['email'],
                'year'                => $data['year'],
            ]);

            if ($student->user) {
                $account = ['name' => $data['name'], 'email' => $data['email']];
                if (! empty($data['password'])) {
                    $account['password'] = Hash::make($data['password']);
                }
                $student->user->update($account);
            }
        });

        return redirect()->route('admin.students.index')
            ->with('status', "Student {$student->name} was updated.");
    }

    public function destroy(Student $student)
    {
        $name = $student->name;

        DB::transaction(function () use ($student) {
            $user = $student->user;
            $student->delete();
            $user?->delete();
        });

        return redirect()->route('admin.students.index')
            ->with('status', "Student {$name} was deleted.");
    }

    private function rules(?Student $student = null): array
    {
        return [
            'name'                => ['required', 'string', 'max:255'],
            'registration_number' => ['required', 'string', 'max:20',
                Rule::unique('students', 'registration_number')->ignore($student)],
            'programme'           => ['required', Rule::in(config('university.programmes'))],
            'email'               => ['required', 'email', 'max:255',
                Rule::unique('students', 'email')->ignore($student),
                Rule::unique('users', 'email')->ignore($student?->user_id)],
            'year'                => ['required', 'integer', 'between:1,4'],
            'password'            => [$student ? 'nullable' : 'required', 'string', 'min:8'],
        ];
    }
}
