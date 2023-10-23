<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $getTotalUsers = User::where('user_role', 'user')->count();
        $getTotalInstructors = User::where('user_role', 'instructor')->count();
        return view('admin.dashboard', compact('getTotalUsers', 'getTotalInstructors'));
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

    public function AddUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_picture' => 'image|mimes:jpeg,jpg,png',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'contact' => 'required|min:11',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400,
            ]);
        }

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = 'profile_' . Str::random(10) . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/auth/images/profile_pictures', $imageName);

            $imageNameOnly = pathinfo($imagePath, PATHINFO_BASENAME);
        } else {
            $imageNameOnly = 'default_profile.png';
        }

        User::create([
            'profile_picture' => $imageNameOnly,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_role' => 'user',
            'contact' => $request->input('contact'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Add user successfully',
            'status' => 200,
        ]);
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
