<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function Home()
    {
        return view('page.home');
    }

    public function About()
    {
        return view('page.about');
    }

    public function Course()
    {
        return view('page.course');
    }

    public function Contact()
    {
        return view('page.contact');
    }
}
