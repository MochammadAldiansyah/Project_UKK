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
            <div
                class="relative w-full max-w-[500px] sm:max-w-[700px] lg:max-w-none lg:w-[480px] xl:w-[350px] 2xl:w-[370px] flex items-center justify-center lg:justify-end">
                <img src="{{ asset('assets/image/hero-illustration.svg') }}"
                    alt="Ilustrasi Siswa PKL dalam satu platform" width="664" height="594"
                    class="w-full h-auto max-h-[580px] lg:max-h-[640px] object-contain select-none pointer-events-none drop-shadow-sm scale-100 lg:scale-[1.22] xl:scale-[1.30] origin-center lg:origin-right transition-transform duration-300"
                    loading="eager" fetchpriority="high" />
            </div>
        </div>

    </div>
</section>
