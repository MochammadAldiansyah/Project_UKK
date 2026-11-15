@extends('landing.layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="relative overflow-hidden bg-white pt-[120px] lg:pt-[201px] pb-12 lg:pb-[118px]">
        <!-- Decorative blur circle: yellow -->
        <div
            class="hero-circle-yellow pointer-events-none absolute w-[317px] h-[317px] top-[80px] left-[-109px] rounded-full bg-[#F9BD22]/20 blur-[64px] z-0">
        </div>

        <!-- Decorative blur circle: blue -->
        <div
            class="hero-circle-blue pointer-events-none absolute w-[550px] h-[550px] lg:w-[650px] lg:h-[650px] -top-[140px] right-[-100px] rounded-full bg-[#C7DCFE]/70 blur-[80px] z-0">
        </div>

        <!-- Main container -->
        <div
            class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px] flex flex-col lg:flex-row items-center justify-between gap-10 lg:gap-8 relative z-10">

            <!-- Hero text content -->
            <div
                class="w-full lg:w-auto lg:max-w-[540px] xl:max-w-[620px] 2xl:max-w-[703px] lg:h-[351px] flex flex-col justify-between text-left z-10 py-2 lg:py-0 shrink-0">
                <div class="space-y-4 sm:space-y-6">
                    <h1
                        class="font-urbanist text-4xl sm:text-[56px] lg:text-[56px] font-bold text-[#333333] leading-[1.2] tracking-normal max-w-[703px]">
                        Temukan tempat PKL impianmu dalam satu platform.
                    </h1>

                    <p class="text-base sm:text-lg text-slate-500 leading-relaxed max-w-[490px]">
                        Temukan tempat PKL yang sesuai dengan jurusanmu, ajukan secara online, dan kelola kegiatan PKL dalam
                        satu platform.
                    </p>
                </div>

                <!-- Call to action -->
                <div class="pt-6 lg:pt-8">
                    <a href="#lowongan"
                        class="inline-flex items-center gap-3 px-4 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-bold text-base rounded-xl shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200 group cursor-pointer">
                        <span>Cari Lowongan PKL</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 16 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33337 8H12.6667M12.6667 8L8.66671 4M12.6667 8L8.66671 12" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Hero illustration -->
            <div class="w-full lg:w-auto flex-1 flex items-center justify-center lg:justify-end z-10 min-w-0">
                <div class="relative w-full max-w-[500px] sm:max-w-[700px] lg:max-w-none lg:w-[480px] xl:w-[350px] 2xl:w-[370px] flex items-center justify-center lg:justify-end">
                    <img src="{{ asset('assets/image/hero.svg') }}" alt="Ilustrasi Siswa PKL dalam satu platform"
                        width="664" height="594"
                        class="w-full h-auto max-h-[580px] lg:max-h-[640px] object-contain select-none pointer-events-none drop-shadow-sm scale-100 lg:scale-[1.22] xl:scale-[1.30] origin-center lg:origin-right transition-transform duration-300"
                        loading="eager" fetchpriority="high" />
                </div>
            </div>

        </div>
    </section>

    <!-- Partner logos section -->
    <section id="perusahaan"
        class="relative overflow-hidden bg-white pt-2 sm:pt-4 pb-14 sm:pb-20 border-b border-slate-100">
        <div class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px]">
            <!-- Badge -->
            <div class="flex mb-8">
                <span
                    class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-blue-50/90 border border-blue-200/90 uppercase shadow-2xs">
                    Telah Dipercayai Oleh
                </span>
            </div>
        </div>

        <!-- Marquee slider -->
        <div class="relative w-full overflow-hidden">
            <!-- Gradient fade masks -->
            <div
                class="pointer-events-none absolute left-0 top-0 bottom-0 w-16 sm:w-28 md:w-44 bg-gradient-to-r from-white to-transparent z-10">
            </div>
            <div
                class="pointer-events-none absolute right-0 top-0 bottom-0 w-16 sm:w-28 md:w-44 bg-gradient-to-l from-white to-transparent z-10">
            </div>

            <!-- Marquee track -->
            <div class="animate-marquee flex items-center py-2 select-none">
                <!-- Logo track: primary -->
                <div class="flex items-center gap-6 shrink-0 pr-6">
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/daihatsu.svg') }}" alt="DAIHATSU" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="HummaTech" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/favehotel.svg') }}" alt="favehotels" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/garudaspark.svg') }}" alt="GARUDA SPARK" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/japfa.svg') }}" alt="JAPFA" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="Mitra Perusahaan"
                            class="h-full object-contain">
                    </div>
                </div>

                <!-- Logo track: duplicate (for seamless loop) -->
                <div class="flex items-center gap-6 shrink-0 pr-6">
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/daihatsu.svg') }}" alt="DAIHATSU" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/favehotel.svg') }}" alt="HummaTech" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/garudaspark.svg') }}" alt="favehotels" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/japfa.svg') }}" alt="GARUDA SPARK" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/japfa.svg') }}" alt="JAPFA" class="h-full object-contain">
                    </div>

                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="Mitra Perusahaan"
                            class="h-full object-contain">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features section -->
    <section id="features" class="relative w-full bg-[#E9EFFD]/60 py-16 sm:py-20 lg:py-24">
        <div class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px]">
            <!-- Section header -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-14 lg:mb-16">
                <span
                    class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-white/80 border border-blue-200/60 uppercase shadow-2xs">
                    Keunggulan Portal PKL
                </span>

                <h2 class="font-urbanist text-2xl sm:text-3xl lg:text-[36px] font-bold text-[#1E293B] mt-3 sm:mt-4 leading-tight">
                    Solusi Lengkap Kebutuhan Siswa PKL
                </h2>
            </div>

            <!-- Feature cards grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 max-w-5xl mx-auto">
                <!-- Feature: Informasi Terpusat -->
                <div
                    class="bg-white rounded-3xl p-8 sm:p-9 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group border border-slate-100/60">
                    <div
                        class="w-14 h-14 rounded-full bg-[#E9EFFD] text-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-blue-100 group-hover:text-white transition-all duration-300">
                       <img src="{{ asset('assets/image/icon/kacapembesar.svg') }}" alt="kaca pembesar" class="select-none">
                    </div>

                    <h3 class="text-lg sm:text-xl font-bold text-[#1E293B] mb-2.5">
                        Informasi Terpusat
                    </h3>

                    <p class="text-sm text-slate-500 leading-relaxed max-w-[260px]">
                        Temukan peluang PKL tanpa mencari dari banyak sumber.
                    </p>
                </div>

                <!-- Feature: Administrasi Praktis -->
                <div
                    class="bg-white rounded-3xl p-8 sm:p-9 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group border border-slate-100/60">
                    <div
                        class="w-14 h-14 rounded-full bg-[#E9EFFD] text-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-blue-100 group-hover:text-white transition-all duration-300">
                       <img src="{{ asset('assets/image/icon/buku.svg') }}" alt="buku" class="select-none">
                    </div>

                    <h3 class="text-lg sm:text-xl font-bold text-[#1E293B] mb-2.5">
                        Administrasi Praktis
                    </h3>

                    <p class="text-sm text-slate-500 leading-relaxed max-w-[260px]">
                        Kelola pengajuan dan catatan PKL secara digital.
                    </p>
                </div>

                <!-- Feature: Log Aktivitas Online -->
                <div
                    class="bg-white rounded-3xl p-8 sm:p-9 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group border border-slate-100/60">
                    <div
                        class="w-14 h-14 rounded-full bg-[#E9EFFD] text-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-blue-100 group-hover:text-white transition-all duration-300">
                       <img src="{{ asset('assets/image/icon/kontak.svg') }}" alt="kontak" class="select-none">
                    </div>

                    <h3 class="text-lg sm:text-xl font-bold text-[#1E293B] mb-2.5">
                        Log Aktivitas Online
                    </h3>

                    <p class="text-sm text-slate-500 leading-relaxed max-w-[260px]">
                        Absensi dan jurnal harian terdata secara online.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vacancies section -->
    <section id="vacancies" class="relative w-full bg-white py-16 sm:py-20 lg:py-24">
        <!-- Navigation anchor -->
        <div id="lowongan" class="absolute -top-24"></div>

        <!-- Decorative circle: top right -->
        <div
            class="pointer-events-none absolute w-[300px] h-[300px] sm:w-[360px] sm:h-[360px] lg:w-[425px] lg:h-[425px] -top-[50px] sm:-top-[60px] lg:-top-[80px] right-[-100px] sm:right-[-80px] lg:right-[-100px] rounded-full bg-[#DEE8FC]/75 z-0">
        </div>

        <!-- Decorative circle: bottom left (overlaps with ecosystem section below) -->
        <div
            class="pointer-events-none absolute w-[300px] h-[300px] sm:w-[360px] sm:h-[360px] lg:w-[425px] lg:h-[425px] -bottom-[100px] sm:-bottom-[130px] lg:-bottom-[150px] left-[-120px] sm:left-[-100px] lg:left-[-80px] rounded-full bg-[#DEE8FC]/75 z-0">
        </div>

        <!-- Main container -->
        <div class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px] relative z-10">
            @if(session('success'))
                <div class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800 font-bold ml-4 text-lg leading-none cursor-pointer">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-rose-600 hover:text-rose-800 font-bold ml-4 text-lg leading-none cursor-pointer">&times;</button>
                </div>
            @endif

            <!-- Section header -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-8">
                <div>
                    <span
                        class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-blue-50/90 border border-blue-200/70 uppercase shadow-2xs mb-3 sm:mb-4">
                        Katalog Lowongan Terupdate
                    </span>

                    <h2 class="font-urbanist text-2xl sm:text-3xl lg:text-[32px] font-bold text-[#1E293B] leading-tight">
                        Lowongan PKL Populer & Terbaru
                    </h2>
                </div>

                <!-- Action button -->
                <div class="shrink-0">
                    <a href="#lowongan"
                        class="inline-flex items-center gap-2.5 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200 group cursor-pointer">
                        <span>Semua Lowongan ({{ $lowongans->count() }})</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 16 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33337 8H12.6667M12.6667 8L8.66671 4M12.6667 8L8.66671 12" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Search and Filter Form (Backend Logic) -->
            <form action="{{ url('/#lowongan') }}" method="GET" class="mb-10 flex flex-col sm:flex-row items-center gap-3">
                <div class="relative flex-1 w-full">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari posisi, keahlian, kota, atau nama perusahaan..."
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 bg-white text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 shadow-2xs">
                    <svg class="w-4 h-4 absolute left-3.5 top-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <select name="jurusan" onchange="this.form.submit()"
                    class="w-full sm:w-auto px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 shadow-2xs cursor-pointer">
                    <option value="all">Semua Jurusan</option>
                    <option value="RPL" {{ request('jurusan') == 'RPL' ? 'selected' : '' }}>RPL / SIJA</option>
                    <option value="TKJ" {{ request('jurusan') == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                    <option value="DKV" {{ request('jurusan') == 'DKV' ? 'selected' : '' }}>DKV / Animasi</option>
                    <option value="Akuntansi" {{ request('jurusan') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi / Keuangan</option>
                </select>

                <button type="submit"
                    class="w-full sm:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white rounded-xl text-sm font-semibold shadow-xs transition-colors cursor-pointer">
                    Filter
                </button>

                @if(request()->filled('search') || (request()->filled('jurusan') && request('jurusan') !== 'all'))
                    <a href="{{ url('/#lowongan') }}" class="text-xs font-medium text-slate-500 hover:text-rose-600 underline whitespace-nowrap">
                        Reset Filter
                    </a>
                @endif
            </form>

            <!-- Vacancy cards grid (Dinamis dari Database) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @forelse($lowongans as $loker)
                    <div
                        class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-10 h-10 rounded-xl bg-[#DBE1FF] text-blue-600 flex items-center justify-center font-bold text-sm">
                                    <img src="{{ asset($loker->perusahaan->logo ?? 'assets/image/icon/code.svg') }}" alt="icon" class="w-6 h-6 object-contain select-none">
                                </div>

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-slate-500 bg-slate-100">
                                    {{ $loker->tipe_kerja }} • {{ $loker->lokasi }}
                                </span>
                            </div>

                            <h3 class="text-base sm:text-lg font-bold text-[#1E293B] group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
                                {{ $loker->judul }}
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 mb-4">
                                {{ $loker->perusahaan->nama }}
                            </p>

                            <div class="flex flex-wrap items-center gap-2 mb-6">
                                <span class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                                    {{ $loker->jurusan }}
                                </span>
                                @if($loker->keahlian)
                                    <span class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                                        {{ $loker->keahlian }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-1.5 text-xs text-slate-500">
                                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>
                                <span>Sisa Kuota: <strong class="text-slate-700 font-semibold">{{ $loker->sisa_kuota }} Kursi</strong></span>
                            </div>

                            <button type="button"
                                onclick="openDetailModal({{ $loker->id }}, '{{ addslashes($loker->judul) }}', '{{ addslashes($loker->perusahaan->nama) }}', '{{ addslashes($loker->tipe_kerja) }}', '{{ addslashes($loker->lokasi) }}', '{{ addslashes($loker->jurusan) }}', '{{ $loker->sisa_kuota }}', '{{ addslashes($loker->deskripsi) }}', '{{ addslashes($loker->persyaratan) }}')"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-slate-50/70 rounded-3xl border border-dashed border-slate-200">
                        <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-slate-600 font-semibold text-base">Tidak ada lowongan PKL yang sesuai kriteria.</p>
                        <p class="text-slate-400 text-xs mt-1">Coba gunakan kata kunci pencarian lain atau klik tombol reset filter.</p>
                        <a href="{{ url('/#lowongan') }}" class="inline-block mt-4 px-4 py-2 bg-white border border-slate-200 hover:border-blue-400 text-blue-600 text-xs font-semibold rounded-xl shadow-2xs transition">
                            Tampilkan Semua Lowongan
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Ecosystem section -->
    <section id="ekosistem" class="relative w-full py-16 sm:py-20 lg:py-24">
        <!-- Main container -->
        <div class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px] relative z-10">
            <!-- Section header -->
            <div class="text-center max-w-[760px] mx-auto mb-10 lg:mb-12">
                <span
                    class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-[#1F5EFF1A] border border-[#1F5EFF33] uppercase shadow-2xs mb-4">
                    Ekosistem Sinergis
                </span>

                <h2
                    class="font-urbanist text-3xl sm:text-4xl lg:text-[44px] font-bold text-[#1E293B] leading-[1.2] tracking-tight">
                    Solusi Terpadu untuk Tiga Pilar Vokasi
                </h2>

                <p class="text-base sm:text-lg text-slate-500 leading-relaxed mt-4">
                    Menghilangkan sekat komunikasi antara siswa, sekolah, dan mitra PKL
                </p>
            </div>

            <!-- Tab navigation -->
            <div class="flex items-center justify-center mb-10 lg:mb-14">
                <div class="inline-flex p-1.5 rounded-2xl bg-slate-100 border border-slate-200/80 gap-1 sm:gap-1.5">
                    <button type="button" data-tab-target="panel-siswa"
                        class="tab-btn px-5 sm:px-7 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 bg-[#2563EB] text-white shadow-md shadow-blue-500/20 cursor-pointer">
                        Untuk Siswa
                    </button>
                    <button type="button" data-tab-target="panel-sekolah"
                        class="tab-btn px-5 sm:px-7 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-200/60 transition-all duration-200 cursor-pointer">
                        Sekolah & Guru
                    </button>
                    <button type="button" data-tab-target="panel-perusahaan"
                        class="tab-btn px-5 sm:px-7 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-200/60 transition-all duration-200 cursor-pointer">
                        Perusahaan / DUDI
                    </button>
                </div>
            </div>

            <!-- Tab panel: Siswa -->
            <div id="panel-siswa" class="tab-panel transition-all duration-300 opacity-100 translate-y-0">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">
                    <!-- Feature list -->
                    <div class="lg:col-span-6 flex flex-col justify-between gap-4 sm:gap-5">
                        <!-- Feature: Pengajuan Online -->
                        <div
                            class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                            <div
                                class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                                <img src="{{ asset('assets/image/icon/hand.svg') }}" alt="hand_icon"
                                    class="w-5 h-5 select-none">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                    Pengajuan PKL via Online
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                    Kirim portofolio dan surat pengantar sekolah tanpa birokrasi cetak berkas fisik yang
                                    berbelit-belit.
                                </p>
                            </div>
                        </div>

                        <!-- Feature: Jurnal Digital -->
                        <div
                            class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                            <div
                                class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                                <img src="{{ asset('assets/image/icon/jurnal.svg') }}" alt="jurnal_icon"
                                    class="w-5 h-5 select-none">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                    Jurnal Kegiatan Digital
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                    Unggah dokumentasi harian, foto tugas, dan rangkuman logbook langsung dari
                                    smartphone.
                                </p>
                            </div>
                        </div>

                        <!-- Feature: VocatiBot AI -->
                        <div
                            class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                            <div
                                class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                                <img src="{{ asset('assets/image/icon/chatbot.svg') }}" alt="chatbot_icon"
                                    class="w-5 h-5 select-none">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                    VocatiBot (Mentor AI)
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                    Asisten virtual yang siap membimbingmu 24/7 untuk menyusun jurnal harian, dan
                                    konsultasi etika kerja selama PKL.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Media card & testimonial quote -->
                    <div class="lg:col-span-6 flex">
                        <div
                            class="relative w-full min-h-[360px] sm:min-h-[420px] rounded-3xl overflow-hidden bg-gradient-to-br from-slate-100 via-blue-50/40 to-slate-200/70 border border-slate-200/80 p-5 sm:p-7 flex flex-col justify-end shadow-sm group">
                            <img src="{{ asset('assets/image/tumbal.jpeg') }}" alt="Foto Siswa" class="rounded-2xl w-full h-full object-cover absolute top-0 left-0 select-none">
                            <!-- Quote card -->
                            <div
                                class="relative z-10 p-5 sm:p-6 rounded-2xl bg-[#F0F2F4] backdrop-blur-md border border-white/10 shadow-xl transition-all duration-200 group-hover:bg-slate-100">
                                <span
                                    class="text-xs font-bold tracking-wider text-blue-400 uppercase mb-2 block">
                                    Dashboard Siswa
                                </span>
                                <p class="text-sm sm:text-base font-medium text-[#171D1C] leading-relaxed italic">
                                    "Aku diterima magang di unicorn idaman hanya dalam tempo 3 hari setelah apply via
                                    MagangSMK."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Detail & Pengajuan Lamaran PKL -->
    <div id="modal-detail" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden animate-in fade-in zoom-in-95 duration-200">
            <!-- Modal Header -->
            <div class="p-6 sm:p-7 border-b border-slate-100 flex items-start justify-between bg-gradient-to-r from-blue-50/50 to-white">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span id="modal-tipe-lokasi" class="px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                            Hybrid • Jakarta
                        </span>
                        <span id="modal-kuota" class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                            Sisa: 3 Kursi
                        </span>
                    </div>
                    <h3 id="modal-judul" class="text-xl sm:text-2xl font-bold text-slate-900 leading-snug">
                        Frontend Web Developer Intern
                    </h3>
                    <p id="modal-perusahaan" class="text-sm font-medium text-slate-500 mt-1">
                        PT Telkom Vokasi Digital
                    </p>
                </div>
                <button type="button" onclick="closeDetailModal()" class="p-2 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 sm:p-7 max-h-[70vh] overflow-y-auto space-y-6">
                <!-- Info Jurusan -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Jurusan yang Dicari</h4>
                    <p id="modal-jurusan" class="text-sm font-semibold text-slate-800 bg-slate-50 p-3 rounded-xl border border-slate-100">
                        RPL / Multimedia
                    </p>
                </div>

                <!-- Deskripsi Pekerjaan -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Deskripsi Pekerjaan</h4>
                    <p id="modal-deskripsi" class="text-sm text-slate-600 leading-relaxed bg-slate-50/70 p-4 rounded-xl border border-slate-100">
                        -
                    </p>
                </div>

                <!-- Persyaratan -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Kualifikasi / Persyaratan</h4>
                    <p id="modal-persyaratan" class="text-sm text-slate-600 leading-relaxed bg-slate-50/70 p-4 rounded-xl border border-slate-100">
                        -
                    </p>
                </div>

                <!-- Bagian Form Pengajuan PKL Siswa -->
                <div class="pt-6 border-t border-slate-100">
                    <h4 class="text-base font-bold text-slate-900 mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Formulir Pengajuan PKL Siswa
                    </h4>

                    @guest
                        <div class="p-5 rounded-2xl bg-blue-50 border border-blue-100 text-center space-y-3">
                            <p class="text-sm text-slate-600">
                                Anda harus masuk atau mendaftar akun siswa terlebih dahulu untuk mengajukan lamaran ke lowongan ini.
                            </p>
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('login') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl shadow-xs transition-colors">
                                    Login Siswa
                                </a>
                                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-semibold rounded-xl transition-colors">
                                    Daftar Akun
                                </a>
                            </div>
                        </div>
                    @else
                        @if(Auth::user()->hasRole('siswa'))
                            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                <input type="hidden" name="lowongan_id" id="modal-form-lowongan-id" value="">

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-700 mb-1">NISN *</label>
                                        <input type="text" name="nisn" required placeholder="Contoh: 0054321987"
                                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-blue-500">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-700 mb-1">Asal Sekolah *</label>
                                        <input type="text" name="asal_sekolah" required placeholder="Contoh: SMKN 1 Surabaya"
                                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-blue-500">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Jurusan / Kelas *</label>
                                    <input type="text" name="jurusan" required placeholder="Contoh: XII Rekayasa Perangkat Lunak 2"
                                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-blue-500">
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-700 mb-1">Upload CV / Resume (PDF, Max 2MB) *</label>
                                        <input type="file" name="cv_file" required accept=".pdf"
                                            class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-700 mb-1">Surat Pengantar Sekolah (Opsional, PDF)</label>
                                        <input type="file" name="surat_pengantar" accept=".pdf"
                                            class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Catatan / Motivasi untuk Perusahaan</label>
                                    <textarea name="catatan" rows="3" placeholder="Tuliskan alasan atau motivasi Anda memilih tempat PKL ini..."
                                        class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-blue-500"></textarea>
                                </div>

                                <button type="submit"
                                    class="w-full py-3 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-500/20 transition-all duration-200 cursor-pointer">
                                    Kirim Pengajuan Lamaran PKL
                                </button>
                            </form>
                        @else
                            <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-xs">
                                Akun Anda terdaftar sebagai <strong>{{ Auth::user()->getRoleNames()->first() ?? 'User' }}</strong>. Untuk mengajukan lamaran PKL, silakan gunakan akun Siswa.
                            </div>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDetailModal(id, judul, perusahaan, tipe, lokasi, jurusan, kuota, deskripsi, persyaratan) {
            document.getElementById('modal-form-lowongan-id').value = id;
            document.getElementById('modal-judul').textContent = judul;
            document.getElementById('modal-perusahaan').textContent = perusahaan;
            document.getElementById('modal-tipe-lokasi').textContent = tipe + ' • ' + lokasi;
            document.getElementById('modal-kuota').textContent = 'Sisa: ' + kuota + ' Kursi';
            document.getElementById('modal-jurusan').textContent = jurusan;
            document.getElementById('modal-deskripsi').textContent = deskripsi || 'Tidak ada deskripsi khusus.';
            document.getElementById('modal-persyaratan').textContent = persyaratan || 'Tidak ada persyaratan khusus.';

            const modal = document.getElementById('modal-detail');
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeDetailModal() {
            const modal = document.getElementById('modal-detail');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Close on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDetailModal();
            }
        });
    </script>
@endsection
