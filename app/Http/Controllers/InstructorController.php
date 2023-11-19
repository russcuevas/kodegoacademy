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
        $instructorId = $instructor->id;
        // getting the assigned course
        $assignedCourse = Offered::where('user_id', $instructor->id)
            ->with(['position', 'course', 'user'])
            ->get();

        $numberEnrollees = Enrollment::whereHas('offered.course', function ($query) use ($instructorId) {
            $query->where('user_id', $instructorId);
        })->count();

        return view('instructor.dashboard', compact('instructor', 'assignedCourse', 'numberEnrollees'));
    }


    public function InstructorEnroll()
    {
        if (Auth::check() && Auth::user()->user_role === 'instructor') {
            $instructorId = Auth::id();
            $enrollments = Enrollment::with(['user', 'offered'])
                ->whereHas('offered.course', function ($query) use ($instructorId) {
                    $query->where('user_id', $instructorId);
                })
                ->get();
            return view('instructor.enroll', compact('enrollments'));
        } else {
            return redirect()->route('loginpage');
        }
    }
}
