<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
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




Route::prefix('sign-up')->name('signup.')->middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showRegistrationForm'])->name('form');
    Route::post('/', [AuthController::class, 'register']);
    Route::post('/verify-otp/{id}', [AuthController::class, 'verifyOtp'])->name('verify.otp');
    Route::post('/resend-otp/{id}', [AuthController::class, 'resendOtp'])->name('resend.otp');
});

Route::prefix('sign-in')->name('signin.')->middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('form');
    Route::post('/', [AuthController::class, 'login']);
    Route::get('/forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.form');
    Route::post('/forget-password', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.email');

    Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
    Route::post('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');
});

Route::get('/sign-out', [AuthController::class, 'logout'])->middleware('auth')->name('sign.out');

Route::prefix('/')->name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])
    ->name('index');

    Route::post('/{id}/saved-jobs',[CompanyController::class, 'saveJobAdvertisement'])
    ->middleware('auth')->name('save.jobs');

    Route::get('/{id}/job', [HomeController::class, 'detailJob'])
    ->middleware('auth')->name('detail.jobs');

    Route::get('/{id}/apply', [HomeController::class, 'applyJob'])
    ->middleware('auth')->name('apply.jobs');
    Route::post('/{id}/apply/send', [CompanyController::class, 'applySend'])->middleware('auth')->name('apply.send');

    Route::prefix('/profile')->middleware('auth')->name('profile.')->group(function () {
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

        Route::prefix('/bookmark')->name('bookmark.')->group(function () {
            Route::get('/', [ProfileUser::class, 'bookmark'])->name('index');
        });
    });

    Route::prefix('/company')->name('company.')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        Route::get('/register', [CompanyController::class, 'register'])
        ->middleware('auth')->name('form');
        Route::post('/register', [CompanyController::class, 'addCompany'])
        ->middleware('auth')->name('add');
        Route::put('/update', [CompanyController::class, 'updateCompany'])
        ->middleware('auth')->name('update');

        Route::prefix('/job')->middleware('auth')->name('job.')->group(function ()
        {
            Route::post('/', [CompanyController::class, 'addJobAdvertisement'])->name('add');
            Route::delete('/{id}/delete', [CompanyController::class, 'deleteJobAdvertisement'])->name('delete');
        });

        Route::prefix('/explore')->name('explore.')->group(function () {
            Route::get('/', [CompanyController::class, 'explore'])->name('index');
            Route::get('/{id}', [CompanyController::class, 'detail'])
            ->middleware('auth')->name('detail');
        });
    });
});


