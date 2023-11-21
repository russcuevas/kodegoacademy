<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Offered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class HomeController extends Controller
{
    public function Home()
    {
        $offered_course = Offered::with(['position', 'course', 'user'])->get();
        return view('page.home', compact('offered_course'));
    }

    public function Enrollment(Request $request, Offered $offered_course)
    {
        if ($request->user()) {
            $existingEnrollment = Enrollment::where('user_id', $request->user()->id)
                ->where('offered_id', $offered_course->id)
                ->first();

            if ($existingEnrollment) {
                return response()->json([
                    'message' => 'You are already enrolled in this course.',
                    'status' => 400,
                ]);
            }

            if ($offered_course->available > 0) {
                $lastEnrollment = Enrollment::latest()->value('enrollment_number');
                $lastNumber = intval(substr($lastEnrollment, 8)) + 1;
                $newEnrollmentNumber = 'Enrollee' . str_pad($lastNumber, 2, '0', STR_PAD_LEFT);
                Enrollment::create([
                    'enrollment_number' => $newEnrollmentNumber,
                    'user_id' => $request->user()->id,
                    'offered_id' => $offered_course->id,
                    'status' => 'Pending',
                ]);

                $offered_course->decrement('available');

                return response()->json([
                    'message' => 'Request submitted please wait the approval of the instructor',
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'message' => 'No available slots',
                    'status' => 400,
                ]);
            }
        } else {
            return response()->json([
                'message' => 'You must be logged in to enroll.',
                'status' => 401,
            ]);
        }
    }

    public function About()
    {
        return view('page.about');
    }

    public function Course()
    {
        $offered_course = Offered::with(['position', 'course', 'user'])->get();
        return view('page.course', compact('offered_course'));
    }

    public function Profile()
    {
        if (Auth::check()) {
            if (Auth::user()->user_role !== 'user') {
                return redirect()->route('homepage');
            }
        } else {
            return redirect()->route('homepage');
        }

        $user = Auth::user();
        return view('page.profile', compact('user'));
    }

    public function Contact()
    {
        return view('page.contact');
    }

    public function SubmitContact(Request $request)
    {
        $response = [];

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->Username = 'russelarchiefoodorder@gmail.com';
            $mail->Password = 'cjwitldatrerscln';

            $mail->setFrom('your_email@example.com', 'KodeGo Company');
            $mail->addAddress('russelarchiefoodorder@gmail.com');

            $email = $request->input('email');
            $mobile = $request->input('mobile');
            $message = $request->input('message');

            $mail->isHTML(true);
            $mail->Subject = 'Contact Form';
            $mail->Body = "
            <html>
                    <head>
                        <style>
                            /* Inline CSS for email compatibility */
                            body {
                                background-color: #fff;
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 0;
                            }
                            .container {
                                max-width: 600px;
                                margin: 0 auto;
                                background-color: #ffffff;
                                padding: 20px;
                            }
                            .header {
                                background-color: #404040;
                                color: #ffffff;
                                text-align: center;
                                padding: 10px;
                            }
                            .content {
                                padding: 20px;
                            }
                            .footer {
                                background-color: #f5f5f5;
                                text-align: center;
                                padding: 10px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h1 style='color: #9fef00 '>Kodego Company</h1>
                            </div>
                            <div class='content'>
                                <h3>Thank you for your contacting us!</h3>
                                <p>Email: $email</p>
                                <p>Mobile: $mobile</p>
                                <p>Message: $message</p>
                            </div>
                        </div>
                    </body>
                    </html>
                    ";

            $mail->send();
            $response['success'] = true;
            $response['message'] = 'Email sent successfully';
        } catch (Exception $e) {
            $response['success'] = false;
            $response['message'] = 'Email could not be sent. ' . $mail->ErrorInfo;
        }

        return response()->json($response);
    }
}
