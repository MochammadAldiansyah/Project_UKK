@extends('landing.layouts.app')

@section('content')
   <!-- Hero Section -->
<section id="hero" class="relative overflow-hidden bg-white pt-[21px] pb-12 lg:pb-16">
    <!-- Container: 1280px x 594px according to Figma specification -->
    <div class="w-full max-w-[1280px] min-h-[594px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center justify-between gap-10 lg:gap-6">

        <!-- Text Left Column (#text-left) -->
        <div class="w-full lg:max-w-[580px] flex flex-col justify-center text-left z-10 py-4 lg:py-0">
            <!-- Title & Body (#title & body) -->
            <div class="space-y-6">
                <!-- Heading -->
                <h1 class="text-4xl sm:text-5xl lg:text-[54px] font-extrabold text-slate-900 leading-[1.16] tracking-tight">
                    Temukan tempat PKL impianmu dalam satu platform.
                </h1>

                <!-- Body / Subtitle -->
                <p class="text-base sm:text-lg text-slate-500 leading-relaxed max-w-[490px]">
                    Temukan tempat PKL yang sesuai dengan jurusanmu, ajukan secara online, dan kelola kegiatan PKL dalam satu platform.
                </p>
            </div>

            <!-- CTA Button (_CTA) -->
            <div class="mt-8 sm:mt-9">
                <a
                    href="#lowongan"
                    class="inline-flex items-center gap-3 px-7 py-3.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-medium text-base rounded-xl shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200 group cursor-pointer"
                >
                    <span>Cari Lowongan PKL</span>
                    <svg
                        class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M3.33337 8H12.6667M12.6667 8L8.66671 4M12.6667 8L8.66671 12"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Right Illustration Column (Illus) -->
        <div class="w-full lg:w-auto flex-1 flex items-center justify-center lg:justify-end">
            <div class="relative w-full max-w-[540px] lg:max-w-[664px]">
                <img
                    src="{{ asset('assets/image/hero.svg') }}"
                    alt="Ilustrasi Siswa PKL dalam satu platform"
                    width="664"
                    height="594"
                    class="w-full h-auto max-h-[594px] object-contain select-none pointer-events-none drop-shadow-sm"
                    loading="eager"
                    fetchpriority="high"
                />
            </div>
        </div>

    </div>
</section>

@endsection
