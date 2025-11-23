@extends('layouts.app')

@section('title', 'Beranda - Diskominfo Kab. Pemalang')

@section('content')
    <!-- MAIN LAYOUT -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid lg:grid-cols-3 gap-6">

            <!-- LEFT SECTION (2 COLUMNS) -->
            <div class="lg:col-span-2 space-y-6">

                <!-- HERO CARD -->
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 card-hover">
    <div class="relative h-80 bg-gradient-to-br from-blue-600 to-blue-900 flex items-center justify-center overflow-hidden">

        <!-- Gambar Struktur dengan Zoom Hover -->
        <img src="{{ asset('struktur.jpg') }}" alt="Struktur Organisasi Diskominfo Pemalang"
     class="absolute inset-0 w-full h-full object-cover z-0">
        <span class="absolute top-4 left-4 bg-black/70 backdrop-blur-sm text-white px-4 py-1.5 rounded-full text-xs font-semibold">
            STRUKTUR ORGANISASI
        </span>
    </div>

    <div class="p-6 text-center">
        <div class="flex gap-4 text-xs text-gray-500 mb-2 justify-center">
            <span>20 Agustus 2025</span>
            <span>•</span>
            <span>Bidang Sekretariat</span>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 mb-3 leading-tight">
            Struktur Organisasi Diskominfo Kabupaten Pemalang Tahun 2024
        </h2>
        <p class="text-gray-600 mb-4 leading-relaxed">
            Susunan organisasi, tugas, dan fungsi Dinas Komunikasi dan Informatika Kabupaten Pemalang
            sebagai acuan penyelenggaraan layanan informasi dan teknologi pemerintahan daerah.
        </p>
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <span class="text-xs text-gray-500">Terakhir diperbarui: 18 November 2025</span>
            <a href="#" class="bg-primary/10 hover:bg-primary hover:text-white text-primary px-5 py-2 rounded-full text-sm font-medium transition">
                Lihat struktur lengkap →
            </a>
        </div>
    </div>
</article>


                <!-- BERITA SECTION -->
                <div>
                    <div class="flex items-end justify-between mb-5">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Berita Terkini</h2>
                            <p class="text-sm text-gray-500 mt-1">Rilis resmi kegiatan &amp; informasi publik</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- BERITA UTAMA -->
                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <div class="h-56 bg-gradient-to-br from-primary to-blue-700 flex items-center justify-center">
                                <div class="text-white text-center font-semibold text-xl px-4">
                                    Dialog Radio BPS Pemalang
                                </div>
                            </div>
                            <div class="p-6">
                                <span class="inline-block bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide mb-3">
                                    Berita Utama
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                                    Dialog Radio, Kepala BPS Pemalang Promosikan Sejumlah Layanannya
                                </h3>
                                <div class="text-xs text-gray-500 mb-3">
                                    26 Maret 2025 • Kolaborasi Diskominfo &amp; BPS
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    Dalam dialog interaktif di radio daerah, Kepala BPS Kabupaten Pemalang memaparkan
                                    layanan statistik yang dapat dimanfaatkan masyarakat, pelaku usaha, maupun perangkat
                                    desa untuk pengambilan keputusan berbasis data.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <span class="text-xs text-gray-500">3 menit waktu baca</span>
                                    <a href="#" class="text-primary hover:text-blue-700 font-semibold text-sm transition">
                                        Baca selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </article>

                        <!-- BERITA LAINNYA -->
                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center">
                                <div class="text-white text-center font-semibold text-lg px-4">
                                    Diskominfo Gelar Apel Pagi
                                </div>
                            </div>
                            <div class="p-6">
                                <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide mb-3">
                                    Kegiatan
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                                    Diskominfo Gelar Apel Pagi dan Penandatanganan Pakta Integritas
                                </h3>
                                <div class="text-xs text-gray-500 mb-3">
                                    17 November 2025 • Kegiatan Rutin
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    Dalam rangka mewujudkan tata kelola pemerintahan yang bersih dan bebas korupsi, 
                                    Dinas Komunikasi dan Informatika menggelar apel pagi diikuti penandatanganan pakta 
                                    integritas oleh seluruh pegawai.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <span class="text-xs text-gray-500">2 menit waktu baca</span>
                                    <a href="#" class="text-green-600 hover:text-green-800 font-semibold text-sm transition">
                                        Baca selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </article>

                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center">
                                <div class="text-white text-center font-semibold text-lg px-4">
                                    Peta Rencana SPBE 2025
                                </div>
                            </div>
                            <div class="p-6">
                                <span class="inline-block bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide mb-3">
                                    SPBE
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                                    Diskominfo Gelar Desk Peta Rencana SPBE 2025
                                </h3>
                                <div class="text-xs text-gray-500 mb-3">
                                    30 Oktober 2025 • Program SPBE
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    Kegiatan desk peta rencana SPBE 2025 dilaksanakan sebagai upaya peningkatan kualitas 
                                    Sistem Pemerintahan Berbasis Elektronik di Kabupaten Pemalang dengan melibatkan 
                                    seluruh OPD.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <span class="text-xs text-gray-500">3 menit waktu baca</span>
                                    <a href="#" class="text-purple-600 hover:text-purple-800 font-semibold text-sm transition">
                                        Baca selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </article>

                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <div class="h-48 bg-gradient-to-br from-orange-500 to-orange-700 flex items-center justify-center">
                                <div class="text-white text-center font-semibold text-lg px-4">
                                    Penilaian EPSS Mandiri
                                </div>
                            </div>
                            <div class="p-6">
                                <span class="inline-block bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide mb-3">
                                    Evaluasi
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                                    Penilaian Visitasi EPSS Mandiri Diskominfo
                                </h3>
                                <div class="text-xs text-gray-500 mb-3">
                                    24 Oktober 2025 • Kinerja Dinas
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    Tim penilai melakukan visitasi untuk mengevaluasi implementasi EPSS (Evaluasi Pemerintahan 
                                    Dalam Pelaksanaan Sistem Pemerintahan) di lingkungan Dinas Komunikasi dan Informatika 
                                    Kabupaten Pemalang.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <span class="text-xs text-gray-500">2 menit waktu baca</span>
                                    <a href="#" class="text-orange-600 hover:text-orange-800 font-semibold text-sm transition">
                                        Baca selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </article>

                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <div class="h-48 bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center">
                                <div class="text-white text-center font-semibold text-lg px-4">
                                    Sosialisasi Literasi Digital
                                </div>
                            </div>
                            <div class="p-6">
                                <span class="inline-block bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide mb-3">
                                    Program
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                                    Sosialisasi Literasi Digital untuk Masyarakat Desa
                                </h3>
                                <div class="text-xs text-gray-500 mb-3">
                                    15 November 2025 • Program Unggulan
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    Diskominfo menggelar program sosialisasi literasi digital yang menyasar 12 kecamatan di 
                                    Kabupaten Pemalang untuk meningkatkan kemampuan masyarakat dalam memanfaatkan teknologi 
                                    informasi secara bijak dan produktif.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <span class="text-xs text-gray-500">4 menit waktu baca</span>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm transition">
                                        Baca selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <aside class="space-y-6">

                <!-- INFO PUBLIK CARD -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-primary text-white p-5">
                        <h3 class="text-lg font-bold">Info Publik</h3>
                        <p class="text-xs opacity-90 mt-1">Dokumen &amp; Pengumuman Terkini</p>
                    </div>
                    <div class="p-4 space-y-3 max-h-[500px] overflow-y-auto">
                        <a href="" class="block p-3 rounded-xl hover:bg-gray-50 transition border border-gray-100">
                            <div class="flex items-start gap-3">
                                <span class="bg-primary/10 text-primary px-2 py-1 rounded-lg text-xs font-semibold whitespace-nowrap mt-0.5">
                                    Infografis
                                </span>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-sm text-gray-900 mb-1">Penilaian Visitasi EPSS Mandiri Diskominfo</h4>
                                    <p class="text-xs text-gray-500">24 Oktober 2025 • Dokumen ringkas capaian kinerja</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="block p-3 rounded-xl hover:bg-gray-50 transition border border-gray-100">
                            <div class="flex items-start gap-3">
                                <span class="bg-primary/10 text-primary px-2 py-1 rounded-lg text-xs font-semibold whitespace-nowrap mt-0.5">
                                    Pengumuman
                                </span>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-sm text-gray-900 mb-1">Desk Peta Rencana SPBE 2025</h4>
                                    <p class="text-xs text-gray-500">30 Oktober 2025 • Jadwal dan materi pendampingan</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="block p-3 rounded-xl hover:bg-gray-50 transition border border-gray-100">
                            <div class="flex items-start gap-3">
                                <span class="bg-primary/10 text-primary px-2 py-1 rounded-lg text-xs font-semibold whitespace-nowrap mt-0.5">
                                    Laporan
                                </span>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-sm text-gray-900 mb-1">Monitoring Keterbukaan Informasi Publik</h4>
                                    <p class="text-xs text-gray-500">Triwulan III 2025 • Rekap permohonan</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="block p-3 rounded-xl hover:bg-gray-50 transition border border-gray-100">
                            <div class="flex items-start gap-3">
                                <span class="bg-primary/10 text-primary px-2 py-1 rounded-lg text-xs font-semibold whitespace-nowrap mt-0.5">
                                    Agenda
                                </span>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-sm text-gray-900 mb-1">Sosialisasi Literasi Digital Masyarakat Desa</h4>
                                    <p class="text-xs text-gray-500">November 2025 • 12 kecamatan sasaran</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="block p-3 rounded-xl hover:bg-gray-50 transition border border-gray-100">
                            <div class="flex items-start gap-3">
                                <span class="bg-primary/10 text-primary px-2 py-1 rounded-lg text-xs font-semibold whitespace-nowrap mt-0.5">
                                    PPID
                                </span>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-sm text-gray-900 mb-1">Standar Layanan Informasi Publik</h4>
                                    <p class="text-xs text-gray-500">Format permohonan, keberatan, dan penyelesaian</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- HIGHLIGHT NEWS -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="border-b border-gray-200">
                        <div class="flex">
                            <button class="flex-1 py-3 px-4 text-sm font-semibold bg-primary/10 text-primary border-b-2 border-primary">
                                Terbaru
                            </button>
                            <button class="flex-1 py-3 px-4 text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                                Populer
                            </button>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                        <a href="#" class="flex gap-3 p-4 hover:bg-gray-50 transition">
                            <div class="w-20 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex-shrink-0 flex items-center justify-center text-white text-xs font-bold">
                                Apel
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-sm text-gray-900 mb-1 line-clamp-2">Diskominfo Gelar Apel Pagi dan Penandatanganan Pakta Integritas</h4>
                                <p class="text-xs text-gray-500">17 November 2025</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex gap-3 p-4 hover:bg-gray-50 transition">
                            <div class="w-20 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex-shrink-0 flex items-center justify-center text-white text-xs font-bold">
                                SPBE
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-sm text-gray-900 mb-1 line-clamp-2">Diskominfo Gelar Desk Peta Rencana SPBE 2025</h4>
                                <p class="text-xs text-gray-500">30 Oktober 2025</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex gap-3 p-4 hover:bg-gray-50 transition">
                            <div class="w-20 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex-shrink-0 flex items-center justify-center text-white text-xs font-bold">
                                EPSS
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-sm text-gray-900 mb-1 line-clamp-2">Penilaian Visitasi EPSS Mandiri</h4>
                                <p class="text-xs text-gray-500">24 Oktober 2025</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- SPONSOR/PARTNER BANNER -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 text-center">Partner Kami</h3>
                    <img src="{{ asset('sponsor.png') }}" alt="Partner & Sponsor" class="w-full h-auto rounded-lg">
                </div>

                <!-- QUICK LINKS -->
                <div class="space-y-3">
                    <a href="#" class="block bg-primary text-white p-4 rounded-xl hover:shadow-lg transition">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold">Portal PPID</span>
                            <span class="text-2xl">→</span>
                        </div>
                    </a>
                    <a href="#" class="block bg-primary text-white p-4 rounded-xl hover:shadow-lg transition">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold">Pengaduan Online</span>
                            <span class="text-2xl">→</span>
                        </div>
                    </a>
                    <a href="#" class="block bg-primary text-white p-4 rounded-xl hover:shadow-lg transition">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold">Data Statistik</span>
                            <span class="text-2xl">→</span>
                        </div>
                    </a>
                </div>

            </aside>

        </div>
    </main>
@endsection
