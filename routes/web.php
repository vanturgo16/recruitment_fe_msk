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
use App\Http\Controllers\MstDropdownController;
use App\Http\Controllers\MstRuleController;
use App\Http\Controllers\MstUserController;


// LANDING PAGE
Route::get('/', [LandingPageController::class, 'index'])->name('home');

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
});
