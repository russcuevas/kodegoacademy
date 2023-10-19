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

            return response()->json(['message' => 'Login successful', 'redirect_route' => $redirectRoute]);
        }
        return response()->json(['message' => 'Invalid credentials', 'redirect_route' => 'loginpage'], JsonResponse::HTTP_UNAUTHORIZED);
    }

    public function Logout()
    {
        Auth::logout();
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
            'message' => 'Reset link sent to your email',
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
            'password' => 'required|confirmed|min:8',
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
