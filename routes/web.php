<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
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
Route::post('/registrationrequest', [AuthController::class, 'RegistrationRequest'])->name('registrationrequest');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
Route::post('/forgot-password', [AuthController::class, 'ForgotPassword'])->name('forgotpassword');
Route::get('/password/reset/{token}', [AuthController::class, 'ForgotForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'Reset'])->name('resetform');

// ADMIN PANEL
Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboardpage');
Route::get('/course', [AdminController::class, 'Course'])->name('coursepage');
Route::get('/instructors', [AdminController::class, 'InstructorPage'])->name('instructorspage');
Route::get('/users', [AdminController::class, 'Users'])->name('userspage');
Route::get('/get-pie-chart', [ChartController::class, 'getPieChartData']);

// ADMIN PANEL MANAGE COURSE
Route::post('/addposition', [AdminController::class, 'AddPosition'])->name('addposition');

// ADMIN CHANGE PASSWORD
Route::post('/admin/changepassword', [AdminController::class, 'ChangePassword'])->name('changepassword');

// ADMIN PANEL USERS CRUD
Route::post('/users/addusers', [AdminController::class, 'AddUsers'])->name('addusers');
Route::put('/users/update/{id}', [AdminController::class, 'UpdateUsers'])->name('updateusers');
Route::delete('/users/delete/{id}', [AdminController::class, 'DeleteUsers'])->name('deleteusers');

// ADMIN PANEL INSTRUCTORS CRUD
Route::post('/instructors/addinstructors', [AdminController::class, 'AddInstructors'])->name('addinstructors');
Route::put('/instructors/update/{id}', [AdminController::class, 'UpdateInstructors'])->name('updateinstructors');
Route::delete('/instructors/delete/{id}', [AdminController::class, 'DeleteInstructors'])->name('deleteinstructors');

// INSTRUCTOR PANEL
Route::get('/instructordb', [InstructorController::class, 'InstructorDashboard'])->name('instructordb');
Route::get('/enroll', [InstructorController::class, 'InstructorEnroll'])->name('enrollpage');

// INSTRUCTOR CHANGE PASSWORD
Route::post('/instructor/changepassword', [])->name('instructorchangepassword');
