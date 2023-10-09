<?php

namespace App\Http\Controllers;

use App\Models\ForgotPassword;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        $token = bin2hex(random_bytes(32));

        $user = User::where('email', $email)->first();

        if ($user) {
            $existingReset = $user->passwordResets()->first();

            if ($existingReset) {
                $existingReset->update([
                    'token' => $token,
                ]);
            } else {
                $user->passwordResets()->create([
                    'token' => $token,
                ]);
            }

            try {
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = 'russelarchiefoodorder@gmail.com';
                $mail->Password = 'cjwitldatrerscln';

                $mail->setFrom('russdev@gmail.com', 'KodeGo Company');
                $mail->addAddress($email);

                $mail->Subject = 'Password Reset Request';
                $mail->Body = "To reset your password, click the following link: " . url('/password_reset', ['token' => $token]);

                $mail->send();

                return response()->json(['message' => 'Password reset request is sent successfully, please check your email to change your password.', 'status' => 200]);

            } catch (Exception $e) {
                return response()->json(['message' => 'Email could not be sent.', 'status' => 500]);
            }
        }

        return response()->json(['message' => ''], 404);
    }

    public function PasswordReset(Request $request, $token)
    {
        $passwordReset = ForgotPassword::where('token', $token)->first();

        if ($passwordReset) {
            $user_id = $passwordReset->user_id;

            $user = User::find($user_id);

            if ($user) {
                $email = $user->email;

                return view('page.password_reset', ['token' => $token, 'email' => $email]);
            }
        } else {
            return view('page.password_reset');
        }
    }

}
