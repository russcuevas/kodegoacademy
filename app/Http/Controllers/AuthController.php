<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
