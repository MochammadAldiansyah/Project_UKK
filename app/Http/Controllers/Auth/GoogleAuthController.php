<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    // 1. Mengarahkan user ke halaman pilih akun Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // 2. Menerima data balikan dari Google setelah user klik Lanjutkan
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah email sudah ada di database (misal akun guru/perusahaan/siswa lama)
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Jika email sudah terdaftar, cukup tautkan google_id-nya (role tetap aman)
                $user->update(['google_id' => $googleUser->getId()]);
            } else {
                // Jika email benar-benar baru, otomatis daftarkan sebagai role 'siswa'
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'role' => 'siswa', // Sesuaikan nama kolom role di DB kamu
                ]);
            }

            Auth::login($user);

            // Arahkan ke dashboard masing-masing role
            return match ($user->role) {
                'admin' => redirect('/admin/dashboard'),
                'sekolah' => redirect('/sekolah/dashboard'),
                'guru' => redirect('/guru/dashboard'),
                'perusahaan' => redirect('/perusahaan/dashboard'),
                default => redirect('/siswa/dashboard'),
            };

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Login dengan Google dibatalkan atau gagal.');
        }
    }
}
