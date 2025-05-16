<?php

use Illuminate\Support\Facades\Route;

// MIDDLEWARE
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\NoCache;
use App\Http\Middleware\UpdateLastSeen;
// CONTROLLER
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\MstDropdownController;
use App\Http\Controllers\MstRuleController;
use App\Http\Controllers\MstUserController;


// LANDING PAGE
Route::get('/', [LandingPageController::class, 'index'])->name('home');
// JOB
Route::get('/job/detail/{id}', [LandingPageController::class, 'detailJob'])->name('job.detail');
Route::get('/job/apply/{id}', [LandingPageController::class, 'applyJob'])->name('job.apply');

// REGISTER
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('store/register', [AuthController::class, 'storeRegist'])->name('storeRegist');
Route::get('auth/confirmation/{email}', [AuthController::class, 'confirmAccount'])->name('confirmAccount');
// FORGOT PASSWORD
Route::get('forget-password', [AuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('auth/store-forget-password', [AuthController::class, 'storeforgetPassword'])->name('storeforgetPassword');
// RESET PASSWORD
Route::get('auth/reset-password/{email}', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('auth/store-reset-password', [AuthController::class, 'storeresetPassword'])->name('storeresetPassword');

// LOGIN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/captcha/generate', [CaptchaController::class, 'generate'])->name('captcha.generate');
Route::post('auth/login', [AuthController::class, 'postlogin'])->name('postlogin')->middleware("throttle:5,2");
// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/expired-logout', [AuthController::class, 'expiredlogout'])->name('expiredlogout');

// LOGGED IN
Route::middleware([Authenticate::class, NoCache::class, UpdateLastSeen::class])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');

    // PROFILE
    Route::controller(ProfileController::class)->group(function () {
        Route::prefix('/profile')->group(function () {
            Route::get('/', 'index')->name('profile');
            // Main Profile
            Route::post('/update-mainprofile', 'updateMainProfile')->name('profile.updateMainProfile');
            // Education
            Route::post('/education/add', 'addEducation')->name('profile.addEducation');
            Route::get('/education/detail/{id}', 'detailEducation')->name('profile.detailEducation');
            Route::get('/education/edit/{id}', 'editEducation')->name('profile.editEducation');
            Route::post('/education/update/{id}', 'updateEducation')->name('profile.updateEducation');
            Route::post('/education/delete/{id}', 'deleteEducation')->name('profile.deleteEducation');
            // General Info
            Route::post('/update-generalinfo', 'updateGeneralInfo')->name('profile.updateGeneralInfo');
            // Experience
            Route::post('/experience/add', 'addExperience')->name('profile.addExperience');
            Route::get('/experience/detail/{id}', 'detailExperience')->name('profile.detailExperience');
            Route::get('/experience/edit/{id}', 'editExperience')->name('profile.editExperience');
            Route::post('/experience/update/{id}', 'updateExperience')->name('profile.updateExperience');
            Route::post('/experience/delete/{id}', 'deleteExperience')->name('profile.deleteExperience');
        });
    });

    // JOB APPLY
    Route::controller(JobApplyController::class)->group(function () {
        Route::prefix('/job-apply')->group(function () {
            Route::get('/', 'index')->name('jobApply');
            Route::post('/store-screening', 'storeScreening')->name('jobApply.storeScreening');
            Route::get('/detail/{id}', 'detail')->name('jobApply.detail');
        });
    });
});
