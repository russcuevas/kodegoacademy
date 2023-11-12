<?php

namespace App\Http\Controllers;

use App\Models\Offered;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class HomeController extends Controller
{
    public function Home()
    {
        $offered_course = Offered::with(['position', 'course', 'user'])->get();
        return view('page.home', compact('offered_course'));
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
