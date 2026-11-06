<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Sends each signed-in user to the dashboard for their role
    public function __invoke(Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('lecturer')) {
            return redirect()->route('lecturer.dashboard');
        }

        if ($user->hasRole('student')) {
            return redirect()->route('student.dashboard');
        }

        abort(403, 'Your account has no role assigned.');
    }
}
