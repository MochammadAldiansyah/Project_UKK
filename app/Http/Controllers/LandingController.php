<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Tampilkan landing page dengan data lowongan dan mitra dinamis dari database.
     */
    public function index(Request $request)
    {
        $query = Lowongan::with('perusahaan')->where('status', 'buka');

        // Fitur Pencarian & Filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('jurusan', 'like', "%{$search}%")
                  ->orWhere('keahlian', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhereHas('perusahaan', function ($p) use ($search) {
                      $p->where('nama', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('jurusan') && $request->jurusan !== 'all') {
            $query->where('jurusan', 'like', "%{$request->jurusan}%");
        }

        $lowongans = $query->latest()->get();
        $perusahaans = Perusahaan::withCount('lowongans')->get();

        return view('landing.landing', compact('lowongans', 'perusahaans'));
    }

    /**
     * Tampilkan detail lowongan (untuk modal atau halaman detail).
     */
    public function show($id)
    {
        $lowongan = Lowongan::with(['perusahaan', 'pengajuans'])->findOrFail($id);

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $lowongan,
            ]);
        }

        return view('landing.detail', compact('lowongan'));
    }
}

