<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordOtpController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])
        ->middleware('throttle:6,1');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('throttle:6,1');

    Route::get('verify-code', function () {
        return view('auth.verify-code');
    })->name('password.verify.code');

    Route::get('new-password', function () {
        return view('auth.reset-password', ['request' => request()]);
    })->name('password.new');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

// Tahap 1: Lupa Password (Input Email)
Route::get('forgot-password', [ForgotPasswordOtpController::class, 'showForgotForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordOtpController::class, 'sendOtp'])->name('password.email')->middleware('throttle:6,1');

// Tahap 2: Verifikasi Kode OTP
Route::get('verify-otp', [ForgotPasswordOtpController::class, 'showVerifyForm'])->name('otp.verify.form');
Route::post('verify-otp', [ForgotPasswordOtpController::class, 'verifyOtp'])->name('otp.verify')->middleware('throttle:6,1');
Route::post('resend-otp', [ForgotPasswordOtpController::class, 'resendOtp'])->name('otp.resend')->middleware('throttle:3,1');

// Tahap 3: Buat Password Baru
Route::get('reset-password', [ForgotPasswordOtpController::class, 'showResetForm'])->name('password.reset.form');
Route::post('reset-password', [ForgotPasswordOtpController::class, 'resetPassword'])->name('password.update')->middleware('throttle:6,1');
