@extends('layouts.app')

@section('title', 'Layanan Publik - Diskominfo Kab. Pemalang')

@section('content')

    <!-- HERO SECTION -->
    <section class="bg-gradient-to-br from-primary to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Layanan Publik</h1>
                <p class="text-lg text-blue-100 leading-relaxed">
                    Berbagai layanan digital dan informasi yang disediakan oleh Dinas Komunikasi dan Informatika 
                    Kabupaten Pemalang untuk kemudahan akses masyarakat.
                </p>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 py-12">

        <!-- LAYANAN GRID -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

            <!-- Layanan Permintaan Informasi Publik -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 text-white">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Layanan Permintaan Informasi Publik</h3>
                    <p class="text-sm text-blue-100">Akses informasi publik sesuai UU KIP</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                        Layanan permohonan informasi publik yang dikelola oleh PPID (Pejabat Pengelola Informasi dan Dokumentasi) 
                        sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.
                    </p>
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Formulir permohonan online</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Tracking status permohonan</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Maksimal 10 hari kerja</span>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center bg-primary hover:bg-blue-700 text-white py-2 rounded-lg font-medium transition">
                        Ajukan Permohonan
                    </a>
                </div>
            </div>

            <!-- Layanan Hotspot Area (Wifi Gratis) -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-br from-green-600 to-green-800 p-6 text-white">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Layanan Hotspot Area (Wifi Gratis)</h3>
                    <p class="text-sm text-green-100">Internet gratis di area publik</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                        Fasilitas internet gratis yang tersedia di berbagai titik area publik Kabupaten Pemalang 
                        untuk mendukung akses informasi masyarakat.
                    </p>
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Tersedia di alun-alun dan taman kota</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Kecepatan hingga 10 Mbps</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Akses 24 jam</span>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition">
                        Lihat Lokasi Hotspot
                    </a>
                </div>
            </div>

            <!-- Layanan Data Statistik Sektoral -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-br from-purple-600 to-purple-800 p-6 text-white">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Layanan Data Statistik Sektoral</h3>
                    <p class="text-sm text-purple-100">Data dan statistik daerah</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                        Penyediaan data dan statistik sektoral Kabupaten Pemalang yang dapat digunakan untuk 
                        keperluan penelitian, perencanaan, dan pengambilan keputusan.
                    </p>
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Data kependudukan dan demografi</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Data ekonomi dan sosial</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Format Excel dan PDF</span>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg font-medium transition">
                        Akses Data Statistik
                    </a>
                </div>
            </div>

            <!-- Layanan Email Pemerintah -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-br from-orange-600 to-orange-800 p-6 text-white">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Layanan Email Pemerintah</h3>
                    <p class="text-sm text-orange-100">Email resmi ASN</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                        Pembuatan dan pengelolaan email resmi dengan domain @pemalangkab.go.id untuk 
                        ASN di lingkungan Pemerintah Kabupaten Pemalang.
                    </p>
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Khusus ASN Pemkab Pemalang</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Kapasitas penyimpanan 15 GB</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Proses 1-3 hari kerja</span>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center bg-orange-600 hover:bg-orange-700 text-white py-2 rounded-lg font-medium transition">
                        Ajukan Pembuatan Email
                    </a>
                </div>
            </div>

            <!-- Layanan Website Pemerintah -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-br from-red-600 to-red-800 p-6 text-white">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Layanan Website Pemerintah</h3>
                    <p class="text-sm text-red-100">Pembuatan website OPD</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                        Layanan pembuatan, pengembangan, dan maintenance website untuk OPD di lingkungan 
                        Pemerintah Kabupaten Pemalang dengan domain .go.id.
                    </p>
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Design modern dan responsive</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Hosting dan maintenance gratis</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Pelatihan pengelolaan konten</span>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg font-medium transition">
                        Ajukan Pembuatan Website
                    </a>
                </div>
            </div>

            <!-- Layanan Aplikasi SPBE -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 p-6 text-white">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Layanan Aplikasi SPBE</h3>
                    <p class="text-sm text-indigo-100">Sistem informasi pemerintahan</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                        Pengembangan aplikasi dan sistem informasi berbasis elektronik untuk mendukung 
                        Sistem Pemerintahan Berbasis Elektronik (SPBE) di Kabupaten Pemalang.
                    </p>
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Aplikasi mobile dan web</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Integrasi sistem terpadu</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary font-bold mt-1">•</span>
                            <span class="text-gray-600">Konsultasi dan pendampingan</span>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-medium transition">
                        Konsultasi Aplikasi
                    </a>
                </div>
            </div>

        </div>

        <!-- INFORMASI TAMBAHAN -->
        <section class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Layanan</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h3 class="font-bold text-primary mb-3">Jam Operasional</h3>
                    <div class="space-y-2 text-sm text-gray-700">
                        <p>Senin - Kamis: 07.30 - 16.00 WIB</p>
                        <p>Jumat: 07.30 - 16.30 WIB</p>
                        <p>Sabtu, Minggu & Libur: Tutup</p>
                        <p class="text-primary font-semibold mt-3">Layanan online tersedia 24/7</p>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-primary mb-3">Kontak Layanan</h3>
                    <div class="space-y-2 text-sm text-gray-700">
                        <p>Telepon: (0284) 321234</p>
                        <p>Email: layanan@pemalangkab.go.id</p>
                        <p>WhatsApp: 0812-3456-7890</p>
                        <p class="text-primary font-semibold mt-3">Respon maksimal 1x24 jam</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="bg-gradient-to-br from-primary to-blue-800 rounded-2xl p-8 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Butuh Bantuan?</h2>
            <p class="text-blue-100 mb-6 max-w-2xl mx-auto">
                Tim kami siap membantu Anda dalam mengakses layanan publik yang tersedia. 
                Jangan ragu untuk menghubungi kami jika ada pertanyaan.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#" class="bg-white text-primary px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition shadow-lg">
                    Hubungi Kami
                </a>
                <a href="faq.html" class="bg-white/20 backdrop-blur-sm text-white px-8 py-3 rounded-full font-semibold hover:bg-white/30 transition">
                    Lihat FAQ
                </a>
            </div>
        </section>

    </main>

@endsection
