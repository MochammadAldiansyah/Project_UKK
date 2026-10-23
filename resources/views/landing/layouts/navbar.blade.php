<header id="main-header" class="w-full bg-transparent sticky top-0 z-50">

    <!-- Navbar Container (Animasi smooth menjadi floating pill saat scroll) -->
    <div id="navbar-container" class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px]">
        <div id="navbar-inner" class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                <img src="{{ asset('assets/image/Logo.png') }}" alt="logo">
            </a>
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}"
                    class="text-sm font-semibold text-slate-900 hover:text-blue-600 transition-colors">Beranda</a>
                <a href="#lowongan"
                    class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Lowongan PKL</a>
                <a href="#perusahaan"
                    class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Perusahaan</a>
                <a href="#tentang-kami"
                    class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Tentang Kami</a>
            </nav>

            <!-- Action Buttons -->
            <div class="hidden md:flex items-center gap-4">

                <a href="{{ route('register') }}"
                    class="text-sm font-semibold text-[#2563EB]  bg-[#F5F3FF] rounded-lg hover:text-blue-600 transition-colors px-3 py-2">
                    Daftar
                </a>

                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm hover:shadow transition-all duration-200">
                    Login
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex md:hidden">
                <button id="mobile-menu-btn" type="button"
                    class="relative w-10 h-10 flex items-center justify-center rounded-xl text-slate-700 hover:text-slate-900 hover:bg-slate-100/80 active:scale-95 transition-all duration-200 focus:outline-none"
                    aria-label="Toggle Menu" aria-expanded="false">
                    <!-- Icon burger -->
                    <svg id="icon-burger" class="w-6 h-6 absolute transition-all duration-300 transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon close (silang) -->
                    <svg id="icon-close"
                        class="w-6 h-6 absolute opacity-0 scale-75 rotate-90 transition-all duration-300 transform pointer-events-none"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu Wrapper (Smooth Morphing Dropdown saat Scroll) -->
    <div id="mobile-menu-wrapper" class="md:hidden">
        <div id="mobile-menu" class="px-5 pt-3 pb-6 space-y-1.5">
            <a href="{{ url('/') }}"
                class="menu-item block px-4 py-2.5 rounded-xl text-base font-semibold text-blue-600 bg-blue-50/80 transition-colors">
                Beranda
            </a>
            <a href="#lowongan"
                class="menu-item block px-4 py-2.5 rounded-xl text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">
                Lowongan PKL
            </a>
            <a href="#perusahaan"
                class="menu-item block px-4 py-2.5 rounded-xl text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">
                Perusahaan
            </a>
            <a href="#tentang-kami"
                class="menu-item block px-4 py-2.5 rounded-xl text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">
                Tentang Kami
            </a>

            <div class="menu-item pt-4 border-t border-slate-100/80 flex flex-col gap-2.5">
                <a href="{{ route('register') }}"
                    class="w-full text-center py-2.5 text-sm font-semibold text-[#2563EB] hover:bg-blue-50 rounded-xl border border-blue-200/60 bg-[#F5F3FF] transition-colors">
                    Daftar
                </a>

                <a href="{{ route('login') }}"
                    class="w-full text-center py-2.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-sm font-semibold rounded-xl shadow-md shadow-blue-500/20 transition-all duration-200">
                    Login
                </a>
            </div>
        </div>
    </div>
</header>
