<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Enrollment;
use App\Models\Offered;
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
        // instructor auth
        $instructor = Auth::user();
        // getting the assigned course
        $assignedCourse = Offered::where('user_id', $instructor->id)
            ->with(['position', 'course', 'user'])
            ->get();

        return view('instructor.dashboard', compact('instructor', 'assignedCourse'));
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

        $enrollments = Enrollment::with(['user', 'offered'])->get();

        return view('instructor.enroll', compact('enrollments'));
    }
}
