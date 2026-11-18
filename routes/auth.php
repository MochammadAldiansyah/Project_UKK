<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordOtpController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Guest: Register, Login, Google OAuth, OTP Password Recovery.
| Auth : Email Verification, Password Confirm/Update, Logout.
|
*/

// ==========================================
// GUEST ROUTES
// ==========================================
Route::middleware('guest')->group(function () {
    // Registration
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->middleware('throttle:6,1');

    // Login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('throttle:6,1');

    // Google OAuth
    Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])
        ->name('google.login');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

    // OTP Password Recovery — Step 1: Request OTP
    Route::get('forgot-password', [ForgotPasswordOtpController::class, 'showForgotForm'])
        ->name('password.request');
    Route::post('forgot-password', [ForgotPasswordOtpController::class, 'sendOtp'])
        ->middleware('throttle:6,1')
        ->name('password.email');

    // OTP Password Recovery — Step 2: Verify OTP
    Route::get('verify-otp', [ForgotPasswordOtpController::class, 'showVerifyForm'])
        ->name('otp.verify.form');
    Route::post('verify-otp', [ForgotPasswordOtpController::class, 'verifyOtp'])
        ->middleware('throttle:6,1')
        ->name('otp.verify');
    Route::post('resend-otp', [ForgotPasswordOtpController::class, 'resendOtp'])
        ->middleware('throttle:3,1')
        ->name('otp.resend');

    // OTP Password Recovery — Step 3: Set New Password
    Route::get('reset-password', [ForgotPasswordOtpController::class, 'showResetForm'])
        ->name('password.reset.form');
    Route::post('reset-password', [ForgotPasswordOtpController::class, 'resetPassword'])
        ->middleware('throttle:6,1')
        ->name('password.update');

    // Direct view routes (for standalone access)
    Route::get('verify-code', function () {
        return view('auth.verify-code');
    })->name('password.verify.code');

    Route::get('new-password', function () {
        return view('auth.reset-password', ['request' => request()]);
    })->name('password.new');
});

// ==========================================
// AUTHENTICATED ROUTES
// ==========================================
Route::middleware('auth')->group(function () {
    // Email Verification
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Password Confirm & Update
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])
        ->name('password.update.auth');

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
