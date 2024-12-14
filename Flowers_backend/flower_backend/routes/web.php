<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController; // Import the AuthController
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.LandingPage');
});



Route::get('/LoginPage', [AuthController::class, 'showLoginForm'])->name('Login.page'); // Show login page





Route::get('/RegisterPage' , function() {
    return view ('components.Auth.RegisterPage');
})->name('Register.page');

Route::get('/DashboardPage' , function() {
    return view ('components.Admin.DashboardPage');
})->name('Dashboard.page');


Route::post('/Register' , [AdminController::class,  'register'])->name('register.admin');