<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanans = [
            [
                'nama' => 'Layanan Permintaan Informasi Publik',
                'deskripsi' => 'Layanan permohonan informasi publik yang dikelola oleh PPID (Pejabat Pengelola Informasi dan Dokumentasi) sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.',
                'link' => 'https://ppid.pemalangkab.go.id',
                'aktif' => true,
                'urutan' => 1,
            ],
            [
                'nama' => 'Layanan Hotspot Area (Wifi Gratis)',
                'deskripsi' => 'Penyediaan akses internet gratis melalui WiFi di area-area publik strategis untuk mendukung digitalisasi dan akses informasi bagi masyarakat.',
                'link' => 'https://wifi.pemalangkab.go.id',
                'aktif' => true,
                'urutan' => 2,
            ],
            [
                'nama' => 'Layanan Data Statistik Sektoral',
                'deskripsi' => 'Penyediaan data dan statistik sektoral Kabupaten Pemalang yang dapat diakses oleh masyarakat untuk berbagai keperluan penelitian, analisis, dan pengambilan keputusan.',
                'link' => 'https://data.pemalangkab.go.id',
                'aktif' => true,
                'urutan' => 3,
            ],
            [
                'nama' => 'Layanan Email Pemerintah',
                'deskripsi' => 'Pembuatan dan pengelolaan email resmi dengan domain @pemalangkab.go.id untuk OPD dan pegawai pemerintah Kabupaten Pemalang.',
                'link' => 'https://mail.pemalangkab.go.id',
                'aktif' => true,
                'urutan' => 4,
            ],
            [
                'nama' => 'Layanan Website Pemerintah',
                'deskripsi' => 'Layanan pembuatan, pengembangan, dan pemeliharaan website resmi untuk OPD di lingkungan Pemerintah Kabupaten Pemalang.',
                'link' => 'https://pemalangkab.go.id',
                'aktif' => true,
                'urutan' => 5,
            ],
            [
                'nama' => 'Layanan Aplikasi SPBE',
                'deskripsi' => 'Pengembangan aplikasi dan sistem informasi berbasis elektronik untuk mendukung Sistem Pemerintahan Berbasis Elektronik (SPBE) di Kabupaten Pemalang.',
                'link' => 'https://spbe.pemalangkab.go.id',
                'aktif' => true,
                'urutan' => 6,
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}
