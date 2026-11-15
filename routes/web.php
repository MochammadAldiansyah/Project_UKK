<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Models\Lowongan;
use App\Models\Pengajuan;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman Landing Page (Dinamis dari Database)
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/lowongan/{id}', [LandingController::class, 'show'])->name('lowongan.show');

// Dashboard Utama (Disesuaikan berdasarkan Role Pengguna)
Route::get('/dashboard', function () {
    $user = Auth::user();
    
    $stats = [
        'total_lowongan' => Lowongan::count(),
        'total_perusahaan' => Perusahaan::count(),
        'total_pengajuan' => Pengajuan::count(),
    ];

    $pengajuansSiswa = null;
    $pengajuansAdmin = null;

    if ($user->hasRole('siswa')) {
        $pengajuansSiswa = Pengajuan::where('user_id', $user->id)
            ->with(['lowongan.perusahaan'])
            ->latest()
            ->get();
    } else {
        $pengajuansAdmin = Pengajuan::with(['user', 'lowongan.perusahaan'])
            ->latest()
            ->take(10)
            ->get();
    }

    return view('dashboard', compact('stats', 'pengajuansSiswa', 'pengajuansAdmin'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Fitur Pengajuan & Profil (Wajib Login)
Route::middleware('auth')->group(function () {
    // Pengajuan PKL Siswa
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::get('/riwayat-pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::patch('/pengajuan/{id}/status', [PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');

    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
