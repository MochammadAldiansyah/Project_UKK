@extends('landing.layouts.app')

@section('content')
    <div class="relative w-full h-full min-h-screen lg:min-h-0 lg:h-screen bg-white flex items-center justify-center p-4 sm:p-6 lg:p-8 xl:p-12 overflow-y-auto lg:overflow-hidden">

        <!-- Back to landing -->
        <a href="{{ url('/') }}" aria-label="Kembali ke beranda"
            class="absolute top-4 left-4 sm:top-6 sm:left-6 lg:top-8 lg:left-8 inline-flex items-center justify-center p-2 rounded-xl hover:bg-slate-100 active:bg-slate-200 transition-colors duration-200 z-20">
            <img src="{{ asset('assets/image/icon/arrow.svg') }}" alt="" width="22" height="20"
                class="w-[18px] md:w-[22px] h-auto">
        </a>

        <div class="w-full max-w-[1512px] h-full max-h-[880px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 xl:gap-12 items-center">

            <!-- Left column: Login form -->
            <div class="lg:col-span-6 xl:col-span-5 flex flex-col justify-center max-w-[420px] xl:max-w-[460px] mx-auto w-full py-2">
                <!-- Brand logo -->
                <div class="mb-4 sm:mb-5">
                    <a href="{{ url('/') }}" class="inline-block">
                        <img src="{{ asset('assets/image/logo/logo.svg') }}" alt="Portal PKL" class="h-8 sm:h-9">
                    </a>
                </div>

                <!-- Form header -->
                <div class="mb-5 sm:mb-6">
                    <h1 class="font-urbanist text-2xl sm:text-3xl font-semibold text-[#1E293B] tracking-tight mb-1.5">
                        Selamat Datang!
                    </h1>
                    <p class="text-xs sm:text-lg text-[#313957] leading-relaxed">
                        Yuk, masuk kembali ke akun dan lanjutkan perjalanan PKL Anda.
                    </p>
                </div>

                <!-- Session status message -->
                @if (session('status'))
                    <div class="mb-4 p-3 rounded-xl bg-blue-50 border border-blue-200 text-xs sm:text-sm font-medium text-blue-700">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-3 sm:space-y-4">
                    @csrf

                    <!-- Email input -->
                    <div>
                        <label for="email" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1">
                            Email
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="username" placeholder="Example@email.com"
                            class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 rounded-xl border @error('email') border-red-400 bg-red-50/30 @else border-slate-200/90 bg-white @enderror text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#2563EB]/20 focus:border-[#2563EB] transition-all">
                        @error('email')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div>
                        <label for="password" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1">
                            Password
                        </label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="Password"
                            class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 rounded-xl border @error('password') border-red-400 bg-red-50/30 @else border-slate-200/90 bg-white @enderror text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#2563EB]/20 focus:border-[#2563EB] transition-all">
                        @error('password')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror

                        <!-- Forgot password link -->
                        <div class="flex justify-end mt-1.5">
                            <a href="{{ route('password.request') }}"
                                class="text-xs font-semibold text-slate-500 hover:text-[#2563EB] transition-colors">
                                Lupa Password?
                            </a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="pt-1">
                        <button type="submit"
                            class="w-full py-3 sm:py-3.5 px-6 rounded-xl bg-[#4F11F0] hover:bg-[#430cd4] active:bg-[#3809b5] text-white font-bold text-sm text-center shadow-md shadow-[#4F11F0]/25 hover:shadow-lg hover:shadow-[#4F11F0]/35 transition-all duration-200 cursor-pointer">
                            Sign In
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="relative flex items-center justify-center my-4 sm:my-5">
                        <div class="border-t border-slate-200 w-full"></div>
                        <span class="bg-white px-3 text-xs text-slate-400 absolute font-medium select-none">
                            Or
                        </span>
                    </div>

                    <!-- Social login buttons -->
                    <div>
                        <!-- Google login button -->
                        <a href="{{ route('google.login') }}"
                            class="w-full py-2.5 sm:py-3 px-4 rounded-xl border border-slate-200/90 bg-white hover:bg-slate-50 active:bg-slate-100 text-slate-700 font-semibold text-xs sm:text-sm flex items-center justify-center gap-3 transition-colors shadow-2xs cursor-pointer">
                            <svg class="w-4 h-4" viewBox="0 0 24 24">
                                <path
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                    fill="#4285F4" />
                                <path
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                    fill="#34A853" />
                                <path
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"
                                    fill="#FBBC05" />
                                <path
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"
                                    fill="#EA4335" />
                            </svg>
                            <span>Masuk dengan Google</span>
                        </a>
                    </div>

                    <!-- Register link -->
                    <p class="text-center text-xs sm:text-sm text-slate-500 pt-2">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                            class="font-bold text-[#2563EB] hover:text-[#3e75eb] transition-colors ml-1">
                            Daftar
                        </a>
                    </p>
                </form>
            </div>

            <!-- Right column: Illustration showcase -->
            <div class="hidden lg:flex lg:col-span-6 xl:col-span-7 items-center justify-center h-full max-h-[min(85vh,820px)]">
                <div class="relative h-full max-h-[min(85vh,820px)] rounded-[24px] overflow-hidden flex items-center justify-center select-none pointer-events-none">
                    <img src="{{ asset('assets/image/component/login_ilus.svg') }}"
                        alt="Ilustrasi Siswa PKL Vokasi"
                        class="h-full w-auto max-h-[min(85vh,820px)] max-w-full object-contain rounded-[24px]"
                        loading="eager" fetchpriority="high">
                </div>
            </div>

        </div>
    </div>
@endsection
