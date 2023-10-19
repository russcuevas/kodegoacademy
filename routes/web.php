<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
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
Route::post('/loginrequest', [AuthController::class, 'LoginRequest'])->name('loginrequest');
Route::get('/registration', [AuthController::class, 'Registration'])->name('registrationpage');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
Route::post('/forgot-password', [AuthController::class, 'ForgotPassword'])->name('forgotpassword');
Route::get('/password/reset/{token}', [AuthController::class, 'ForgotForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'Reset'])->name('resetform');

// ADMIN PANEL
Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboardpage');
Route::get('/course', [AdminController::class, 'Course'])->name('coursepage');
Route::get('/instructors', [AdminController::class, 'InstructorPage'])->name('instructorspage');
Route::get('/users', [AdminController::class, 'Users'])->name('userspage');

// INSTRUCTOR PANEL
Route::get('/instructordb', [InstructorController::class, 'InstructorDashboard'])->name('instructordb');
Route::get('/enroll', [InstructorController::class, 'InstructorEnroll'])->name('enrollpage');
