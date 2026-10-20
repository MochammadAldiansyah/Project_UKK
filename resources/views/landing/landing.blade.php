@extends('landing.layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="relative overflow-hidden bg-white pt-[21px] pb-12 lg:pb-16">
        <!-- Container: 1280px x 594px according to Figma specification -->
        <div
            class="w-full max-w-[1280px] min-h-[594px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center justify-between gap-10 lg:gap-6">

            <!-- Text Left Column (#text-left) -->
            <div class="w-full lg:max-w-[703px] flex flex-col justify-center text-left z-10 py-4 lg:py-0">
                <!-- Title & Body (#title & body) -->
                <div class="space-y-6">
                    <!-- Heading (Sesuai Figma: Urbanist ExtraBold 800, Size 56px, Line height 120%, Color #333333, Max-Width 703px) -->
                    <h1
                        class="font-urbanist text-4xl sm:text-5xl lg:text-[56px] font-extrabold text-[#333333] leading-[1.2] tracking-normal max-w-[703px]">
                        Temukan tempat PKL impianmu dalam satu platform.
                    </h1>

                    <!-- Body / Subtitle -->
                    <p class="text-base sm:text-lg text-slate-500 leading-relaxed max-w-[490px]">
                        Temukan tempat PKL yang sesuai dengan jurusanmu, ajukan secara online, dan kelola kegiatan PKL dalam
                        satu platform.
                    </p>
                </div>

                <!-- CTA Button (_CTA) -->
                <div class="mt-8 sm:mt-9">
                    <a href="#lowongan"
                        class="inline-flex items-center gap-3 px-7 py-3.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-medium text-base rounded-xl shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200 group cursor-pointer">
                        <span>Cari Lowongan PKL</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 16 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33337 8H12.6667M12.6667 8L8.66671 4M12.6667 8L8.66671 12" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Illustration Column (Illus) -->
            <div class="w-full lg:w-auto flex-1 flex items-center justify-center lg:justify-end">
                <div class="relative w-full max-w-[540px] lg:max-w-[664px]">
                    <img src="{{ asset('assets/image/hero.svg') }}" alt="Ilustrasi Siswa PKL dalam satu platform"
                        width="664" height="594"
                        class="w-full h-auto max-h-[594px] object-contain select-none pointer-events-none drop-shadow-sm"
                        loading="eager" fetchpriority="high" />
                </div>
            </div>

        </div>
    </section>

    <!-- Section: Telah Dipercayai Oleh (Brand Perusahaan Mitra) -->
    <section id="perusahaan" class="relative overflow-hidden bg-white py-10 sm:py-14 border-b border-slate-100">
        <div class="w-full max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
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
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="DAIHATSU" class="h-full object-contain">
                    </div>

                    <!-- Card: HummaTech -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="HummaTech" class="h-full object-contain">
                    </div>

                    <!-- Card: favehotels -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="favehotels" class="h-full object-contain">
                    </div>

                    <!-- Card: GARUDA SPARK -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="GARUDA SPARK" class="h-full object-contain">
                    </div>

                    <!-- Card: JAPFA -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="JAPFA" class="h-full object-contain">
                    </div>

                    <!-- Card: Mitra Perusahaan -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="Mitra Perusahaan"
                            class="h-full object-contain">
                    </div>
                </div>

                <!-- Set 2 (Duplikasi untuk efek infinite scroll tanpa putus) -->
                <div class="flex items-center gap-6 shrink-0 pr-6">
                    <!-- Card: DAIHATSU -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="DAIHATSU" class="h-full object-contain">
                    </div>

                    <!-- Card: HummaTech -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="HummaTech" class="h-full object-contain">
                    </div>

                    <!-- Card: favehotels -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="favehotels" class="h-full object-contain">
                    </div>

                    <!-- Card: GARUDA SPARK -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="GARUDA SPARK" class="h-full object-contain">
                    </div>

                    <!-- Card: JAPFA -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="JAPFA" class="h-full object-contain">
                    </div>

                    <!-- Card: Mitra Perusahaan -->
                    <div
                        class="w-[225px] h-[123px] px-6 py-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-center justify-center shrink-0 group/card cursor-pointer">
                        <img src="{{ asset('assets/image/dummy.png') }}" alt="Mitra Perusahaan"
                            class="h-full object-contain">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
