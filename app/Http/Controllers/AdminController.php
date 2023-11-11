<?php

namespace App\Http\Controllers;

use App\Models\Position;
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


    public function DeleteUsers($id)
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
        $positions = Position::all();
        return view('admin.course', compact('positions'));
    }

    public function AddPosition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400,
            ]);
        }

        Position::create([
            'position' => $request->input('position'),
        ]);

        return response()->json([
            'message' => 'Add position successfully',
            'status' => 200,
        ]);
    }

    public function AddCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position_id' => 'required|exists:positions,id',
            'course' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 400,
            ]);
        }

        $position = Position::findOrFail($request->position_id);

        $course = $position->courses()->create([
            'course' => $request->input('course'),
        ]);

        return response()->json([
            'message' => 'Add course successfully',
            'data' => $course,
            'status' => 200,
        ]);
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

    public function AddInstructors(Request $request)
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
            $imageNameOnly = 'instructor_profile.png';
        }

        User::create([
            'profile_picture' => $imageNameOnly,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_role' => 'instructor',
            'contact' => $request->input('contact'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Add instructor successfully',
            'status' => 200,
        ]);
    }

    // UPDATE INSTRUCTOR
    public function UpdateInstructors(Request $request, $id)
    {
        $instructors = User::find($id);

        if (!$instructors) {
            return response()->json([
                'message' => 'Instructor not found',
                'status' => 404,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $instructors->id,
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 422,
            ]);
        }

        $instructors->name = $request->input('name');
        $instructors->email = $request->input('email');
        $instructors->password = Hash::make($request->input('password'));
        $instructors->contact = $request->input('contact');

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = 'profile_' . Str::random(10) . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/auth/images/profile_pictures', $imageName);

            $imageNameOnly = pathinfo($imagePath, PATHINFO_BASENAME);
            $instructors->profile_picture = $imageNameOnly;
        }

        $instructors->save();

        return response()->json([
            'message' => 'Instructor updated successfully',
            'status' => 200,
        ]);
    }

    public function DeleteInstructors($id)
    {
        $instructors = User::find($id);

        if (!$instructors) {
            return response()->json([
                'message' => 'Instructors not found',
                'status' => 404
            ]);
        }

        $instructors->delete();

        return response()->json([
            'message' => 'Instructor deleted successfully',
            'status' => 200
        ]);
    }
    // END MANAGE INSTRUCTOR
}
