@extends('landing.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-100 flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-3xl shadow-xl border border-slate-100">
        <!-- Logo & Title -->
        <div class="text-center">
            <a href="{{ url('/') }}" class="inline-block mb-4">
                <img src="{{ asset('assets/image/Logo.png') }}" alt="Logo" class="h-10 mx-auto">
            </a>
            <h2 class="text-2xl font-bold font-urbanist text-slate-900 tracking-tight">
                Masuk ke Portal PKL
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Silakan login untuk mengakses lowongan dan status pengajuan
            </p>
        </div>

        <!-- Session Status / Errors -->
        @if ($errors->any())
            <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('status'))
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-xs font-semibold text-slate-700 mb-1.5">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    placeholder="nama@email.com"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-semibold text-slate-700">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-blue-600 hover:underline">
                            Lupa password?
                        </a>
                    @endif
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-600">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                    <span class="text-xs text-slate-600">Ingat saya di perangkat ini</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-500/20 transition duration-150 cursor-pointer">
                Masuk Sekarang
            </button>
        </form>

        <!-- Akun Demo Cepat (Sangat membantu penguji UKK!) -->
        <div class="pt-4 border-t border-slate-100">
            <p class="text-2xs uppercase tracking-wider text-slate-400 font-bold text-center mb-2">Akun Demo Penguji / Praktik (Klik Cepat)</p>
            <div class="grid grid-cols-2 gap-2 text-xs">
                <button type="button" onclick="setDemo('siswa@smk.sch.id', 'password')"
                    class="p-2.5 rounded-xl border border-slate-200 hover:border-blue-400 hover:bg-blue-50 text-left transition cursor-pointer">
                    <p class="font-bold text-slate-800">Siswa Demo</p>
                    <p class="text-2xs text-slate-500">siswa@smk.sch.id</p>
                </button>
                <button type="button" onclick="setDemo('admin@smk.sch.id', 'password')"
                    class="p-2.5 rounded-xl border border-slate-200 hover:border-blue-400 hover:bg-blue-50 text-left transition cursor-pointer">
                    <p class="font-bold text-slate-800">Admin / Guru</p>
                    <p class="text-2xs text-slate-500">admin@smk.sch.id</p>
                </button>
            </div>
        </div>

        <p class="text-center text-xs text-slate-500">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:underline">
                Daftar sebagai Siswa
            </a>
        </p>
    </div>
</div>

<script>
    function setDemo(email, password) {
        document.getElementById('email').value = email;
        document.getElementById('password').value = password;
    }
</script>
@endsection
