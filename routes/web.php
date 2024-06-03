<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ProfileUser;
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

Route::prefix('sign-up')->name('signup.')->group(function () {
    Route::get('/', [AuthController::class, 'showRegistrationForm'])->name('form');
    Route::post('/', [AuthController::class, 'register']);
    Route::post('/verify-otp/{id}', [AuthController::class, 'verifyOtp'])->name('verify.otp');
    Route::post('/resend-otp/{id}', [AuthController::class, 'resendOtp'])->name('resend.otp');
});

Route::prefix('sign-in')->name('signin.')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('form');
    Route::post('/', [AuthController::class, 'login']);
    Route::get('/forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.form');
    Route::post('/forget-password', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.email');

    Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
    Route::post('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');
});

Route::get('/sign-out', [AuthController::class, 'logout'])->name('sign.out');

Route::get('/profile', [ProfileUser::class, 'index'])->name('profile');

Route::get('/detail-company', function () {
    return view('detail-company.index');
});
