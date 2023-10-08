<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// USER PANEL
Route::get('/', [HomeController::class, 'Home'])->name('homepage');
Route::get('/home', [HomeController::class, 'Home'])->name('homepage');
Route::get('/about', [HomeController::class, 'About'])->name('aboutpage');
Route::get('/courses', [HomeController::class, 'Course'])->name('pagecourse');
Route::get('/contact', [HomeController::class, 'Contact'])->name('contactpage');
Route::post('/contact-form', [HomeController::class, 'SubmitContact'])->name('submitcontact');

// AUTH CONTROLLER
Route::get('/login', [AuthController::class, 'Login'])->name('loginpage');
Route::get('/registration', [AuthController::class, 'Registration'])->name('registrationpage');

// ADMIN PANEL
Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboardpage');
Route::get('/course', [AdminController::class, 'Course'])->name('coursepage');
Route::get('/website', [AdminController::class, 'Website'])->name('websitepage');
