<!-- Footer Section -->
<footer class="w-full bg-white relative">
    <!-- Main blue footer container -->
    <div
        class="relative w-full bg-[#2563EB] rounded-t-[32px] sm:rounded-t-[40px] lg:rounded-t-[48px] overflow-hidden pt-12 sm:pt-16 lg:pt-[90px] pb-12 sm:pb-16 text-white">
        <!-- Background illustration -->
        <img src="{{ asset('assets/image/component/footer_illus.svg') }}" alt="footer illustration"
            class="pointer-events-none absolute left-0 bottom-0 max-w-none w-[420px] sm:w-[560px] lg:w-[680px] h-auto object-contain select-none z-0 opacity-90 sm:opacity-100"
            loading="lazy" decoding="async">

        <!-- Content container-->
        <div class="w-full max-w-[1294px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="relative mb-12 sm:mb-16 lg:mb-20 scroll-reveal-scale">

                <!-- Card container -->
                <div
                    class="w-full min-h-[220px] lg:h-[244px] rounded-[16px] border-[1.5px] border-white/40 bg-white/10 backdrop-blur-md shadow-2xl flex flex-col md:flex-row md:items-center justify-between px-6 sm:px-10 lg:px-14 py-8 lg:py-0 gap-6">
                    <!-- Heading text -->
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-sm sm:text-base font-medium text-white/90">
                            Siap magang? Yuk, mulai dari Portal PKL
                        </p>
                        <h2
                            class="font-urbanist text-2xl sm:text-3xl lg:text-[36px] xl:text-[40px] font-bold text-white tracking-tight leading-tight">
                            Temukan Tempat PKL-mu Sekarang
                        </h2>
                    </div>

                    <!-- Action buttons -->
                    <div
                        class="flex flex-col sm:flex-row md:flex-col gap-3 shrink-0 w-full sm:w-auto md:w-[170px] lg:w-[184px]">
                        <a href="{{ route('login') }}"
                            class="w-full py-3 px-6 rounded-xl bg-[#2159D4] hover:bg-[#0051ff] active:bg-[#2159D4] text-white font-bold text-xl text-center shadow-md shadow-[#4F11F0]/30 hover:shadow-lg transition-all duration-200">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}"
                            class="w-full py-3 px-6 rounded-xl bg-white hover:bg-slate-300 active:bg-slate-200 text-[#1E293B] font-bold text-xl text-center shadow-sm hover:shadow transition-all duration-200">
                            Daftar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Links & social media section -->
            <div class="flex flex-col md:flex-row items-start justify-between gap-10 scroll-reveal delay-100">
                <!-- Social media column (Left) -->
                <div class="shrink-0">
                    <h3 class="font-bold text-base sm:text-lg text-white mb-4">
                        Social Media
                    </h3>
                    <div class="flex items-center gap-3">
                        <!-- Instagram -->
                        <a href="#" aria-label="Instagram"
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center text-[#2563EB] hover:bg-blue-50 hover:scale-105 active:scale-95 transition-all duration-200 shadow-xs">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>

                        <!-- LinkedIn -->
                        <a href="#" aria-label="LinkedIn"
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center text-[#2563EB] hover:bg-blue-50 hover:scale-105 active:scale-95 transition-all duration-200 shadow-xs">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>

                        <!-- Twitter / X -->
                        <a href="#" aria-label="Twitter"
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center text-[#2563EB] hover:bg-blue-50 hover:scale-105 active:scale-95 transition-all duration-200 shadow-xs">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation columns -->
                <div class="flex flex-wrap sm:flex-nowrap gap-10 sm:gap-14 lg:gap-16 xl:gap-20">
                    <!-- Column: Platform -->
                    <div>
                        <h3 class="font-bold text-sm sm:text-base text-white mb-3 sm:mb-4 tracking-wide">
                            Platform
                        </h3>
                        <ul class="space-y-2 sm:space-y-2.5">
                            <li>
                                <a href="{{ url('/') }}"
                                    class="text-xs sm:text-sm text-white/80 hover:text-white transition-colors">
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a href="#lowongan"
                                    class="text-xs sm:text-sm text-white/80 hover:text-white transition-colors">
                                    Lowongan PKL
                                </a>
                            </li>
                            <li>
                                <a href="#perusahaan"
                                    class="text-xs sm:text-sm text-white/80 hover:text-white transition-colors">
                                    Perusahaan
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Column: Portal PKL -->
                    <div>
                        <h3 class="font-bold text-sm sm:text-base text-white mb-3 sm:mb-4 tracking-wide">
                            Portal PKL
                        </h3>
                        <ul class="space-y-2 sm:space-y-2.5">
                            <li>
                                <a href="#tentang-kami"
                                    class="text-xs sm:text-sm text-white/80 hover:text-white transition-colors">
                                    Tentang Kami
                                </a>
                            </li>
                            <li>
                                <a href="#ekosistem"
                                    class="text-xs sm:text-sm text-white/80 hover:text-white transition-colors">
                                    Cara Kerja
                                </a>
                            </li>
                            <li>
                                <a href="#perusahaan"
                                    class="text-xs sm:text-sm text-white/80 hover:text-white transition-colors">
                                    Kemitraan
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Column: Resources -->
                    <div>
                        <h3 class="font-bold text-sm sm:text-base text-white mb-3 sm:mb-4 tracking-wide">
                            Resources
                        </h3>
                        <ul class="space-y-2 sm:space-y-2.5">
                            <li>
                                <a href="#"
                                    class="text-xs sm:text-sm text-white/80 hover:text-white transition-colors">
                                    Galeri
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-xs sm:text-sm text-white/80 hover:text-white transition-colors">
                                    FAQ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright bottom bar -->
    <div class="w-full bg-white py-4 sm:py-5 border-t border-slate-100">
        <div class="w-full max-w-[1294px] mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-xs sm:text-sm text-[#1E4FBC] text-center sm:text-left">
                &copy; 2026 Portal PKL All rights reserved &middot; Made by rplsmkantartika1
            </p>
        </div>
    </div>
</footer>
