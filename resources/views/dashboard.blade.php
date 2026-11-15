@extends('landing.layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 pt-28 pb-16">
    <div class="max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px]">
        <!-- Flash Alert -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between shadow-xs">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800 font-bold ml-4 text-lg leading-none cursor-pointer">&times;</button>
            </div>
        @endif

        <!-- User Greeting & Header -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-2.5 mb-2">
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider 
                        {{ Auth::user()->hasRole('admin') ? 'bg-purple-100 text-purple-700 border border-purple-200' : (Auth::user()->hasRole('perusahaan') ? 'bg-amber-100 text-amber-700 border border-amber-200' : 'bg-blue-100 text-blue-700 border border-blue-200') }}">
                        Role: {{ ucfirst(Auth::user()->getRoleNames()->first() ?? 'Siswa') }}
                    </span>
                    <span class="text-xs text-slate-400">• {{ Auth::user()->email }}</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold font-urbanist text-slate-900">
                    Selamat Datang, {{ Auth::user()->name }}!
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Kelola data dan pantau seluruh aktivitas PKL Anda dalam satu platform terpadu.
                </p>
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ url('/#lowongan') }}"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs sm:text-sm font-semibold rounded-xl shadow-xs transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span>Cari Lowongan PKL</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2.5 bg-slate-100 hover:bg-rose-50 hover:text-rose-600 text-slate-700 text-xs sm:text-sm font-semibold rounded-xl border border-slate-200/80 transition-colors cursor-pointer">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- Metric Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Lowongan Aktif</p>
                    <h3 class="text-2xl font-bold font-urbanist text-slate-900 mt-0.5">{{ $stats['total_lowongan'] ?? 0 }} Posisi</h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Mitra Perusahaan</p>
                    <h3 class="text-2xl font-bold font-urbanist text-slate-900 mt-0.5">{{ $stats['total_perusahaan'] ?? 0 }} Industri</h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Lamaran Masuk</p>
                    <h3 class="text-2xl font-bold font-urbanist text-slate-900 mt-0.5">{{ $stats['total_pengajuan'] ?? 0 }} Berkas</h3>
                </div>
            </div>
        </div>

        @if(Auth::user()->hasRole('siswa'))
            <!-- SISWA: Riwayat Pengajuan Lamaran PKL -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-6 sm:p-7 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">Riwayat Pengajuan PKL Saya</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Daftar lowongan yang telah Anda lamar beserta update statusnya dari perusahaan</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/70 border-b border-slate-100 text-2xs uppercase tracking-wider font-bold text-slate-500">
                                <th class="py-4 px-6">Posisi Lowongan</th>
                                <th class="py-4 px-6">Perusahaan</th>
                                <th class="py-4 px-6">Tanggal Pengajuan</th>
                                <th class="py-4 px-6">Berkas CV</th>
                                <th class="py-4 px-6">Status Lamaran</th>
                                <th class="py-4 px-6">Catatan Perusahaan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @forelse($pengajuansSiswa as $pengajuan)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6 font-semibold text-slate-800">
                                        {{ $pengajuan->lowongan->judul ?? '-' }}
                                    </td>
                                    <td class="py-4 px-6 text-slate-600">
                                        {{ $pengajuan->lowongan->perusahaan->nama ?? '-' }}
                                    </td>
                                    <td class="py-4 px-6 text-slate-500 text-xs">
                                        {{ $pengajuan->tanggal_pengajuan->format('d M Y') }}
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($pengajuan->cv_file)
                                            <a href="{{ asset('storage/' . $pengajuan->cv_file) }}" target="_blank"
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                Lihat PDF
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-400">-</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($pengajuan->status === 'pending')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                                Sedang Ditinjau
                                            </span>
                                        @elseif($pengajuan->status === 'diterima')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                                ✓ Diterima
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-800">
                                                ✕ Belum Lolos
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-xs text-slate-600 max-w-xs">
                                        {{ $pengajuan->catatan_perusahaan ?: 'Belum ada catatan dari pihak industri.' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 text-center text-slate-400">
                                        <p class="font-medium text-slate-500">Anda belum pernah mengajukan lamaran PKL.</p>
                                        <a href="{{ url('/#lowongan') }}" class="text-blue-600 text-xs font-semibold hover:underline mt-1 inline-block">
                                            Cari Lowongan dan Lamar Sekarang →
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <!-- ADMIN & PERUSAHAAN: Kelola Pengajuan Siswa Masuk -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-6 sm:p-7 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">Kelola Pengajuan Lamaran PKL Siswa</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Tinjau berkas siswa, ubah status persetujuan, dan berikan catatan evaluasi</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/70 border-b border-slate-100 text-2xs uppercase tracking-wider font-bold text-slate-500">
                                <th class="py-4 px-6">Siswa Pelamar</th>
                                <th class="py-4 px-6">Asal Sekolah & Jurusan</th>
                                <th class="py-4 px-6">Posisi Lowongan</th>
                                <th class="py-4 px-6">Berkas CV</th>
                                <th class="py-4 px-6">Status Saat Ini</th>
                                <th class="py-4 px-6 text-center">Aksi / Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @forelse($pengajuansAdmin as $pengajuan)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-slate-800">{{ $pengajuan->user->name ?? '-' }}</div>
                                        <div class="text-xs text-slate-400">NISN: {{ $pengajuan->nisn ?: '-' }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-slate-800 font-medium">{{ $pengajuan->asal_sekolah ?: '-' }}</div>
                                        <div class="text-xs text-slate-500">{{ $pengajuan->jurusan ?: '-' }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-slate-800 font-medium">{{ $pengajuan->lowongan->judul ?? '-' }}</div>
                                        <div class="text-xs text-slate-500">{{ $pengajuan->lowongan->perusahaan->nama ?? '-' }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($pengajuan->cv_file)
                                            <a href="{{ asset('storage/' . $pengajuan->cv_file) }}" target="_blank"
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-semibold bg-blue-50 text-blue-600 hover:bg-blue-100 transition">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                Lihat CV PDF
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-400">Tidak ada berkas</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($pengajuan->status === 'pending')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                                Pending
                                            </span>
                                        @elseif($pengajuan->status === 'diterima')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                                Diterima
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-800">
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            @if($pengajuan->status !== 'diterima')
                                                <form action="{{ route('pengajuan.updateStatus', $pengajuan->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="diterima">
                                                    <input type="hidden" name="catatan_perusahaan" value="Selamat! Kualifikasi Anda sesuai. Silakan hubungi koordinator kami.">
                                                    <button type="submit" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold transition cursor-pointer">
                                                        Terima
                                                    </button>
                                                </form>
                                            @endif

                                            @if($pengajuan->status !== 'ditolak')
                                                <form action="{{ route('pengajuan.updateStatus', $pengajuan->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="ditolak">
                                                    <input type="hidden" name="catatan_perusahaan" value="Mohon maaf, kuota penuh atau kualifikasi belum memenuhi kebutuhan.">
                                                    <button type="submit" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-xs font-semibold transition cursor-pointer">
                                                        Tolak
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 text-center text-slate-400">
                                        Belum ada data pengajuan lamaran PKL dari siswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
