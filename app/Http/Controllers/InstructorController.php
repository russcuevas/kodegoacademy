<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function InstructorDashboard()
    {
        if (Auth::check()) {
            if (Auth::user()->user_role !== 'instructor') {
                return redirect()->route('loginpage');
            }
        } else {
            return redirect()->route('loginpage');
        }

        return view('instructor.dashboard');
    }

    public function InstructorEnroll()
    {
        if (Auth::check()) {
            if (Auth::user()->user_role !== 'instructor') {
                return redirect()->route('loginpage');
            }
        } else {
            return redirect()->route('loginpage');
        }

        return view('instructor.enroll');
    }
}
