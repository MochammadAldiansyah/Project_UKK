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
                    <!-- Heading (Sesuai Figma: Urbanist ExtraBold 800, Size 56px, Line height 120%, Color #333333) -->
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
                <div class="relative w-full max-w-[500px] sm:max-w-[540px] lg:max-w-none lg:w-[480px] xl:w-[540px] 2xl:w-[620px] flex items-center justify-center lg:justify-end">
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
                    class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-blue-50/90 border border-blue-200/70 uppercase shadow-2xs">
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
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="DAIHATSU" class="h-full object-contain">
                    </div>

                    <!-- Card: HummaTech -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="HummaTech" class="h-full object-contain">
                    </div>

                    <!-- Card: favehotels -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="favehotels" class="h-full object-contain">
                    </div>

                    <!-- Card: GARUDA SPARK -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="GARUDA SPARK" class="h-full object-contain">
                    </div>

                    <!-- Card: JAPFA -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="JAPFA" class="h-full object-contain">
                    </div>

                    <!-- Card: Mitra Perusahaan -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="Mitra Perusahaan"
                            class="h-full object-contain">
                    </div>
                </div>

                <!-- Set 2 (Duplikasi untuk efek infinite scroll tanpa putus) -->
                <div class="flex items-center gap-6 shrink-0 pr-6">
                    <!-- Card: DAIHATSU -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="DAIHATSU" class="h-full object-contain">
                    </div>

                    <!-- Card: HummaTech -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="HummaTech" class="h-full object-contain">
                    </div>

                    <!-- Card: favehotels -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="favehotels" class="h-full object-contain">
                    </div>

                    <!-- Card: GARUDA SPARK -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="GARUDA SPARK" class="h-full object-contain">
                    </div>

                    <!-- Card: JAPFA -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="JAPFA" class="h-full object-contain">
                    </div>

                    <!-- Card: Mitra Perusahaan -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/hummatech.svg') }}" alt="Mitra Perusahaan"
                            class="h-full object-contain">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
