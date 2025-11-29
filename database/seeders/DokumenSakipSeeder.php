<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DokumenSakip;

class DokumenSakipSeeder extends Seeder
{
    public function run(): void
    {
        $dokumens = [
            [
                'judul' => 'Renstra Diskominfo 2021-2026',
                'jenis' => 'Renstra',
                'tahun' => 2021,
                'file_path' => 'dokumen_sakip/renstra_2021_2026.pdf',
                'ukuran_file' => 1024000,
                'keterangan' => 'Rencana Strategis Diskominfo Pemalang periode 2021-2026',
            ],
            [
                'judul' => 'RKT Diskominfo 2025',
                'jenis' => 'RKT',
                'tahun' => 2025,
                'file_path' => 'dokumen_sakip/rkt_2025.pdf',
                'ukuran_file' => 512000,
                'keterangan' => 'Rencana Kerja Tahunan Diskominfo tahun 2025',
            ],
            [
                'judul' => 'PK Diskominfo 2025',
                'jenis' => 'PK',
                'tahun' => 2025,
                'file_path' => 'dokumen_sakip/pk_2025.pdf',
                'ukuran_file' => 256000,
                'keterangan' => 'Perjanjian Kinerja Diskominfo tahun 2025',
            ],
            [
                'judul' => 'LKJIP Diskominfo 2024',
                'jenis' => 'LKJIP',
                'tahun' => 2024,
                'file_path' => 'dokumen_sakip/lkjip_2024.pdf',
                'ukuran_file' => 2048000,
                'keterangan' => 'Laporan Kinerja Instansi Pemerintah Diskominfo tahun 2024',
            ],
        ];

        foreach ($dokumens as $dokumen) {
            DokumenSakip::create($dokumen);
        }
    }
}
