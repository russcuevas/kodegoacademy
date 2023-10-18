<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Dashboard()
    {
        if (Auth::check()) {
            if (Auth::user()->user_role !== 'admin') {
                return redirect()->route('loginpage');
            }
        } else {
            return redirect()->route('loginpage');
        }

        return view('admin.dashboard');
    }

    public function Users()
    {
        if (Auth::check()) {
            if (Auth::user()->user_role !== 'admin') {
                return redirect()->route('loginpage');
            }
        } else {
            return redirect()->route('loginpage');
        }
        $users = User::where('user_role', 'user')->get();
        return view('admin.users', compact('users'));
    }

    public function Course()
    {
        if (Auth::check()) {
            if (Auth::user()->user_role !== 'admin') {
                return redirect()->route('loginpage');
            }
        } else {
            return redirect()->route('loginpage');
        }
        return view('admin.course');
    }

    public function Website()
    {
        if (Auth::check()) {
            if (Auth::user()->user_role !== 'admin') {
                return redirect()->route('loginpage');
            }
        } else {
            return redirect()->route('loginpage');
        }
        return view('admin.website', compact('user'));
    }

    public function InstructorPage()
    {
        if (Auth::check()) {
            if (Auth::user()->user_role !== 'admin') {
                return redirect()->route('loginpage');
            }
        } else {
            return redirect()->route('loginpage');
        }
        $instructors = User::where('user_role', 'instructor')->get();
        return view('admin.instructors', compact('instructors'));
    }
}
