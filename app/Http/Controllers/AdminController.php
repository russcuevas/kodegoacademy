<?php

namespace App\Http\Controllers;

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
        return view('admin.website');
    }
}
