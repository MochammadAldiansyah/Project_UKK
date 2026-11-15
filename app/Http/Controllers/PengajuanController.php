<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    /**
     * Tampilkan riwayat pengajuan PKL siswa yang sedang login.
     */
    public function index()
    {
        $user = Auth::user();

        // Jika admin / pembimbing, tampilkan semua pengajuan
        if ($user->hasRole('admin')) {
            $pengajuans = Pengajuan::with(['user', 'lowongan.perusahaan'])->latest()->paginate(15);
            return view('dashboard.pengajuan.index', compact('pengajuans'));
        }

        // Jika perusahaan, tampilkan pengajuan untuk lowongan perusahaannya
        if ($user->hasRole('perusahaan') && $user->perusahaan) {
            $pengajuans = Pengajuan::whereHas('lowongan', function ($q) use ($user) {
                $q->where('perusahaan_id', $user->perusahaan->id);
            })->with(['user', 'lowongan'])->latest()->paginate(15);

            return view('dashboard.pengajuan.index', compact('pengajuans'));
        }

        // Jika siswa, tampilkan pengajuannya sendiri
        $pengajuans = Pengajuan::where('user_id', $user->id)
            ->with(['lowongan.perusahaan'])
            ->latest()
            ->get();

        return view('dashboard.pengajuan.siswa', compact('pengajuans'));
    }

    /**
     * Simpan pengajuan lamaran PKL baru oleh siswa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongans,id',
            'nisn' => 'required|string|max:20',
            'asal_sekolah' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'cv_file' => 'required|file|mimes:pdf|max:2048',
            'surat_pengantar' => 'nullable|file|mimes:pdf|max:2048',
            'catatan' => 'nullable|string|max:500',
        ], [
            'cv_file.mimes' => 'File CV / Resume harus berformat PDF.',
            'cv_file.max' => 'Ukuran file CV maksimal 2 MB.',
            'surat_pengantar.mimes' => 'Surat Pengantar harus berformat PDF.',
            'surat_pengantar.max' => 'Ukuran surat pengantar maksimal 2 MB.',
        ]);

        $user = Auth::user();
        $lowongan = Lowongan::findOrFail($request->lowongan_id);

        // Cek kuota
        if ($lowongan->sisa_kuota <= 0 || $lowongan->status !== 'buka') {
            return back()->with('error', 'Maaf, kuota untuk lowongan PKL ini sudah penuh atau telah ditutup.');
        }

        // Cek apakah siswa sudah pernah mendaftar di lowongan ini
        $sudahDaftar = Pengajuan::where('user_id', $user->id)
            ->where('lowongan_id', $lowongan->id)
            ->exists();

        if ($sudahDaftar) {
            return back()->with('error', 'Anda sudah pernah mengajukan lamaran untuk lowongan ini.');
        }

        // Upload berkas
        $cvPath = null;
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->store('berkas_cv', 'public');
        }

        $suratPath = null;
        if ($request->hasFile('surat_pengantar')) {
            $suratPath = $request->file('surat_pengantar')->store('berkas_pengantar', 'public');
        }

        // Simpan data pengajuan
        Pengajuan::create([
            'user_id' => $user->id,
            'lowongan_id' => $lowongan->id,
            'tanggal_pengajuan' => now(),
            'nisn' => $request->nisn,
            'asal_sekolah' => $request->asal_sekolah,
            'jurusan' => $request->jurusan,
            'cv_file' => $cvPath,
            'surat_pengantar' => $suratPath,
            'catatan' => $request->catatan,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pengajuan PKL Anda berhasil dikirim! Silakan tunggu konfirmasi dari perusahaan/mitra.');
    }

    /**
     * Update status pengajuan (Diterima / Ditolak) oleh Admin atau Perusahaan.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak,pending',
            'catatan_perusahaan' => 'nullable|string|max:500',
        ]);

        $pengajuan = Pengajuan::with('lowongan')->findOrFail($id);
        $oldStatus = $pengajuan->status;
        $newStatus = $request->status;

        $pengajuan->update([
            'status' => $newStatus,
            'catatan_perusahaan' => $request->catatan_perusahaan,
        ]);

        // Sesuaikan sisa kuota jika diterima
        if ($oldStatus !== 'diterima' && $newStatus === 'diterima') {
            if ($pengajuan->lowongan->sisa_kuota > 0) {
                $pengajuan->lowongan->decrement('sisa_kuota');
            }
        } elseif ($oldStatus === 'diterima' && $newStatus !== 'diterima') {
            $pengajuan->lowongan->increment('sisa_kuota');
        }

        return back()->with('success', 'Status pengajuan berhasil diperbarui menjadi: ' . ucfirst($newStatus));
    }
}

