<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordReset;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function Login()
    {
        if (Auth::check()) {
            $user = Auth::user();
            switch ($user->user_role) {
                case 'admin':
                    return redirect('/dashboard');
                    break;
                case 'instructor':
                    return redirect('/instructordb');
                    break;
                case 'user':
                    return redirect('/home');
                    break;
                default:
                    return redirect('/');
            }
        }
        return view('page.login');
    }

    public function LoginRequest(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->user_role) {
                case 'admin':
                    $redirectRoute = '/dashboard';
                    break;
                case 'instructor':
                    $redirectRoute = '/instructordb';
                    break;
                case 'user':
                    $redirectRoute = '/home';
                    break;
                default:
                    $redirectRoute = '/';
            }

            // set this login message inside dashboard
            session()->flash('success_message', 'Login successful');
            return response()->json(['message' => 'Login successful', 'redirect_route' => $redirectRoute]);
        }

        return response()->json(['message' => 'Invalid credentials', 'redirect_route' => 'loginpage'], JsonResponse::HTTP_UNAUTHORIZED);
    }


    public function Logout()
    {
        Auth::logout();

        // set this logout message if user logout
        session()->flash('logout_message', 'Logout successful');
        return redirect('/login');
    }

    public function Registration()
    {
        if (Auth::check()) {
            $user = Auth::user();
            switch ($user->user_role) {
                case 'admin':
                    return redirect('/dashboard');
                    break;
                case 'instructor':
                    return redirect('/instructordb');
                    break;
                case 'user':
                    return redirect('/home');
                    break;
                default:
                    return redirect('/');
            }
        }
        return view('page.registration');
    }

    public function RegistrationRequest(Request $request)
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
            'message' => 'Registered successfully',
            'status' => 200,
        ]);
    }

    public function ForgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 404,
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'This email is not found',
                'status' => 400,
            ]);
        }

        $token = Str::random(60);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );

        $resetLink = url('/password/reset/' . $token);

        Mail::to($user->email)->send(new ResetPasswordMail($user->name, $resetLink));

        return response()->json([
            'message' => 'Password reset request is sent successfully, please check your email to change your password.',
            'status' => 200,
            'resetLink' => $resetLink,
        ]);
    }

    public function ForgotForm($token)
    {
        if (!$token) {
            return redirect()->route('loginpage')->with('error', 'Invalid reset link');
        }

        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            return redirect()->route('loginpage')->with('error', 'Token not found or has expired try again');
        }

        return view('page.password_reset', ['token' => $token]);
    }

    public function Reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|confirmed|between:8,12',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        $passwordReset = PasswordReset::where('token', $request->token)->first();

        if (!$passwordReset) {
            return response()->json([
                'message' => 'Token expired, request a new password reset',
                'status' => 422,
                'redirect_route' => route('loginpage'),
            ]);
        }

        $user = User::where('email', $passwordReset->email)->first();

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('token', $request->token)->delete();

        return response()->json([
            'message' => 'Password reset successfully',
            'status' => 200,
            'redirect_route' => route('loginpage'),
        ]);
    }
}
