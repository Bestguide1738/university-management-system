<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $lecturer = $request->user()->lecturer;
        abort_unless($lecturer, 403);

        $courses = $lecturer->courses()->withCount('registrations')->orderBy('code')->get();

        return view('lecturer.dashboard', [
            'lecturer' =>$lecturer,
            'courses' =>$courses,
            'studentCount' => $courses->sum('registrations_count'),
            'creditCount' => $courses->sum('credits'),
        ]);
    }
}
