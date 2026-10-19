<header class="w-full bg-white border-b border-slate-100 sticky top-0 z-50 transition-all duration-200" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2 group">
               <img src="{{ asset('assets/image/Logo.png') }}" alt="logo">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}" class="text-sm font-semibold text-slate-900 hover:text-blue-600 transition-colors">Beranda</a>
                <a href="#lowongan" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Lowongan PKL</a>
                <a href="#perusahaan" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Perusahaan</a>
                <a href="#tentang-kami" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Tentang Kami</a>
            </nav>

            <!-- Action Buttons -->
            <div class="hidden md:flex items-center gap-4">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors px-3 py-2">
                        Daftar
                    </a>
                @endif
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200">
                    Login
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex md:hidden">
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    type="button"
                    class="p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none"
                    aria-label="Toggle Menu"
                >
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div
        x-show="mobileMenuOpen"
        x-cloak
        class="md:hidden border-t border-slate-100 bg-white px-4 pt-3 pb-5 space-y-2 shadow-lg"
    >
        <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-blue-600 bg-blue-50">Beranda</a>
        <a href="#lowongan" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-700 hover:bg-slate-50">Lowongan PKL</a>
        <a href="#perusahaan" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-700 hover:bg-slate-50">Perusahaan</a>
        <a href="#tentang-kami" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-700 hover:bg-slate-50">Tentang Kami</a>

        <div class="pt-4 border-t border-slate-100 flex flex-col gap-2">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="w-full text-center py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-lg border border-slate-200">
                    Daftar
                </a>
            @endif
            <a href="{{ route('login') }}" class="w-full text-center py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg">
                Login
            </a>
        </div>
    </div>
</header>
