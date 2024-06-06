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

Route::prefix('/')->name('home.')->group(function () {
    Route::get('/profile', [ProfileUser::class, 'index'])->name('profile');
    Route::put('/profile-update', [ProfileUser::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile-update-summary', [ProfileUser::class, 'updateSummary'])->name('profile.update.summary');
    Route::put('/profile-update-career', [ProfileUser::class, 'updateCareer'])->name('profile.update.career');
    Route::put('/profile-update-education', [ProfileUser::class, 'updateEducation'])->name('profile.update.education');
    Route::put('/profile-update-skills', [ProfileUser::class, 'updateSkills'])->name('profile.update.skills');
    Route::put('/profile-update-languages', [ProfileUser::class, 'updateLanguages'])->name('profile.update.languages');
    Route::put('/profile-update-avatar', [ProfileUser::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::put('/profile-update-resume', [ProfileUser::class, 'updateResume'])->name('profile.update.resume');
    Route::put('/profile-update-is-visible', [ProfileUser::class, 'updateIsVisible'])->name('profile.update.isVisible');
    Route::post('/profile-add-certi', [ProfileUser::class, 'addCerti'])->name('profile.add.certi');
});


Route::get('/detail-company', function () {
    return view('detail-company.index');
});

Route::get('/save-jobs', function () {
    return view('save-jobs.index');
});
