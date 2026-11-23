@extends('landing.layouts.app')

@section('content')
    <div class="relative w-full h-full min-h-screen lg:min-h-0 lg:h-screen bg-white flex items-center justify-center p-4 sm:p-6 lg:p-8 xl:p-12 overflow-y-auto lg:overflow-hidden">
        <div class="w-full max-w-[1512px] h-full max-h-[880px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 xl:gap-12 items-center">

            {{-- Left Column: Forgot Password Form --}}
            <div class="flex flex-col justify-center max-w-[420px] xl:max-w-[460px] mx-auto w-full py-2">
                {{-- Brand Logo --}}
                <div class="mb-5 sm:mb-6">
                    <a href="{{ url('/') }}" class="inline-block">
                        <img src="{{ asset('assets/image/logo/logo.svg') }}" alt="Portal PKL" class="h-8 select-none sm:h-9">
                    </a>
                </div>

                {{-- Back to Login --}}
                <div class="mb-2">
                    <a href="{{ route('login') }}" aria-label="Kembali ke halaman masuk" class="inline-flex items-center gap-1.5">
                        <img src="{{ asset('assets/image/icon/arrow.svg') }}" class="w-4 h-4 hover:-translate-x-0.5 transition-all" alt="">
                    </a>
                </div>

                {{-- Form Header --}}
                <div class="mb-6 sm:mb-7">
                    <h1 class="font-urbanist text-2xl sm:text-[28px] font-bold text-[#1E293B] tracking-tight mb-1.5">
                        Lupa Password?
                    </h1>
                    <p class="text-xs sm:text-sm text-[#313957] leading-relaxed">
                        Masukkan email anda di bawah ini untuk memulihkan kata sandi Anda.
                    </p>
                </div>

                {{-- Session Status --}}
                @if (session('status'))
                    <div class="mb-4 p-3 rounded-xl bg-emerald-50 border border-emerald-200 flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs sm:text-sm font-medium text-emerald-700">{{ session('status') }}</p>
                    </div>
                @endif

                {{-- OTP Request Form --}}
                <form method="POST" action="{{ route('password.email') }}" class="space-y-4" novalidate>
                    @csrf

                    {{-- Email Field --}}
                    <div>
                        <label for="email" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">
                            Email
                        </label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus autocomplete="username" placeholder="Example@email.com"
                                aria-describedby="email-error"
                                class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 rounded-xl border {{ $errors->has('email') ? 'border-red-400 bg-red-50/40 ring-1 ring-red-200' : 'border-[#D0D5DD] bg-[#F7FBFF]' }} text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-[#4F11F0] focus:ring-2 focus:ring-[#4F11F0]/20 transition-all">
                            @error('email')
                                <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-red-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                        @error('email')
                            <p id="email-error" class="text-xs text-red-500 mt-1.5 font-medium flex items-center gap-1">
                                <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Cloudflare Turnstile CAPTCHA --}}
                    <x-turnstile action="forgot-password" />

                    {{-- Throttle Warning (Inline) --}}
                    @if ($errors->has('throttle'))
                        <p class="auth-rate-limit-warning text-xs text-red-500 my-2 font-medium flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $errors->first('throttle') }}</span>
                        </p>
                    @endif

                    {{-- Submit Button --}}
                    <div class="pt-1">
                        <button type="submit"
                            class="w-full py-3 sm:py-3.5 px-6 rounded-xl bg-[#4F11F0] hover:bg-[#430cd4] active:bg-[#3809b5] text-white font-bold text-sm text-center shadow-md shadow-[#4F11F0]/25 hover:shadow-lg hover:shadow-[#4F11F0]/35 transition-all duration-200 cursor-pointer">
                            Kirim
                        </button>
                    </div>

                    {{-- Divider --}}
                    <div class="relative flex items-center justify-center !mt-8 !mb-8">
                        <div class="absolute inset-x-0 top-1/2 border-t border-slate-200"></div>
                        <span class="relative px-4 text-xs text-slate-400 font-medium select-none bg-white">
                            Atau
                        </span>
                    </div>

                    {{-- Google OAuth Button --}}
                    <div>
                        <a href="{{ route('google.login') }}"
                            class="w-full py-2.5 sm:py-3 px-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 active:bg-slate-100 text-slate-700 text-xs sm:text-sm flex items-center justify-center gap-3 transition-colors shadow-xs cursor-pointer">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
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
                </form>
            </div>

            {{-- Right Column: Illustration --}}
            <div class="hidden lg:flex items-center justify-center h-full max-h-[min(88vh,850px)]">
                <div class="relative h-full max-h-[min(88vh,850px)] rounded-[24px] overflow-hidden flex items-center justify-center select-none pointer-events-none">
                    <img src="{{ asset('assets/image/component/forgot_password_ilus.svg') }}"
                        alt="Ilustrasi Lupa Password"
                        class="h-full w-auto max-h-[min(88vh,850px)] max-w-full object-contain rounded-[24px]"
                        loading="eager" fetchpriority="high">
                </div>
            </div>

        </div>
    </div>
@endsection
