<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\TurnstileRule;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

/**
 * Handles the OTP-based password recovery flow.
 *
 * Steps: 1) Request OTP via email  2) Verify 6-digit code  3) Set new password.
 */
class ForgotPasswordOtpController extends Controller
{
    /** OTP validity period in minutes. */
    private const OTP_EXPIRATION_MINUTES = 10;

    /** Session key for the email being reset. */
    private const SESSION_RESET_EMAIL = 'reset_email';

    /** Session key indicating OTP verification status. */
    private const SESSION_OTP_VERIFIED = 'otp_verified';

    /** Show the forgot-password form. */
    public function showForgotForm(): View
    {
        return view('auth.forgot-password');
    }

    /** Validate email and send OTP code. */
    public function sendOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'cf-turnstile-response' => [
                app()->environment('testing') ? 'nullable' : 'required',
                new TurnstileRule(),
            ],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tersebut tidak terdaftar di sistem kami.',
            'cf-turnstile-response.required' => 'Harap selesaikan verifikasi captcha.',
        ]);

        $this->generateAndSendOtp($request->email);

        session([
            self::SESSION_RESET_EMAIL => $request->email,
            self::SESSION_OTP_VERIFIED => false,
        ]);

        return redirect()->route('otp.verify.form')
            ->with('status', 'Kode OTP 6 digit telah dikirim ke email Anda.');
    }

    /** Resend a new OTP to the email currently in session. */
    public function resendOtp(): RedirectResponse
    {
        $email = session(self::SESSION_RESET_EMAIL);

        if (! $email) {
            return redirect()->route('password.request');
        }

        $this->generateAndSendOtp($email);

        return back()->with('status', 'Kode OTP baru telah berhasil dikirim ulang ke email Anda.');
    }

    /** Show the OTP verification form. */
    public function showVerifyForm(): View|RedirectResponse
    {
        if (! session(self::SESSION_RESET_EMAIL)) {
            return redirect()->route('password.request');
        }

        return view('auth.verify-code');
    }

    /** Verify the submitted OTP against the stored hash. */
    public function verifyOtp(Request $request): RedirectResponse
    {
        $email = session(self::SESSION_RESET_EMAIL);

        if (! $email) {
            return redirect()->route('password.request');
        }

        // Normalize OTP if submitted as an array of digits
        $request->merge([
            'otp' => is_array($request->otp) ? implode('', $request->otp) : $request->otp,
        ]);

        $request->validate([
            'otp' => ['required', 'digits:6'],
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.digits' => 'Kode OTP harus berupa 6 digit angka.',
        ]);

        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (! $record || ! Hash::check($request->otp, $record->token)) {
            return back()->withErrors(['otp' => 'Kode OTP salah atau tidak sesuai.']);
        }

        $isExpired = Carbon::parse($record->created_at)
            ->addMinutes(self::OTP_EXPIRATION_MINUTES)
            ->isPast();

        if ($isExpired) {
            DB::table('password_reset_tokens')->where('email', $email)->delete();

            return back()->withErrors(['otp' => 'Kode OTP sudah kedaluwarsa. Silakan kirim ulang kode baru.']);
        }

        session([self::SESSION_OTP_VERIFIED => true]);

        return redirect()->route('password.reset.form');
    }

    /** Show the new-password form after OTP is verified. */
    public function showResetForm(): View|RedirectResponse
    {
        $email = session(self::SESSION_RESET_EMAIL);
        $isVerified = session(self::SESSION_OTP_VERIFIED);

        if (! $email || ! $isVerified) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password');
    }

    /** Save the new password and clean up tokens & session. */
    public function resetPassword(Request $request): RedirectResponse
    {
        $email = session(self::SESSION_RESET_EMAIL);
        $isVerified = session(self::SESSION_OTP_VERIFIED);

        if (! $email || ! $isVerified) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',   // At least 1 uppercase letter
                'regex:/[0-9]/',   // At least 1 digit
                'regex:/^\S*$/u',  // No spaces
            ],
        ], [
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal terdiri dari 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex' => 'Password harus mengandung minimal 1 huruf besar, 1 angka, dan tanpa spasi.',
        ]);

        DB::transaction(function () use ($email, $request) {
            User::where('email', $email)->update([
                'password' => Hash::make($request->password),
            ]);

            DB::table('password_reset_tokens')->where('email', $email)->delete();
        });

        session()->forget([self::SESSION_RESET_EMAIL, self::SESSION_OTP_VERIFIED]);

        return redirect()->route('login')
            ->with('status', 'Kata sandi berhasil diperbarui! Silakan masuk dengan kata sandi baru Anda.');
    }

    /** Generate a random 6-digit OTP, store its hash, and email it. */
    private function generateAndSendOtp(string $email): void
    {
        $otp = (string) random_int(100000, 999999);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => Hash::make($otp),
                'created_at' => Carbon::now(),
            ]
        );

        Mail::send('emails.reset-otp', ['otp' => $otp], function ($message) use ($email) {
            $message->to($email)
                ->subject('Kode Verifikasi Reset Password - Portal PKL');
        });
    }
}
