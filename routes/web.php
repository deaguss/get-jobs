<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
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
    Route::prefix('/profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileUser::class, 'index'])->name('index');
        Route::put('/update', [ProfileUser::class, 'updateProfile'])->name('update');
        Route::put('/update-summary', [ProfileUser::class, 'updateSummary'])->name('update.summary');
        Route::put('/update-career', [ProfileUser::class, 'updateCareer'])->name('update.career');
        Route::put('/update-education', [ProfileUser::class, 'updateEducation'])->name('update.education');
        Route::put('/update-skills', [ProfileUser::class, 'updateSkills'])->name('update.skills');
        Route::put('/update-languages', [ProfileUser::class, 'updateLanguages'])->name('update.languages');
        Route::put('/update-avatar', [ProfileUser::class, 'updateAvatar'])->name('update.avatar');
        Route::put('/update-resume', [ProfileUser::class, 'updateResume'])->name('update.resume');
        Route::put('/update-is-visible', [ProfileUser::class, 'updateIsVisible'])->name('update.isVisible');
        Route::post('/add-certi', [ProfileUser::class, 'addCerti'])->name('add.certi');
    });

    Route::prefix('/company')->name('company.')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        Route::get('/register', [CompanyController::class, 'register'])->name('form');
        Route::post('/register', [CompanyController::class, 'addCompany'])->name('add');
        Route::put('/update', [CompanyController::class, 'updateCompany'])->name('update');
    });
});

Route::get('/register-job', function () {
    return view('regis-job.index');
});;


Route::get('/detail-company', function () {
    return view('detail-company.index');
});

Route::get('/save-jobs', function () {
    return view('save-jobs.index');
});

Route::get('/apply-job', function () {
    return view('apply-job.index');
});
