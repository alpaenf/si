@extends('layouts.public')

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

                    @if($beritas->count() > 0)
                        <div class="space-y-6">
                            @foreach($beritas as $index => $berita)
                                <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                                    <!-- Image -->
                                    @if($berita->gambar)
                                        <div class="h-56 overflow-hidden">
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="h-56 bg-gradient-to-br from-primary to-blue-700 flex items-center justify-center">
                                            <div class="text-white text-center font-semibold text-xl px-4">
                                                {{ $berita->judul }}
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Content -->
                                    <div class="p-6">
                                        <!-- Tags -->
                                        @if(is_array($berita->tags) && count($berita->tags) > 0)
                                            <span class="inline-block bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide mb-3">
                                                {{ ucfirst($berita->tags[0]) }}
                                            </span>
                                        @endif

                                        <!-- Title -->
                                        <h3 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                                            {{ $berita->judul }}
                                        </h3>

                                        <!-- Meta -->
                                        <div class="text-xs text-gray-500 mb-3">
                                            {{ $berita->tanggal->format('d F Y') }} • {{ $berita->created_at->diffForHumans() }}
                                        </div>

                                        <!-- Excerpt -->
                                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                            {{ Str::limit(strip_tags($berita->deskripsi), 200) }}
                                        </p>

                                        <!-- Read More -->
                                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                            <span class="text-xs text-gray-500">{{ ceil(str_word_count(strip_tags($berita->deskripsi)) / 200) }} menit waktu baca</span>
                                            <a href="{{ route('berita.detail', $berita->id) }}" class="text-primary hover:text-blue-700 font-semibold text-sm transition">
                                                Baca selengkapnya →
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                            <!-- Button Lihat Semua Berita -->
                            <div class="text-center pt-4">
                                <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-primary hover:bg-blue-700 text-white rounded-xl transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 font-semibold text-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                    Lihat Semua Berita
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Berita</h3>
                            <p class="text-gray-600">Berita akan ditampilkan di sini setelah dipublikasikan</p>
                        </div>
                    @endif
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
