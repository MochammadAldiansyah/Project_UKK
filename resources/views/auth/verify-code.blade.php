@extends('landing.layouts.app')

@section('content')
    <div class="relative w-full h-full min-h-screen lg:min-h-0 lg:h-screen bg-white flex items-center justify-center p-4 sm:p-6 lg:p-8 xl:p-12 overflow-y-auto lg:overflow-hidden">

        <div class="w-full max-w-[1512px] h-full max-h-[880px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 xl:gap-12 items-center">

            {{-- Left Column: OTP Verification Form --}}
            <div class="flex flex-col justify-center max-w-[420px] xl:max-w-[460px] mx-auto w-full py-2">
                {{-- Brand Logo --}}
                <div class="mb-5 sm:mb-6">
                    <a href="{{ url('/') }}" class="inline-block">
                        <img src="{{ asset('assets/image/logo/logo.svg') }}" alt="Portal PKL" class="h-8 sm:h-9">
                    </a>
                </div>

                {{-- Back Navigation --}}
                <div class="mb-2">
                    <a href="{{ route('password.request') }}" aria-label="Kembali ke formulir lupa password"
                        class="inline-flex items-center gap-1.5 text-slate-500 hover:text-[#4F11F0] transition-colors group">
                        <svg class="w-4 h-4 text-slate-500 group-hover:text-[#4F11F0] group-hover:-translate-x-0.5 transition-all"
                            fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>
                </div>

                {{-- Form Header --}}
                <div class="mb-6 sm:mb-7">
                    <h1 class="font-urbanist text-2xl sm:text-[28px] font-bold text-[#1E293B] tracking-tight mb-1.5">
                        Kode Verifikasi
                    </h1>
                    <p class="text-xs sm:text-sm text-[#313957] leading-relaxed">
                        Kode autentikasi telah dikirim ke email Anda.
                    </p>
                </div>

                {{-- Session Status (Resend Confirmation) --}}
                @if (session('status'))
                    <div class="mb-4 p-3 rounded-xl bg-emerald-50 border border-emerald-200 flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs sm:text-sm font-medium text-emerald-700">{{ session('status') }}</p>
                    </div>
                @endif

                {{-- OTP Verification Form --}}
                <form method="POST" action="{{ route('otp.verify') }}" class="space-y-4" novalidate>
                    @csrf

                    {{-- OTP Code Field --}}
                    <div>
                        <label for="otp" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">
                            Masukkan Kode
                        </label>
                        <div class="relative">
                            <input id="otp" type="text" name="otp" value="{{ old('otp') }}" maxlength="6"
                                inputmode="numeric" required autofocus placeholder="xxxxx" aria-describedby="otp-error"
                                class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 rounded-xl border {{ $errors->has('otp') ? 'border-red-400 bg-red-50/40 ring-1 ring-red-200' : 'border-[#D0D5DD] bg-[#F7FBFF]' }} text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-[#4F11F0] focus:ring-2 focus:ring-[#4F11F0]/20 tracking-wider transition-all">
                            @error('otp')
                                <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-red-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                            @enderror
                        </div>

                        {{-- Resend OTP Link with Countdown --}}
                        <div class="flex items-center gap-1 text-xs text-slate-500 mt-2">
                            <span>Tidak menerima kode?</span>
                            <button type="submit" id="resend-otp-btn" form="resend-otp-form"
                                class="font-semibold text-[#EF4444] hover:text-[#DC2626] transition-colors cursor-pointer">
                                Kirim Ulang
                            </button>
                        </div>

                        @error('otp')
                            <p id="otp-error" class="text-xs text-red-500 mt-1.5 font-medium flex items-center gap-1">
                                <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

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
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full py-3 sm:py-3.5 px-6 rounded-xl bg-[#4F11F0] hover:bg-[#430cd4] active:bg-[#3809b5] text-white font-bold text-sm text-center shadow-md shadow-[#4F11F0]/25 hover:shadow-lg hover:shadow-[#4F11F0]/35 transition-all duration-200 cursor-pointer">
                            Verifikasi
                        </button>
                    </div>
                </form>

                {{-- Hidden Form for OTP Resend --}}
                <form id="resend-otp-form" method="POST" action="{{ route('otp.resend') }}" class="hidden">
                    @csrf
                </form>
            </div>

            {{-- Right Column: Illustration --}}
            <div class="hidden lg:flex items-center justify-center h-full max-h-[min(88vh,850px)]">
                <div class="relative h-full max-h-[min(88vh,850px)] rounded-[24px] overflow-hidden flex items-center justify-center select-none pointer-events-none">
                    <img src="{{ asset('assets/image/component/verif_password_ilus.svg') }}"
                        alt="Ilustrasi Kode Verifikasi"
                        class="h-full w-auto max-h-[min(88vh,850px)] max-w-full object-contain rounded-[24px]"
                        loading="eager" fetchpriority="high">
                </div>
            </div>

        </div>
    </div>
@endsection
