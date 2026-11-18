<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordOtpController extends Controller
{
    // 1. Tampilkan halaman input email
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // 2. Proses kirim OTP ke email
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'Email tersebut tidak terdaftar di sistem.',
        ]);

        $this->generateAndSendOtp($request->email);

        session([
            'reset_email' => $request->email,
            'otp_verified' => false,
        ]);

        return redirect()->route('otp.verify.form')
            ->with('status', 'Kode OTP 6 digit telah dikirim ke email kamu.');
    }

    // Fitur tambahan jika di halaman OTP ada tombol "Kirim Ulang Kode"
    public function resendOtp()
    {
        $email = session('reset_email');
        if (! $email) {
            return redirect()->route('password.request');
        }

        $this->generateAndSendOtp($email);

        return back()->with('status', 'Kode OTP baru telah dikirim ulang ke email kamu.');
    }

    // 3. Tampilkan halaman input kode OTP
    public function showVerifyForm()
    {
        if (! session('reset_email')) {
            return redirect()->route('password.request');
        }

        // GANTI 'auth.verify-otp' sesuai nama file blade halaman input kode kamu
        return view('auth.verify-code');
    }

    // 4. Proses cek kecocokan kode OTP
    public function verifyOtp(Request $request)
    {
        $email = session('reset_email');
        if (! $email) {
            return redirect()->route('password.request');
        }

        // Gabungkan otomatis jika di Blade memakai 6 input kotak (name="otp[]")
        $request->merge([
            'otp' => is_array($request->otp) ? implode('', $request->otp) : $request->otp,
        ]);

        $request->validate([
            'otp' => 'required|digits:6',
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.digits' => 'Kode OTP harus 6 digit angka.',
        ]);

        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (! $record || ! Hash::check($request->otp, $record->token)) {
            return back()->withErrors(['otp' => 'Kode OTP salah atau tidak sesuai.']);
        }

        if (Carbon::parse($record->created_at)->addMinutes(10)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $email)->delete();

            return back()->withErrors(['otp' => 'Kode OTP sudah kedaluwarsa. Silakan kirim ulang kode.']);
        }

        session(['otp_verified' => true]);

        return redirect()->route('password.reset.form');
    }

    // 5. Tampilkan halaman buat password baru
    public function showResetForm()
    {
        if (! session('reset_email') || ! session('otp_verified')) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password');
    }

    // 6. Simpan password baru ke database
  // 6. Simpan password baru ke database
    public function resetPassword(Request $request)
    {
        $email = session('reset_email');
        if (! $email || ! session('otp_verified')) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',   // Minimal 1 huruf besar
                'regex:/[0-9]/',   // Minimal 1 angka
                'regex:/^\S*$/u',  // Tanpa spasi
            ],
        ], [
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex' => 'Password harus memiliki minimal 1 huruf besar, 1 angka, dan tanpa spasi.',
        ]);

        User::where('email', $email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email', $email)->delete();
        session()->forget(['reset_email', 'otp_verified']);

        return redirect()->route('login')
            ->with('status', 'Password berhasil diubah! Silakan login.');
    }

    // Helper generate & kirim email
    private function generateAndSendOtp(string $email): void
    {
        $otp = random_int(100000, 999999);

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
