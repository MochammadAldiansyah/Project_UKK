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
        <!-- Section header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-10 sm:mb-12">
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
                    <span>Lihat Semua Lowongan</span>
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1"
                        viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.33337 8H12.6667M12.6667 8L8.66671 4M12.6667 8L8.66671 12" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Vacancy cards grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- Card: Frontend Web Developer -->
            <div
                class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#DBE1FF] text-blue-600 flex items-center justify-center font-bold text-sm">
                            <img src="{{ asset('assets/image/icon/vacancy-engineering.svg') }}"
                                alt="Frontend Web Developer" class="select-none">
                        </div>

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-slate-500 bg-slate-100">
                            Hybrid • Jakarta
                        </span>
                    </div>

                    <h3
                        class="text-base sm:text-lg font-bold text-[#1E293B] group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
                        Frontend Web Developer Intern
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-500 mb-4">
                        PT Telkom Vokasi Digital
                    </p>

                    <div class="flex flex-wrap items-center gap-2 mb-6">
                        <span
                            class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                            RPL / Multimedia
                        </span>
                        <span
                            class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                            Tailwind & JS
                        </span>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-1.5 text-xs text-slate-500">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span>Sisa Kuota: <strong class="text-slate-700 font-semibold">3 Kursi</strong></span>
                    </div>

                    <button type="button"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                        Lihat Detail
                    </button>
                </div>
            </div>

            <!-- Card: Multimedia Content Creator -->
            <div
                class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#FFEEDF] text-orange-500 flex items-center justify-center">
                            <img src="{{ asset('assets/image/icon/vacancy-multimedia.svg') }}"
                                alt="Multimedia Content Creator" class="select-none">
                        </div>

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-slate-500 bg-slate-100">
                            WFO • Jakarta
                        </span>
                    </div>

                    <h3
                        class="text-base sm:text-lg font-bold text-[#1E293B] group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
                        Multimedia Content Creator
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-500 mb-4">
                        Exo Studio Kreatif
                    </p>

                    <div class="flex flex-wrap items-center gap-2 mb-6">
                        <span
                            class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                            DKV / Animasi
                        </span>
                        <span
                            class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                            Premiere & Figma
                        </span>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-1.5 text-xs text-slate-500">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span>Sisa Kuota: <strong class="text-slate-700 font-semibold">2 Kursi</strong></span>
                    </div>

                    <button type="button"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                        Lihat Detail
                    </button>
                </div>
            </div>

            <!-- Card: Staff Administrasi & Akuntansi -->
            <div
                class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200 flex flex-col justify-between group cursor-pointer">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#CCFFD9] text-emerald-600 flex items-center justify-center">
                            <img src="{{ asset('assets/image/icon/vacancy-accounting.svg') }}"
                                alt="Staff Administrasi & Akuntansi" class="select-none">
                        </div>

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-slate-500 bg-slate-100">
                            WFO • Surabaya
                        </span>
                    </div>

                    <h3
                        class="text-base sm:text-lg font-bold text-[#1E293B] group-hover:text-blue-600 transition-colors line-clamp-1 mb-1">
                        Staff Administrasi & Akuntansi
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-500 mb-4">
                        Bank Antartika Jaya
                    </p>

                    <div class="flex flex-wrap items-center gap-2 mb-6">
                        <span
                            class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                            Akuntansi / AKL
                        </span>
                        <span
                            class="px-2.5 py-1 rounded-md text-xs font-medium text-slate-600 bg-slate-100 border border-slate-200/60">
                            Spreadsheet
                        </span>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-1.5 text-xs text-slate-500">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span>Sisa Kuota: <strong class="text-slate-700 font-semibold">5 Kursi</strong></span>
                    </div>

                    <button type="button"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
