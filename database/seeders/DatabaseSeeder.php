<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Roles
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $rolePerusahaan = Role::firstOrCreate(['name' => 'perusahaan']);
        $roleSiswa = Role::firstOrCreate(['name' => 'siswa']);

        // 2. Akun Admin / Guru Pembimbing
        $admin = User::firstOrCreate(
            ['email' => 'admin@smk.sch.id'],
            [
                'name' => 'Admin Vokasi / Guru Pembimbing',
                'password' => Hash::make('password'),
            ]
        );
        $admin->syncRoles([$roleAdmin]);

        // 3. Akun Siswa Demo
        $siswa = User::firstOrCreate(
            ['email' => 'siswa@smk.sch.id'],
            [
                'name' => 'Ahmad Zackly (Siswa)',
                'password' => Hash::make('password'),
            ]
        );
        $siswa->syncRoles([$roleSiswa]);

        // 4. Mitra Perusahaan & Akun HRD
        $mitras = [
            [
                'email' => 'hrd@telkomvokasi.co.id',
                'name' => 'HRD PT Telkom Vokasi',
                'nama_perusahaan' => 'PT Telkom Vokasi Digital',
                'bidang' => 'Teknologi Informasi & Jaringan',
                'kota' => 'Jakarta',
                'alamat' => 'Jl. Kebon Sirih No. 12, Gambir, Jakarta Pusat',
                'telepon' => '021-500200',
                'website' => 'https://telkom.co.id',
                'logo' => 'assets/image/icon/code.svg',
                'deskripsi' => 'Perusahaan BUMN penyedia infrastruktur telekomunikasi dan layanan digital terdepan di Indonesia.',
                'lowongan' => [
                    [
                        'judul' => 'Frontend Web Developer Intern',
                        'tipe_kerja' => 'Hybrid',
                        'lokasi' => 'Jakarta',
                        'jurusan' => 'RPL / Multimedia',
                        'keahlian' => 'Tailwind & JS',
                        'kuota' => 5,
                        'sisa_kuota' => 3,
                        'deskripsi' => 'Mengembangkan antarmuka aplikasi web portal layanan publik dengan framework modern.',
                        'persyaratan' => 'Siswa SMK jurusan RPL/SIJA, menguasai HTML, CSS, JavaScript dasar, dan familiar dengan Tailwind CSS.',
                        'deadline' => now()->addDays(30),
                    ],
                    [
                        'judul' => 'Junior Cloud & Network Engineer',
                        'tipe_kerja' => 'WFO',
                        'lokasi' => 'Jakarta',
                        'jurusan' => 'TKJ / SIJA',
                        'keahlian' => 'MikroTik & Linux',
                        'kuota' => 4,
                        'sisa_kuota' => 2,
                        'deskripsi' => 'Membantu konfigurasi routing, switching, dan monitoring server data center.',
                        'persyaratan' => 'Paham subnetting, konfigurasi router MikroTik dasar, dan Linux terminal command.',
                        'deadline' => now()->addDays(25),
                    ]
                ]
            ],
            [
                'email' => 'hrd@exostudio.com',
                'name' => 'HRD Exo Studio',
                'nama_perusahaan' => 'Exo Studio Kreatif',
                'bidang' => 'Desain Kreatif & Multimedia',
                'kota' => 'Jakarta',
                'alamat' => 'Jl. Kemang Raya No. 45, Jakarta Selatan',
                'telepon' => '021-789012',
                'website' => 'https://exostudio.com',
                'logo' => 'assets/image/icon/pallet.svg',
                'deskripsi' => 'Agensi kreatif yang fokus pada branding digital, animasi 2D/3D, dan video production.',
                'lowongan' => [
                    [
                        'judul' => 'Multimedia Content Creator',
                        'tipe_kerja' => 'WFO',
                        'lokasi' => 'Jakarta',
                        'jurusan' => 'DKV / Animasi',
                        'keahlian' => 'Premiere & Figma',
                        'kuota' => 3,
                        'sisa_kuota' => 2,
                        'deskripsi' => 'Merancang konten visual media sosial, video reels, dan aset desain interaktif.',
                        'persyaratan' => 'Menguasai Adobe Premiere Pro / After Effects atau CapCut, dan Adobe Illustrator / Figma.',
                        'deadline' => now()->addDays(20),
                    ]
                ]
            ],
            [
                'email' => 'hrd@bankantartika.co.id',
                'name' => 'HRD Bank Antartika',
                'nama_perusahaan' => 'Bank Antartika Jaya',
                'bidang' => 'Perbankan & Keuangan',
                'kota' => 'Surabaya',
                'alamat' => 'Jl. Basuki Rahmat No. 88, Surabaya',
                'telepon' => '031-555123',
                'website' => 'https://bankantartika.co.id',
                'logo' => 'assets/image/icon/money.svg',
                'deskripsi' => 'Lembaga keuangan perbankan terkemuka yang mendukung kemajuan UMKM dan inklusi keuangan.',
                'lowongan' => [
                    [
                        'judul' => 'Staff Administrasi & Akuntansi',
                        'tipe_kerja' => 'WFO',
                        'lokasi' => 'Surabaya',
                        'jurusan' => 'Akuntansi / AKL',
                        'keahlian' => 'Spreadsheet',
                        'kuota' => 6,
                        'sisa_kuota' => 5,
                        'deskripsi' => 'Membantu pembukuan transaksi harian, rekapitulasi data nasabah, dan arsip dokumen perbankan.',
                        'persyaratan' => 'Teliti, mahir rumus Microsoft Excel (VLOOKUP, IF, Pivot), dan mengerti siklus akuntansi dasar.',
                        'deadline' => now()->addDays(35),
                    ]
                ]
            ],
            [
                'email' => 'hrd@hummatech.com',
                'name' => 'HRD HummaTech',
                'nama_perusahaan' => 'PT Humma Teknologi Indonesia',
                'bidang' => 'Software House & IT Consultant',
                'kota' => 'Malang',
                'alamat' => 'Perum Graha Pelita No. 9, Karangploso, Malang',
                'telepon' => '0341-456789',
                'website' => 'https://hummatech.com',
                'logo' => 'assets/image/hummatech.svg',
                'deskripsi' => 'Software house terkemuka di Jawa Timur yang telah membimbing ratusan siswa magang SMK berprestasi.',
                'lowongan' => [
                    [
                        'judul' => 'Backend Laravel Developer Intern',
                        'tipe_kerja' => 'Hybrid',
                        'lokasi' => 'Malang',
                        'jurusan' => 'RPL / SIJA',
                        'keahlian' => 'Laravel & MySQL',
                        'kuota' => 4,
                        'sisa_kuota' => 3,
                        'deskripsi' => 'Membangun REST API dan arsitektur database untuk aplikasi enterprise client.',
                        'persyaratan' => 'Menguasai konsep MVC Laravel, relasi database Eloquent, dan dasar API authentication.',
                        'deadline' => now()->addDays(28),
                    ],
                    [
                        'judul' => 'Mobile App Developer Flutter',
                        'tipe_kerja' => 'Hybrid',
                        'lokasi' => 'Malang',
                        'jurusan' => 'RPL / Multimedia',
                        'keahlian' => 'Flutter & Dart',
                        'kuota' => 3,
                        'sisa_kuota' => 2,
                        'deskripsi' => 'Mengembangkan aplikasi Android/iOS cross-platform menggunakan Flutter SDK.',
                        'persyaratan' => 'Memahami pemrograman berorientasi objek (OOP) Dart dan state management (Provider/Bloc/GetX).',
                        'deadline' => now()->addDays(40),
                    ]
                ]
            ],
        ];

        foreach ($mitras as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                ]
            );
            $user->syncRoles([$rolePerusahaan]);

            $perusahaan = Perusahaan::updateOrCreate(
                ['nama' => $data['nama_perusahaan']],
                [
                    'user_id' => $user->id,
                    'bidang' => $data['bidang'],
                    'kota' => $data['kota'],
                    'alamat' => $data['alamat'],
                    'telepon' => $data['telepon'],
                    'website' => $data['website'],
                    'logo' => $data['logo'],
                    'deskripsi' => $data['deskripsi'],
                ]
            );

            foreach ($data['lowongan'] as $loker) {
                Lowongan::updateOrCreate(
                    [
                        'perusahaan_id' => $perusahaan->id,
                        'judul' => $loker['judul']
                    ],
                    [
                        'tipe_kerja' => $loker['tipe_kerja'],
                        'lokasi' => $loker['lokasi'],
                        'jurusan' => $loker['jurusan'],
                        'keahlian' => $loker['keahlian'],
                        'kuota' => $loker['kuota'],
                        'sisa_kuota' => $loker['sisa_kuota'],
                        'deskripsi' => $loker['deskripsi'],
                        'persyaratan' => $loker['persyaratan'],
                        'status' => 'buka',
                        'deadline' => $loker['deadline'],
                    ]
                );
            }
        }

        // 5. Buat Demo Pengajuan PKL dari Siswa
        $firstLowongan = Lowongan::first();
        if ($firstLowongan && $siswa) {
            \App\Models\Pengajuan::firstOrCreate(
                [
                    'user_id' => $siswa->id,
                    'lowongan_id' => $firstLowongan->id,
                ],
                [
                    'tanggal_pengajuan' => now()->subDays(2),
                    'nisn' => '0058912345',
                    'asal_sekolah' => 'SMK Negeri 1 Surabaya',
                    'jurusan' => 'Rekayasa Perangkat Lunak',
                    'catatan' => 'Saya memiliki motivasi tinggi untuk belajar dan berkontribusi langsung pada proyek nyata tim frontend.',
                    'status' => 'pending',
                ]
            );
        }
    }
}
