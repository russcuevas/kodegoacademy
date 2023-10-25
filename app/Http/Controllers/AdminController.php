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
    // START DASHBOARD
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

    // END DASHBOARD

    // START MANAGE USERS

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

    public function UpdateUsers(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'status' => 404
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|min:8',
            'contact' => 'required|min:11',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 422,
            ]);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->contact = $request->input('contact');

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = 'profile_' . Str::random(10) . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/auth/images/profile_pictures', $imageName);

            $imageNameOnly = pathinfo($imagePath, PATHINFO_BASENAME);
            $user->profile_picture = $imageNameOnly;
        }

        $user->save();

        return response()->json([
            'message' => 'User updated successfully',
            'status' => 200,
        ]);
    }


    public function DeleteUsers(Request $request, $id)
    {
        $users = User::find($id);

        if (!$users) {
            return response()->json([
                'message' => 'User not found',
                'status' => 404
            ]);
        }

        $users->delete();

        return response()->json([
            'message' => 'User deleted successfully',
            'status' => 200,
        ]);
    }

    // END MANAGE USERS


    // MANAGE COURSE

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

    // END MANAGE COURSE

    // WEBSITE FOR ADMIN

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

    // END WEBSITE FOR ADMIN

    // START MANAGE INSTRUCTOR

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

    // END MANAGE INSTRUCTOR
}
