@extends('landing.layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="relative overflow-hidden bg-white pt-10 lg:pt-[121px] pb-12 lg:pb-[118px]">
        <!-- Circle Kuning (Sesuai Pallet Figma Foto 1: Width 317px, Height 317px, Top dinaikkan ke 80px, Left -109px, Radius 9999px, #F9BD22 20%, Layer Blur 64) -->
        <div
            class="hero-circle-yellow pointer-events-none absolute w-[317px] h-[317px] top-[80px] left-[-109px] rounded-full bg-[#F9BD22]/20 blur-[64px] z-0">
        </div>

        <!-- Circle Biru / Gradasi Pojok Kanan Atas (Dibuat Lebih Lebar & Jelas Terlihat: Width 650px, Height 650px, Top -140px, Right -100px, Blur 80px) -->
        <div
            class="hero-circle-blue pointer-events-none absolute w-[550px] h-[550px] lg:w-[650px] lg:h-[650px] -top-[140px] right-[-100px] rounded-full bg-[#C7DCFE]/70 blur-[80px] z-0">
        </div>

        <!-- Container: Sesuai spesifikasi Figma (Frame 1512px, Container 1280px, Left Gap 117px, Right Gap 115px) -->
        <div
            class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px] flex flex-col lg:flex-row items-center justify-between gap-10 lg:gap-8 relative z-10">

            <!-- Text Left Column (#text-left: Sesuai Figma, fleksibel agar proporsional dan tidak memakan ruang gambar) -->
            <div
                class="w-full lg:w-auto lg:max-w-[540px] xl:max-w-[620px] 2xl:max-w-[703px] lg:h-[351px] flex flex-col justify-between text-left z-10 py-2 lg:py-0 shrink-0">
                <!-- Title & Body (#title & body) -->
                <div class="space-y-4 sm:space-y-6">
                    <h1
                        class="font-urbanist text-4xl sm:text-[56px] lg:text-[56px] font-bold text-[#333333] leading-[1.2] tracking-normal max-w-[703px]">
                        Temukan tempat PKL impianmu dalam satu platform.
                    </h1>

                    <!-- Body / Subtitle -->
                    <p class="text-base sm:text-lg text-slate-500 leading-relaxed max-w-[490px]">
                        Temukan tempat PKL yang sesuai dengan jurusanmu, ajukan secara online, dan kelola kegiatan PKL dalam
                        satu platform.
                    </p>
                </div>

                <!-- CTA Button (_CTA) -->
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

            <!-- Right Illustration Column (Illus - Dibuat Besar, Proporsional, dan Dominan di Mac/Desktop) -->
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

    <!-- Section: Telah Dipercayai Oleh (Brand Perusahaan Mitra) -->
    <section id="perusahaan"
        class="relative overflow-hidden bg-white pt-2 sm:pt-4 pb-14 sm:pb-20 border-b border-slate-100">
        <div class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px]">
            <!-- Badge / Label: TELAH DIPERCAYAI OLEH -->
            <div class="flex mb-8">
                <span
                    class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-blue-50/90 border border-blue-200/90 uppercase shadow-2xs">
                    Telah Dipercayai Oleh
                </span>
            </div>
        </div>

        <!-- Container Marquee Slider -->
        <div class="relative w-full overflow-hidden">
            <!-- Efek Fade Gradasi Sisi Kiri -->
            <div
                class="pointer-events-none absolute left-0 top-0 bottom-0 w-16 sm:w-28 md:w-44 bg-gradient-to-r from-white to-transparent z-10">
            </div>

            <!-- Efek Fade Gradasi Sisi Kanan -->
            <div
                class="pointer-events-none absolute right-0 top-0 bottom-0 w-16 sm:w-28 md:w-44 bg-gradient-to-l from-white to-transparent z-10">
            </div>

            <!-- Track Animasi Marquee (Class animate-marquee didefinisikan di public/assets/css/style.css) -->
            <div class="animate-marquee flex items-center py-2 select-none">
                <!-- Set 1 -->
                <div class="flex items-center gap-6 shrink-0 pr-6">
                    <!-- Card: DAIHATSU -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/daihatsu.svg') }}" alt="DAIHATSU" class="h-full object-contain">
                    </div>

                    <!-- Card: HummaTech -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="HummaTech" class="h-full object-contain">
                    </div>

                    <!-- Card: favehotels -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/favehotel.svg') }}" alt="favehotels" class="h-full object-contain">
                    </div>

                    <!-- Card: GARUDA SPARK -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/garudaspark.svg') }}" alt="GARUDA SPARK" class="h-full object-contain">
                    </div>

                    <!-- Card: JAPFA -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/japfa.svg') }}" alt="JAPFA" class="h-full object-contain">
                    </div>

                    <!-- Card: Mitra Perusahaan -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="Mitra Perusahaan"
                            class="h-full object-contain">
                    </div>
                </div>

                <!-- Set 2 (Duplikasi untuk efek infinite scroll tanpa putus) -->
                <div class="flex items-center gap-6 shrink-0 pr-6">
                    <!-- Card: DAIHATSU -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/daihatsu.svg') }}" alt="DAIHATSU" class="h-full object-contain">
                    </div>

                    <!-- Card: HummaTech -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/favehotel.svg') }}" alt="HummaTech" class="h-full object-contain">
                    </div>

                    <!-- Card: favehotels -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/garudaspark.svg') }}" alt="favehotels" class="h-full object-contain">
                    </div>

                    <!-- Card: GARUDA SPARK -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/japfa.svg') }}" alt="GARUDA SPARK" class="h-full object-contain">
                    </div>

                    <!-- Card: JAPFA -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/japfa.svg') }}" alt="JAPFA" class="h-full object-contain">
                    </div>

                    <!-- Card: Mitra Perusahaan -->
                    <div
                        class="w-[237px] h-[97px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="Mitra Perusahaan"
                            class="h-full object-contain">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section (Keunggulan Portal PKL) -->
    <section id="features" class="relative w-full bg-[#E9EFFD]/60 py-16 sm:py-20 lg:py-24">
        <div class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px]">
            <!-- Header Section (Badge & Title) -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-14 lg:mb-16">
                <!-- Badge: KEUNGGULAN PORTAL PKL -->
                <span
                    class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-white/80 border border-blue-200/60 uppercase shadow-2xs">
                    Keunggulan Portal PKL
                </span>

                <!-- Section Heading -->
                <h2 class="font-urbanist text-2xl sm:text-3xl lg:text-[36px] font-bold text-[#1E293B] mt-3 sm:mt-4 leading-tight">
                    Solusi Lengkap Kebutuhan Siswa PKL
                </h2>
            </div>

            <!-- Features Grid (3 Cards) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 max-w-5xl mx-auto">
                <!-- Card 1: Informasi Terpusat -->
                <div
                    class="bg-white rounded-3xl p-8 sm:p-9 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group border border-slate-100/60">
                    <!-- Icon Container -->
                    <div
                        class="w-14 h-14 rounded-full bg-[#E9EFFD] text-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-blue-100 group-hover:text-white transition-all duration-300">
                       <img src="{{ asset('assets/image/icon/kacapembesar.svg') }}" alt="kaca pembesar" class="select-none">
                    </div>

                    <!-- Title -->
                    <h3 class="text-lg sm:text-xl font-bold text-[#1E293B] mb-2.5">
                        Informasi Terpusat
                    </h3>

                    <!-- Description -->
                    <p class="text-sm text-slate-500 leading-relaxed max-w-[260px]">
                        Temukan peluang PKL tanpa mencari dari banyak sumber.
                    </p>
                </div>

                <!-- Card 2: Administrasi Praktis -->
                <div
                    class="bg-white rounded-3xl p-8 sm:p-9 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group border border-slate-100/60">
                    <!-- Icon Container -->
                    <div
                        class="w-14 h-14 rounded-full bg-[#E9EFFD] text-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-blue-100 group-hover:text-white transition-all duration-300">
                       <img src="{{ asset('assets/image/icon/buku.svg') }}" alt="buku" class="select-none">
                    </div>

                    <!-- Title -->
                    <h3 class="text-lg sm:text-xl font-bold text-[#1E293B] mb-2.5">
                        Administrasi Praktis
                    </h3>

                    <!-- Description -->
                    <p class="text-sm text-slate-500 leading-relaxed max-w-[260px]">
                        Kelola pengajuan dan catatan PKL secara digital.
                    </p>
                </div>

                <!-- Card 3: Log Aktivitas Online -->
                <div
                    class="bg-white rounded-3xl p-8 sm:p-9 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group border border-slate-100/60">
                    <!-- Icon Container -->
                    <div
                        class="w-14 h-14 rounded-full bg-[#E9EFFD] text-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-blue-100 group-hover:text-white transition-all duration-300">
                       <img src="{{ asset('assets/image/icon/kontak.svg') }}" alt="kontak" class="select-none">
                    </div>

                    <!-- Title -->
                    <h3 class="text-lg sm:text-xl font-bold text-[#1E293B] mb-2.5">
                        Log Aktivitas Online
                    </h3>

                    <!-- Description -->
                    <p class="text-sm text-slate-500 leading-relaxed max-w-[260px]">
                        Absensi dan jurnal harian terdata secara online.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vacancies Section (Katalog Lowongan PKL Populer & Terbaru) -->
    <section id="vacancies" class="relative w-full bg-white py-16 sm:py-20 lg:py-24">
        <!-- Anchor link untuk navigasi navbar & button hero -->
        <div id="lowongan" class="absolute -top-24"></div>

        <!-- Dekorasi Circle Biru Kanan Atas (Manual Sesuai Pallet Figma: Width 425px, Height 425px, #DEE8FC 75%, masuk ke section keunggulan portal PKL sedikit) -->
        <div
            class="pointer-events-none absolute w-[300px] h-[300px] sm:w-[360px] sm:h-[360px] lg:w-[425px] lg:h-[425px] -top-[50px] sm:-top-[60px] lg:-top-[80px] right-[-100px] sm:right-[-80px] lg:right-[-100px] rounded-full bg-[#DEE8FC]/75 z-0">
        </div>

        <!-- Dekorasi Circle Biru Kiri Bawah (Manual Sesuai Pallet Figma: Width 425px, Height 425px, #DEE8FC 75%) -->
        <div
            class="pointer-events-none absolute w-[300px] h-[300px] sm:w-[360px] sm:h-[360px] lg:w-[425px] lg:h-[425px] -bottom-[100px] sm:-bottom-[130px] lg:-bottom-[150px] left-[-120px] sm:left-[-100px] lg:left-[-80px] rounded-full bg-[#DEE8FC]/75 z-0">
        </div>

        <!-- Container -->
        <div class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px] relative z-10">
            <!-- Header (Badge, Title, and Action Button) -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-10 sm:mb-12">
                <!-- Left Column: Badge & Title -->
                <div>
                    <!-- Badge: KATALOG LOWONGAN TERUPDATE -->
                    <span
                        class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-blue-50/90 border border-blue-200/70 uppercase shadow-2xs mb-3 sm:mb-4">
                        Katalog Lowongan Terupdate
                    </span>

                    <!-- Section Title -->
                    <h2 class="font-urbanist text-2xl sm:text-3xl lg:text-[32px] font-bold text-[#1E293B] leading-tight">
                        Lowongan PKL Populer & Terbaru
                    </h2>
                </div>

                <!-- Right Column: CTA "Lihat Semua Lowongan" -->
                <div class="shrink-0">
                    <a href="#lowongan"
                        class="inline-flex items-center gap-2.5 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200 group cursor-pointer">
                        <span>Lihat Semua Lowongan</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 16 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33337 8H12.6667M12.6667 8L8.66671 4M12.6667 8L8.66671 12" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Cards Grid (3 Cards Sesuai Spesifikasi Figma: Width 368px Fill, Height 268px, Radius 16px, Border 1px) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Card 1: Frontend Web Developer Intern -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                    <!-- Top Row: Icon & Work Mode Badge -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <!-- Icon Code -->
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-sm">
                               <img src="{{ asset('assets/image/icon/code.svg') }}" alt="">
                            </div>

                            <!-- Location / Mode Badge -->
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-slate-500 bg-slate-100">
                                Hybrid • Jakarta
                            </span>
                        </div>

                        <!-- Job Title & Company -->
                        <h3 class="text-base sm:text-lg font-bold text-[#1E293B] group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
                            Frontend Web Developer Intern
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-500 mb-4">
                            PT Telkom Vokasi Digital
                        </p>

                        <!-- Skill Tags -->
                        <div class="flex flex-wrap items-center gap-2 mb-6">
                            <span class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                                RPL / Multimedia
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                                Tailwind & JS
                            </span>
                        </div>
                    </div>

                    <!-- Bottom Row: Sisa Kuota & Button -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <!-- Quota -->
                        <div class="flex items-center gap-1.5 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            <span>Sisa Kuota: <strong class="text-slate-700 font-semibold">3 Kursi</strong></span>
                        </div>

                        <!-- Action Button -->
                        <button type="button"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                            Lihat Detail
                        </button>
                    </div>
                </div>

                <!-- Card 2: Multimedia Content Creator -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                    <!-- Top Row: Icon & Work Mode Badge -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <!-- Icon Palette / Design -->
                            <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center">
                                <img src="{{ asset('assets/image/icon/pallet.svg') }}" alt="">
                            </div>

                            <!-- Location / Mode Badge -->
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-slate-500 bg-slate-100">
                                WFO • Jakarta
                            </span>
                        </div>

                        <!-- Job Title & Company -->
                        <h3 class="text-base sm:text-lg font-bold text-[#1E293B] group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
                            Multimedia Content Creator
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-500 mb-4">
                            Exo Studio Kreatif
                        </p>

                        <!-- Skill Tags -->
                        <div class="flex flex-wrap items-center gap-2 mb-6">
                            <span class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                                DKV / Animasi
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                                Premiere & Figma
                            </span>
                        </div>
                    </div>

                    <!-- Bottom Row: Sisa Kuota & Button -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <!-- Quota -->
                        <div class="flex items-center gap-1.5 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            <span>Sisa Kuota: <strong class="text-slate-700 font-semibold">2 Kursi</strong></span>
                        </div>

                        <!-- Action Button -->
                        <button type="button"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                            Lihat Detail
                        </button>
                    </div>
                </div>

                <!-- Card 3: Staff Administrasi & Akuntansi -->
                <div
                    class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                    <!-- Top Row: Icon & Work Mode Badge -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <!-- Icon Calculator / Accounting -->
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                <img src="{{ asset('assets/image/icon/money.svg') }}" alt="">
                            </div>

                            <!-- Location / Mode Badge -->
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-slate-500 bg-slate-100">
                                WFO • Surabaya
                            </span>
                        </div>

                        <!-- Job Title & Company -->
                        <h3 class="text-base sm:text-lg font-bold text-[#1E293B] group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
                            Staff Administrasi & Akuntansi
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-500 mb-4">
                            Bank Antartika Jaya
                        </p>

                        <!-- Skill Tags -->
                        <div class="flex flex-wrap items-center gap-2 mb-6">
                            <span class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                                Akuntansi / AKL
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                                Spreadsheet
                            </span>
                        </div>
                    </div>

                    <!-- Bottom Row: Sisa Kuota & Button -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <!-- Quota -->
                        <div class="flex items-center gap-1.5 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            <span>Sisa Kuota: <strong class="text-slate-700 font-semibold">5 Kursi</strong></span>
                        </div>

                        <!-- Action Button -->
                        <button type="button"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
