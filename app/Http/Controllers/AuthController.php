<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function Login()
    {
        return view('page.login');
    }

    public function Registration()
    {
        return view('page.registration');
    }
}
