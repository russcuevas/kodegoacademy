<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('admin.dashboard');
    }

    public function Course()
    {
        return view('admin.course');
    }

    public function Website()
    {
        return view('admin.website');
    }
}
