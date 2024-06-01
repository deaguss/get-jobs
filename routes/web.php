<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('index');
});


Route::get('/explore-companies', function () {
    return view('explore-companies');
});


Route::get('/sign-up', [AuthController::class, 'showRegistrationForm'])->name('sign-up.form');
Route::post('/sign-up', [AuthController::class, 'register'])->name('sign-up');

Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('sign.in.form');
Route::post('/sign-in', [AuthController::class, 'login'])->name('sign.in');

Route::post('/verify-otp/{id}', [AuthController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/resend-otp/{id}', [AuthController::class, 'resendOtp'])->name('resend.otp');

Route::get('/forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.form');
Route::post('/forget-password', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.email');

Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');
