<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    // Redirect the user to the Google account chooser
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the callback returned by Google after the user continues
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check whether the email already exists (e.g. an existing teacher/company/student account)
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Existing account: only link the google_id so the role stays intact
                $user->update(['google_id' => $googleUser->getId()]);
            } else {
                // Brand new email: register automatically with the 'siswa' role
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'role' => 'siswa',
                ]);
            }

            Auth::login($user);

            // Redirect to the dashboard for each role
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
