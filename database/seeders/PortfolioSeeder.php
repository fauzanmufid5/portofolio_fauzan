<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        Profile::updateOrCreate(
            ['email' => 'fauzan@example.com'],
            [
                'name' => 'Fauzan Ramadhan',
                'title' => 'Web Developer',
                'bio' => 'Halo! Saya Fauzan, seorang Web Developer yang fokus membangun aplikasi web modern dengan Laravel dan Tailwind CSS. Saya suka mengubah ide menjadi produk digital yang cepat, rapi, dan mudah digunakan.',
                'photo' => null,
                'phone' => '+62 812-3456-7890',
                'location' => 'Padang, Indonesia',
                'github' => 'https://github.com/fauzan',
                'linkedin' => 'https://linkedin.com/in/fauzan',
                'instagram' => 'https://instagram.com/fauzan',
                'whatsapp' => 'https://wa.me/6281234567890',
                'cv_path' => null,
            ]
        );

        $projects = [
            [
                'title' => 'Aplikasi Todo Laravel',
                'short_desc' => 'Aplikasi manajemen tugas dengan kategori, prioritas, dan reminder.',
                'description' => "Aplikasi todo lengkap dibangun dengan Laravel dan Blade.\n\nFitur: CRUD tugas, kategori, prioritas, filter, dan dashboard statistik. Styling memakai Tailwind CSS dengan mode gelap.",
                'tech_stack' => ['Laravel', 'MySQL', 'Tailwind CSS'],
                'github_url' => 'https://github.com/fauzan/todo-laravel',
                'demo_url' => 'https://todo.fauzan.dev',
                'is_featured' => true,
            ],
            [
                'title' => 'Company Profile Sekolah',
                'short_desc' => 'Website profil sekolah dengan berita, galeri, dan PPDB online.',
                'description' => "Website company profile untuk sekolah, dilengkapi halaman berita, galeri foto, dan formulir PPDB online yang datanya masuk ke panel admin.",
                'tech_stack' => ['Laravel', 'Blade', 'Alpine.js'],
                'github_url' => 'https://github.com/fauzan/company-profile',
                'demo_url' => 'https://sekolah.fauzan.dev',
                'is_featured' => true,
            ],
            [
                'title' => 'Mini E-Commerce',
                'short_desc' => 'Katalog produk, keranjang, dan checkout sederhana.',
                'description' => "Prototipe e-commerce dengan katalog produk, pencarian, keranjang belanja, dan alur checkout. Panel admin untuk kelola produk dan pesanan.",
                'tech_stack' => ['Laravel', 'MySQL', 'Tailwind CSS'],
                'github_url' => 'https://github.com/fauzan/mini-ecommerce',
                'demo_url' => null,
                'is_featured' => true,
            ],
            [
                'title' => 'REST API Absensi',
                'short_desc' => 'API absensi karyawan dengan autentikasi token.',
                'description' => "REST API untuk sistem absensi: login token, clock-in/out dengan foto dan lokasi, rekap kehadiran, dan export laporan.",
                'tech_stack' => ['Laravel', 'Sanctum', 'MySQL'],
                'github_url' => 'https://github.com/fauzan/api-absensi',
                'demo_url' => null,
                'is_featured' => false,
            ],
            [
                'title' => 'Landing Page Freelance',
                'short_desc' => 'Landing page jasa dengan animasi dan form kontak.',
                'description' => "Landing page satu halaman untuk jasa freelance: hero animasi, daftar layanan, portofolio singkat, testimoni, dan form kontak.",
                'tech_stack' => ['HTML', 'Tailwind CSS', 'Alpine.js'],
                'github_url' => 'https://github.com/fauzan/landing-freelance',
                'demo_url' => 'https://jasa.fauzan.dev',
                'is_featured' => false,
            ],
            [
                'title' => 'Dashboard Admin',
                'short_desc' => 'Template dashboard dengan grafik dan manajemen user.',
                'description' => "Template dashboard admin: grafik statistik, tabel data dengan pagination, manajemen user dan role, serta mode gelap.",
                'tech_stack' => ['Laravel', 'Tailwind CSS', 'Chart.js'],
                'github_url' => 'https://github.com/fauzan/dashboard-admin',
                'demo_url' => null,
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $i => $p) {
            Project::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                $p + [
                    'image' => 'https://picsum.photos/seed/'.Str::slug($p['title']).'/800/600',
                    'sort_order' => $i,
                ]
            );
        }

        $experiences = [
            [
                'company' => 'Freelance',
                'position' => 'Web Developer',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'description' => 'Mengerjakan website company profile, landing page, dan aplikasi internal untuk klien UMKM.',
            ],
            [
                'company' => 'Laboratorium Komputer Kampus',
                'position' => 'Asisten Praktikum',
                'start_date' => '2023-08-01',
                'end_date' => '2024-12-01',
                'description' => 'Membantu praktikum pemrograman web: HTML, CSS, PHP dasar, dan MySQL untuk 40+ mahasiswa.',
            ],
            [
                'company' => 'Dinas Kominfo (Magang)',
                'position' => 'IT Support & Web',
                'start_date' => '2023-01-01',
                'end_date' => '2023-06-01',
                'description' => 'Membantu maintenance website instansi dan dokumentasi jaringan kantor.',
            ],
        ];

        foreach ($experiences as $i => $e) {
            Experience::updateOrCreate(
                ['company' => $e['company'], 'position' => $e['position']],
                $e + ['sort_order' => $i]
            );
        }

        $educations = [
            [
                'school' => 'Universitas Contoh Indonesia',
                'degree' => 'S1 Informatika',
                'year_start' => '2021',
                'year_end' => '2025',
                'description' => 'Fokus pada rekayasa perangkat lunak dan pengembangan web.',
            ],
            [
                'school' => 'SMK Negeri 1 Contoh',
                'degree' => 'Rekayasa Perangkat Lunak',
                'year_start' => '2018',
                'year_end' => '2021',
                'description' => 'Belajar dasar pemrograman, basis data, dan pembuatan aplikasi.',
            ],
        ];

        foreach ($educations as $i => $e) {
            Education::updateOrCreate(
                ['school' => $e['school'], 'degree' => $e['degree']],
                $e + ['sort_order' => $i]
            );
        }

        $skills = [
            ['name' => 'PHP', 'category' => 'backend', 'level' => 85],
            ['name' => 'Laravel', 'category' => 'backend', 'level' => 80],
            ['name' => 'MySQL', 'category' => 'backend', 'level' => 80],
            ['name' => 'REST API', 'category' => 'backend', 'level' => 75],
            ['name' => 'HTML & CSS', 'category' => 'frontend', 'level' => 90],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'level' => 90],
            ['name' => 'JavaScript', 'category' => 'frontend', 'level' => 75],
            ['name' => 'Alpine.js', 'category' => 'frontend', 'level' => 70],
            ['name' => 'Git', 'category' => 'tools', 'level' => 80],
            ['name' => 'Figma', 'category' => 'tools', 'level' => 65],
        ];

        foreach ($skills as $s) {
            Skill::updateOrCreate(['name' => $s['name']], $s);
        }
    }
}
