@extends('landing.layouts.app')

@section('content')
    <div class="relative w-full h-full min-h-screen lg:min-h-0 lg:h-screen bg-white flex items-center justify-center p-4 sm:p-6 lg:p-8 xl:p-12 overflow-y-auto lg:overflow-hidden">

        <div class="w-full max-w-[1512px] h-full max-h-[880px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 xl:gap-12 items-center">

            {{-- Left Column: New Password Form --}}
            <div class="flex flex-col justify-center max-w-[420px] xl:max-w-[460px] mx-auto w-full py-2">
                {{-- Brand Logo --}}
                <div class="mb-5 sm:mb-6">
                    <a href="{{ url('/') }}" class="inline-block">
                        <img src="{{ asset('assets/image/logo/logo.svg') }}" alt="Portal PKL" class="h-8 select-none sm:h-9">
                    </a>
                </div>

                {{-- Form Header --}}
                <div class="mb-5 sm:mb-6">
                    <h1 class="font-urbanist text-2xl sm:text-[28px] font-bold text-[#1E293B] tracking-tight mb-1.5">
                        Buat Password Baru
                    </h1>
                    <p class="text-xs sm:text-sm text-[#313957] leading-relaxed">
                        Hampir selesai! Buat Password baru agar Anda bisa masuk kembali.
                    </p>
                </div>

                {{-- Reset Password Form --}}
                <form method="POST" action="{{ route('password.update') }}" class="space-y-3.5 sm:space-y-4" novalidate id="new-password-form">
                    @csrf

                    {{-- New Password Field --}}
                    <div>
                        <label for="password" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">
                            Buat Password
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                placeholder="xxxxx" aria-describedby="password-error"
                                class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 pr-11 rounded-xl border {{ $errors->has('password') ? 'border-red-400 bg-red-50/40 ring-1 ring-red-200' : 'border-[#D0D5DD] bg-[#F7FBFF]' }} text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-[#4F11F0] focus:ring-2 focus:ring-[#4F11F0]/20 transition-all">
                            
                            @error('password')
                                <div class="input-error-icon absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-red-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                            @enderror

                            {{-- Password Visibility Toggle --}}
                            <button type="button" onclick="togglePassword('password', this)" aria-label="Lihat password"
                                class="password-toggle-btn text-slate-400 hover:text-slate-600 focus:outline-none transition-colors cursor-pointer absolute inset-y-0 right-0 pr-3.5 flex items-center {{ $errors->has('password') ? 'hidden' : '' }}">
                                <svg class="icon-eye w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg class="icon-eye-off hidden w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p id="password-error" class="text-xs text-red-500 mt-1.5 font-medium flex items-center gap-1">
                                <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Confirm Password Field --}}
                    <div>
                        <label for="password_confirmation" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">
                            Masukkan ulang Password
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                placeholder="xxxxx" aria-describedby="password_confirmation-error"
                                class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 pr-11 rounded-xl border {{ $errors->has('password_confirmation') ? 'border-red-400 bg-red-50/40 ring-1 ring-red-200' : 'border-[#D0D5DD] bg-[#F7FBFF]' }} text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-[#4F11F0] focus:ring-2 focus:ring-[#4F11F0]/20 transition-all">
                            
                            @error('password_confirmation')
                                <div class="input-error-icon absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-red-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                            @enderror

                            {{-- Confirm Password Visibility Toggle --}}
                            <button type="button" onclick="togglePassword('password_confirmation', this)" aria-label="Lihat konfirmasi password"
                                class="password-toggle-btn text-slate-400 hover:text-slate-600 focus:outline-none transition-colors cursor-pointer absolute inset-y-0 right-0 pr-3.5 flex items-center {{ $errors->has('password_confirmation') ? 'hidden' : '' }}">
                                <svg class="icon-eye w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg class="icon-eye-off hidden w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p id="password_confirmation-error" class="text-xs text-red-500 mt-1.5 font-medium flex items-center gap-1">
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
                    <div class="pt-1 sm:pt-2">
                        <button type="submit"
                            class="w-full py-3 sm:py-3.5 px-6 rounded-xl bg-[#4F11F0] hover:bg-[#430cd4] active:bg-[#3809b5] text-white font-bold text-sm text-center shadow-md shadow-[#4F11F0]/25 hover:shadow-lg hover:shadow-[#4F11F0]/35 transition-all duration-200 cursor-pointer">
                            Konfirmasi
                        </button>
                    </div>

                    {{-- Password Requirements Checklist --}}
                    <div class="pt-3">
                        <p class="text-xs font-semibold text-slate-700 mb-2.5">
                            Password anda harus:
                        </p>
                        <ul class="space-y-2 text-xs text-slate-500" id="password-requirements">
                            <li class="flex items-center gap-2" id="req-length">
                                <span class="req-icon w-3.5 h-3.5 rounded-full border border-slate-300 flex items-center justify-center shrink-0"></span>
                                <span class="req-text">Berisi 8 Karakter</span>
                            </li>
                            <li class="flex items-center gap-2" id="req-uppercase">
                                <span class="req-icon w-3.5 h-3.5 rounded-full border border-slate-300 flex items-center justify-center shrink-0"></span>
                                <span class="req-text">Minimal 1 huruf besar</span>
                            </li>
                            <li class="flex items-center gap-2" id="req-number">
                                <span class="req-icon w-3.5 h-3.5 rounded-full border border-slate-300 flex items-center justify-center shrink-0"></span>
                                <span class="req-text">Minimal 1 angka</span>
                            </li>
                            <li class="flex items-center gap-2" id="req-nospace">
                                <span class="req-icon w-3.5 h-3.5 rounded-full border border-slate-300 flex items-center justify-center shrink-0"></span>
                                <span class="req-text">Tanpa spasi</span>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>

            {{-- Right Column: Illustration --}}
            <div class="hidden lg:flex items-center justify-center h-full max-h-[min(88vh,850px)]">
                <div class="relative h-full max-h-[min(88vh,850px)] rounded-[24px] overflow-hidden flex items-center justify-center select-none pointer-events-none">
                    <img src="{{ asset('assets/image/component/new_password.svg') }}" alt="Ilustrasi Buat Password Baru"
                        class="h-full w-auto max-h-[min(88vh,850px)] max-w-full object-contain rounded-[24px]"
                        loading="eager" fetchpriority="high">
                </div>
            </div>

        </div>
    </div>
@endsection
