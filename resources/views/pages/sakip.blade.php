@extends('layouts.public')

@section('title', 'SAKIP - Diskominfo Kab. Pemalang')

@section('content')

    <!-- HERO SECTION -->
    <section class="bg-gradient-to-br from-primary to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">SAKIP</h1>
                <p class="text-xl font-semibold mb-2">Sistem Akuntabilitas Kinerja Instansi Pemerintah</p>
                <p class="text-lg text-blue-100 leading-relaxed">
                    Sistem yang digunakan untuk mengukur, menilai, dan mempertanggungjawabkan kinerja 
                    Dinas Komunikasi dan Informatika Kabupaten Pemalang secara transparan dan akuntabel.
                </p>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 py-12">

        <!-- INTRO SECTION -->
        <section class="bg-white rounded-2xl shadow-lg p-8 mb-8 card-hover">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Apa itu SAKIP?</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        SAKIP (Sistem Akuntabilitas Kinerja Instansi Pemerintah) adalah sistem yang 
                        digunakan pemerintah untuk mengukur, menilai, dan mempertanggungjawabkan 
                        kinerja/hasil kerja instansi pemerintah dalam mencapai tujuan dan sasaran 
                        pembangunan nasional.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Melalui SAKIP, transparansi dan akuntabilitas kinerja pemerintah dapat 
                        diukur dan dipertanggungjawabkan kepada publik secara sistematis.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-primary to-blue-700 rounded-xl p-8 text-white">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl font-bold">📊</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Transparansi</h3>
                        <p class="text-blue-100">Akuntabilitas Kinerja yang Terukur dan Transparan</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- KOMPONEN SAKIP -->
        <section class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Komponen SAKIP</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Perencanaan Kinerja</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Penetapan target kinerja yang jelas, terukur, dan dapat dicapai melalui 
                        penyusunan dokumen Rencana Strategis (Renstra) dan Rencana Kerja (Renja).
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pengukuran Kinerja</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Proses pengumpulan data dan informasi untuk mengetahui tingkat pencapaian 
                        kinerja melalui indikator kinerja yang telah ditetapkan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pelaporan Kinerja</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Penyampaian hasil pengukuran kinerja melalui Laporan Kinerja Instansi Pemerintah (LKjIP) 
                        secara berkala dan transparan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Evaluasi Kinerja</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Analisis pencapaian kinerja untuk mengidentifikasi hambatan, kendala, 
                        dan faktor pendukung pencapaian target.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Capaian Kinerja</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Hasil akhir dari implementasi program dan kegiatan yang dibandingkan 
                        dengan target yang telah ditetapkan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 card-hover">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Perbaikan Berkelanjutan</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Tindak lanjut dari hasil evaluasi untuk meningkatkan kinerja di 
                        periode berikutnya secara konsisten.
                    </p>
                </div>
            </div>
        </section>

        <!-- DOKUMEN SAKIP PER TAHUN -->
        <section class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Dokumen SAKIP</h2>
            
            <div class="space-y-4">
                <!-- Tahun 2025 -->
                <details class="group bg-white rounded-2xl shadow-lg overflow-hidden" open>
                    <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition bg-gradient-to-r from-blue-600 to-blue-800 text-white">
                        <h3 class="text-xl font-bold">Sakip Tahun 2025</h3>
                        <span class="arrow text-2xl">▼</span>
                    </summary>
                    <div class="p-6 space-y-3">
                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Rencana Strategis (Renstra) 2025</h4>
                                    <p class="text-sm text-gray-600">Dokumen perencanaan strategis 2025</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Rencana Kerja (Renja) 2025</h4>
                                    <p class="text-sm text-gray-600">Dokumen rencana kerja tahun 2025</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Perjanjian Kinerja 2025</h4>
                                    <p class="text-sm text-gray-600">Dokumen penetapan target kinerja</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Laporan Kinerja (LKjIP) Semester I 2025</h4>
                                    <p class="text-sm text-gray-600">Laporan pencapaian kinerja semester I</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>
                    </div>
                </details>

                <!-- Tahun 2024 -->
                <details class="group bg-white rounded-2xl shadow-lg overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition bg-gray-800 text-white">
                        <h3 class="text-xl font-bold">Sakip Tahun 2024</h3>
                        <span class="arrow text-2xl">▼</span>
                    </summary>
                    <div class="p-6 space-y-3">
                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📄</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Rencana Strategis (Renstra) 2024</h4>
                                    <p class="text-sm text-gray-600">Dokumen perencanaan strategis 2024</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📋</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Laporan Kinerja (LKjIP) 2024</h4>
                                    <p class="text-sm text-gray-600">Laporan pencapaian kinerja tahun 2024</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📊</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Evaluasi Kinerja 2024</h4>
                                    <p class="text-sm text-gray-600">Hasil evaluasi dan analisis kinerja</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>
                    </div>
                </details>

                <!-- Tahun 2023 -->
                <details class="group bg-white rounded-2xl shadow-lg overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition bg-gray-800 text-white">
                        <h3 class="text-xl font-bold">Sakip Tahun 2023</h3>
                        <span class="arrow text-2xl">▼</span>
                    </summary>
                    <div class="p-6 space-y-3">
                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📄</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Rencana Strategis (Renstra) 2023</h4>
                                    <p class="text-sm text-gray-600">Dokumen perencanaan strategis 2023</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📋</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Laporan Kinerja (LKjIP) 2023</h4>
                                    <p class="text-sm text-gray-600">Laporan pencapaian kinerja tahun 2023</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>
                    </div>
                </details>

                <!-- Tahun 2022 -->
                <details class="group bg-white rounded-2xl shadow-lg overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition bg-gray-800 text-white">
                        <h3 class="text-xl font-bold">Sakip Tahun 2022</h3>
                        <span class="arrow text-2xl">▼</span>
                    </summary>
                    <div class="p-6 space-y-3">
                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📄</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Rencana Strategis (Renstra) 2022</h4>
                                    <p class="text-sm text-gray-600">Dokumen perencanaan strategis 2022</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📋</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Laporan Kinerja (LKjIP) 2022</h4>
                                    <p class="text-sm text-gray-600">Laporan pencapaian kinerja tahun 2022</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>
                    </div>
                </details>

                <!-- Tahun 2021 -->
                <details class="group bg-white rounded-2xl shadow-lg overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition bg-gray-800 text-white">
                        <h3 class="text-xl font-bold">Sakip Tahun 2021</h3>
                        <span class="arrow text-2xl">▼</span>
                    </summary>
                    <div class="p-6 space-y-3">
                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📄</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Rencana Strategis (Renstra) 2021</h4>
                                    <p class="text-sm text-gray-600">Dokumen perencanaan strategis 2021</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-primary/5 rounded-lg transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <span class="text-2xl">📋</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 group-hover:text-primary transition">Laporan Kinerja (LKjIP) 2021</h4>
                                    <p class="text-sm text-gray-600">Laporan pencapaian kinerja tahun 2021</p>
                                </div>
                            </div>
                            <span class="text-primary">Download →</span>
                        </a>
                    </div>
                </details>
            </div>
        </section>

        <!-- MANFAAT SAKIP -->
        <section class="bg-gradient-to-br from-primary to-blue-800 rounded-2xl p-8 text-white mb-8">
            <h2 class="text-3xl font-bold mb-6 text-center">Manfaat SAKIP</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">Transparansi</h3>
                    <p class="text-sm text-blue-100">Kinerja pemerintah dapat diakses publik</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">Akuntabilitas</h3>
                    <p class="text-sm text-blue-100">Pertanggungjawaban yang jelas</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">Peningkatan Kinerja</h3>
                    <p class="text-sm text-blue-100">Evaluasi untuk perbaikan berkelanjutan</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">Kepercayaan Publik</h3>
                    <p class="text-sm text-blue-100">Meningkatkan trust masyarakat</p>
                </div>
            </div>
        </section>

    </main>

@endsection
