@extends('layouts.admin')

@section('title', 'Dashboard Admin - Diskominfo Kab. Pemalang')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Selamat datang, ' . Auth::user()->name)

@section('content')
    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Berita -->
        <div class="bg-white rounded-2xl shadow-lg p-6 card-hover border-l-4 border-blue-500">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">+12%</span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Total Berita</h3>
            <p class="text-3xl font-bold text-gray-900">156</p>
            <p class="text-xs text-gray-500 mt-2">42 berita bulan ini</p>
        </div>

        <!-- Total Pengunjung -->
        <div class="bg-white rounded-2xl shadow-lg p-6 card-hover border-l-4 border-green-500">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">+24%</span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Pengunjung</h3>
            <p class="text-3xl font-bold text-gray-900">12,547</p>
            <p class="text-xs text-gray-500 mt-2">3,421 pengunjung bulan ini</p>
        </div>

        <!-- Layanan Aktif -->
        <div class="bg-white rounded-2xl shadow-lg p-6 card-hover border-l-4 border-purple-500">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Aktif</span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Layanan</h3>
            <p class="text-3xl font-bold text-gray-900">8</p>
            <p class="text-xs text-gray-500 mt-2">Semua layanan berjalan</p>
        </div>

        <!-- Permohonan PPID -->
        <div class="bg-white rounded-2xl shadow-lg p-6 card-hover border-l-4 border-orange-500">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">5 Pending</span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Permohonan PPID</h3>
            <p class="text-3xl font-bold text-gray-900">23</p>
            <p class="text-xs text-gray-500 mt-2">18 selesai, 5 proses</p>
        </div>
    </div>

    <!-- Chart Area -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Statistik Pengunjung</h3>
                <p class="text-sm text-gray-500">Data 30 hari terakhir</p>
            </div>
            <div class="flex gap-2">
                <button class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-blue-700 transition">Hari</button>
                <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg transition">Minggu</button>
                <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg transition">Bulan</button>
            </div>
        </div>
        
        <!-- Simple Chart Placeholder -->
        <div class="h-96 bg-gradient-to-br from-primary/5 to-blue-50 rounded-xl flex items-center justify-center border border-gray-200">
            <div class="text-center">
                <svg class="w-20 h-20 mx-auto text-primary mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <p class="text-gray-600 font-medium text-lg mb-2">Chart akan ditampilkan di sini</p>
                <p class="text-sm text-gray-500">Integrasikan dengan Chart.js atau ApexCharts untuk visualisasi data</p>
            </div>
        </div>
    </div>
@endsection
