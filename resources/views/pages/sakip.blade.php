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
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Transparansi</h3>
                        <p class="text-blue-100">Akuntabilitas Kinerja yang Terukur dan Transparan</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- DOKUMEN SAKIP SECTION -->
        <section class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Dokumen SAKIP</h2>
            
            @if($dokumenSakip->isEmpty())
                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-lg">
                    <p class="text-gray-700 text-center">Belum ada dokumen SAKIP yang tersedia saat ini.</p>
                </div>
            @else
                <!-- Filter by Year -->
                <div class="mb-6">
                    <div class="flex flex-wrap gap-2">
                        @php
                            $years = $dokumenSakip->pluck('tahun')->unique()->sort()->reverse();
                            $selectedYear = request('tahun', $years->first());
                        @endphp
                        <a href="{{ route('sakip') }}" 
                           class="px-4 py-2 rounded-lg {{ !request('tahun') ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition-colors">
                            Semua
                        </a>
                        @foreach($years as $year)
                            <a href="{{ route('sakip', ['tahun' => $year]) }}" 
                               class="px-4 py-2 rounded-lg {{ request('tahun') == $year ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition-colors">
                                {{ $year }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Filter by Type -->
                @php
                    $filteredDokumen = $dokumenSakip;
                    if(request('tahun')) {
                        $filteredDokumen = $filteredDokumen->where('tahun', request('tahun'));
                    }
                    $groupedDokumen = $filteredDokumen->groupBy('jenis');
                @endphp

                @foreach(['Renstra', 'RKT', 'PK', 'LKJIP'] as $jenis)
                    @if(isset($groupedDokumen[$jenis]) && $groupedDokumen[$jenis]->isNotEmpty())
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>
                                    @if($jenis == 'Renstra') Rencana Strategis (Renstra)
                                    @elseif($jenis == 'RKT') Rencana Kerja Tahunan (RKT)
                                    @elseif($jenis == 'PK') Perjanjian Kinerja (PK)
                                    @else Laporan Kinerja Instansi Pemerintah (LKJIP)
                                    @endif
                                </span>
                            </h3>
                            
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Dokumen</th>
                                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran</th>
                                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($groupedDokumen[$jenis] as $dokumen)
                                                <tr class="hover:bg-gray-50 transition-colors">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $dokumen->tahun }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-700">
                                                        <div>
                                                            <div class="font-medium">{{ $dokumen->judul }}</div>
                                                            @if($dokumen->keterangan)
                                                                <div class="text-gray-500 text-xs mt-1">{{ $dokumen->keterangan }}</div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $dokumen->formatBytes() }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                        <a href="{{ Storage::url($dokumen->file_path) }}" 
                                                           target="_blank"
                                                           class="inline-flex items-center gap-2 bg-primary hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                            </svg>
                                                            <span>Unduh</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </section>

        <!-- INFO SECTION -->
        <section class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
            <div class="max-w-3xl mx-auto text-center">
                <svg class="w-16 h-16 text-primary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Butuh Informasi Lebih Lanjut?</h3>
                <p class="text-gray-600 mb-6">
                    Untuk informasi lebih detail tentang SAKIP atau dokumen terkait, silakan hubungi kami.
                </p>
                    <a href="{{ route('faq') }}" class="inline-flex items-center gap-2 bg-primary hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>Hubungi Kami</span>
                </a>
            </div>
        </section>

    </main>

@endsection
