<!-- Ecosystem section -->
<section id="ekosistem" class="relative w-full py-16 sm:py-20 lg:py-24">
    <!-- Main container -->
    <div class="w-full max-w-[1512px] mx-auto px-4 sm:px-6 lg:px-8 xl:pl-[117px] xl:pr-[115px] relative z-10">
        <!-- Section header -->
        <div class="text-center max-w-[760px] mx-auto mb-10 lg:mb-12">
            <span
                class="inline-flex px-4 py-1.5 rounded-full text-xs font-bold tracking-wider text-blue-600 bg-[#1F5EFF1A] border border-[#1F5EFF33] uppercase shadow-2xs mb-4">
                Ekosistem Sinergis
            </span>

            <h2
                class="font-urbanist text-3xl sm:text-4xl lg:text-[44px] font-bold text-[#1E293B] leading-[1.2] tracking-tight">
                Solusi Terpadu untuk Tiga Pilar Vokasi
            </h2>

            <p class="text-base sm:text-lg text-slate-500 leading-relaxed mt-4">
                Menghilangkan sekat komunikasi antara siswa, sekolah, dan mitra PKL
            </p>
        </div>

        <!-- Tab navigation -->
        <div class="flex items-center justify-center mb-10 lg:mb-14">
            <div class="inline-flex p-1.5 rounded-2xl bg-slate-100 border border-slate-200/80 gap-1 sm:gap-1.5">
                <button type="button" data-tab-target="panel-siswa"
                    class="tab-btn px-5 sm:px-7 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 bg-blue-600 text-white shadow-md shadow-blue-500/20 cursor-pointer">
                    Untuk Siswa
                </button>
                <button type="button" data-tab-target="panel-sekolah"
                    class="tab-btn px-5 sm:px-7 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-200/60 transition-all duration-200 cursor-pointer">
                    Sekolah & Guru
                </button>
                <button type="button" data-tab-target="panel-perusahaan"
                    class="tab-btn px-5 sm:px-7 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-200/60 transition-all duration-200 cursor-pointer">
                    Perusahaan / DUDI
                </button>
            </div>
        </div>

        <!-- Tab panel: Siswa -->
        <div id="panel-siswa" class="tab-panel transition-all duration-300 opacity-100 translate-y-0">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">
                <!-- Feature list -->
                <div class="lg:col-span-6 flex flex-col justify-between gap-4 sm:gap-5">
                    <!-- Feature: Pengajuan Online -->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-student-apply.svg') }}"
                                alt="Pengajuan PKL Online" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                Pengajuan PKL via Online
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Kirim portofolio dan surat pengantar sekolah tanpa birokrasi cetak berkas fisik yang
                                berbelit-belit.
                            </p>
                        </div>
                    </div>

                    <!-- Feature: Jurnal Digital -->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-student-journal.svg') }}"
                                alt="Jurnal Kegiatan Digital" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                Jurnal Kegiatan Digital
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Unggah dokumentasi harian, foto tugas, dan rangkuman logbook langsung dari
                                smartphone.
                            </p>
                        </div>
                    </div>

                    <!-- Feature: VocatiBot AI -->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-student-chatbot.svg') }}"
                                alt="VocatiBot AI Mentor" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                VocatiBot (Mentor AI)
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Asisten virtual yang siap membimbingmu 24/7 untuk menyusun jurnal harian, dan
                                konsultasi etika kerja selama PKL.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Media card & testimonial quote -->
                <div class="lg:col-span-6 flex">
                    <div
                        class="relative w-full min-h-[360px] sm:min-h-[420px] rounded-3xl overflow-hidden bg-gradient-to-br from-slate-100 via-blue-50/40 to-slate-200/70 border border-slate-200/80 p-5 sm:p-7 flex flex-col justify-end shadow-sm group">
                        <img src="{{ asset('assets/image/ecosystem-preview.svg') }}" alt="Foto Siswa"
                            class="rounded-2xl w-full h-full object-cover absolute top-0 left-0 select-none">
                        <!-- Quote card -->
                        <div
                            class="relative z-10 p-5 sm:p-6 rounded-2xl bg-[#F0F2F4] backdrop-blur-md border border-white/10 shadow-xl transition-all duration-200 group-hover:bg-slate-100">
                            <span class="text-xs font-bold tracking-wider text-blue-400 uppercase mb-2 block">
                                Dashboard Siswa
                            </span>
                            <p class="text-sm sm:text-base font-medium text-[#171D1C] leading-relaxed italic">
                                "Aku diterima magang di unicorn idaman hanya dalam tempo 3 hari setelah apply via
                                PortalPKL."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab panel: Sekolah & Guru -->
        <div id="panel-sekolah" class="tab-panel hidden opacity-0 translate-y-2 transition-all duration-300">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">
                <!-- Feature list -->
                <div class="lg:col-span-6 flex flex-col justify-between gap-4 sm:gap-5">
                    <!-- Feature: Monitoring PKL Siswa -->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-school-monitoring.svg') }}"
                                alt="Monitoring PKL Siswa" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                Monitoring PKL Siswa
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Pantau lokasi, status, dan progres seluruh siswa PKL dalam satu dasbor, tanpa kunjungan
                                atau rekap manual.
                            </p>
                        </div>
                    </div>

                    <!-- Feature: Validasi Jurnal & Penilaian Terpadu -->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-school-validation.svg') }}"
                                alt="Validasi Jurnal & Penilaian" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                Validasi Jurnal & Penilaian Terpadu
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Verifikasi jurnal harian siswa, beri catatan bimbingan, dan input nilai PKL langsung
                                dari satu tempat.
                            </p>
                        </div>
                    </div>

                    <!-- Feature: Database Mitra Industri -->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-school-partnership.svg') }}"
                                alt="Database Mitra Industri" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                Database Mitra Industri
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Bangun relasi industri yang berkelanjutan dengan catatan kerja sama, kontak penting, dan
                                penilaian tiap DUDI di satu tempat.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Media card & testimonial quote -->
                <div class="lg:col-span-6 flex">
                    <div
                        class="relative w-full min-h-[360px] sm:min-h-[420px] rounded-3xl overflow-hidden bg-gradient-to-br from-slate-100 via-blue-50/40 to-slate-200/70 border border-slate-200/80 p-5 sm:p-7 flex flex-col justify-end shadow-sm group">
                        <img src="{{ asset('assets/image/ecosystem-preview.svg') }}" alt="Foto Sekolah & Guru"
                            class="rounded-2xl w-full h-full object-cover absolute top-0 left-0 select-none">
                        <!-- Quote card -->
                        <div
                            class="relative z-10 p-5 sm:p-6 rounded-2xl bg-[#F0F2F4] backdrop-blur-md border border-white/10 shadow-xl transition-all duration-200 group-hover:bg-slate-100">
                            <span class="text-xs font-bold tracking-wider text-blue-400 uppercase mb-2 block">
                                Dashboard Guru & Pembimbing
                            </span>
                            <p class="text-sm sm:text-base font-medium text-[#171D1C] leading-relaxed italic">
                                "Pantau absensi, validasi jurnal, dan evaluasi berkala siswa magang kini terpusat
                                real-time tanpa perlu rekap manual berkas fisik."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab panel: Perusahaan / DUDI -->
        <div id="panel-perusahaan" class="tab-panel hidden opacity-0 translate-y-2 transition-all duration-300">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">
                <!-- Feature list -->
                <div class="lg:col-span-6 flex flex-col justify-between gap-4 sm:gap-5">
                    <!-- Feature: Akses Talenta Siswa Magang -->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-company-talent.svg') }}"
                                alt="Akses Talenta Siswa" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                Akses Talenta Siswa Magang
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Temukan kandidat siswa magang dengan keahlian sesuai kebutuhan perusahaan berdasarkan
                                jurusan dan portofolio.
                            </p>
                        </div>
                    </div>

                    <!-- Feature: Penilaian Digital Praktis-->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-company-evaluation.svg') }}"
                                alt="Penilaian Digital Praktis" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                Penilaian Digital Praktis
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Isi evaluasi dan nilai siswa langsung dari ponsel atau laptop, tanpa formulir kertas.
                            </p>
                        </div>
                    </div>

                    <!-- Feature: Kontribusi Nyata untuk Pendidikan -->
                    <div
                        class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all duration-200 flex items-start gap-4 sm:gap-5 group cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#E9EFFD] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-200">
                            <img src="{{ asset('assets/image/icon/eco-company-contribution.svg') }}"
                                alt="Kontribusi Nyata Pendidikan" class="w-5 h-5 select-none">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">
                                Kontribusi Nyata untuk Pendidikan
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                                Bangun citra perusahaan sebagai mitra pendidikan vokasi dengan rekam kerja sama yang
                                terdokumentasi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Media card & testimonial quote -->
                <div class="lg:col-span-6 flex">
                    <div
                        class="relative w-full min-h-[360px] sm:min-h-[420px] rounded-3xl overflow-hidden bg-gradient-to-br from-slate-100 via-blue-50/40 to-slate-200/70 border border-slate-200/80 p-5 sm:p-7 flex flex-col justify-end shadow-sm group">
                        <img src="{{ asset('assets/image/ecosystem-preview.svg') }}" alt="Foto Perusahaan & DUDI"
                            class="rounded-2xl w-full h-full object-cover absolute top-0 left-0 select-none">
                        <!-- Quote card -->
                        <div
                            class="relative z-10 p-5 sm:p-6 rounded-2xl bg-[#F0F2F4] backdrop-blur-md border border-white/10 shadow-xl transition-all duration-200 group-hover:bg-slate-100">
                            <span class="text-xs font-bold tracking-wider text-blue-400 uppercase mb-2 block">
                                Dashboard Mitra Industri
                            </span>
                            <p class="text-sm sm:text-base font-medium text-[#171D1C] leading-relaxed italic">
                                "Merekrut talenta SMK yang siap kerja dan memantau evaluasi magang kini lebih cepat
                                serta terdata rapi."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
