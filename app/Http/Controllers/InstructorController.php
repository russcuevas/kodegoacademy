<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Enrollment;
use App\Models\Offered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    public function ChangeEnrollStatus(Request $request)
    {
        if ($request->ajax()) {
            $enrollmentId = $request->input('enrollment_id');
            $status = $request->input('status');

            $enrollment = Enrollment::find($enrollmentId);
            $enrollment->status = $status;
            $enrollment->save();

            return response()->json([
                'message' => 'Enrollee updated successfully',
                'status' => 200,
            ]);
        }

        return response()->json([
            'message' => 'Not found',
            'status' => 400,
        ]);
    }

    public function PrintEnrollee()
    {
        if (Auth::check() && Auth::user()->user_role === 'instructor') {
            $instructorId = Auth::id();
            $enrollments = Enrollment::with(['user', 'offered'])
                ->whereHas('offered.course', function ($query) use ($instructorId) {
                    $query->where('user_id', $instructorId);
                })
                ->where('status', '=', 'Enrolled')
                ->get();
            return view('instructor.print', compact('enrollments'));
        } else {
            return redirect()->route('loginpage');
        }
    }


    public function ChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400
            ]);
        }

        $user = Auth::user();

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json([
            'message' => 'Password changed successfully',
            'status' => 200
        ]);
    }
}
