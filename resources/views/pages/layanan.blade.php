@extends('layouts.public')

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

        @if($layanans->isEmpty())
            <div class="bg-blue-50 border-l-4 border-blue-500 p-8 rounded-lg mb-8">
                <div class="flex items-start gap-4">
                    <svg class="w-8 h-8 text-blue-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Data Layanan Belum Tersedia</h3>
                        <p class="text-gray-700 mb-4">
                            Saat ini belum ada layanan publik yang ditambahkan. Admin dapat menambahkan layanan melalui dashboard admin.
                        </p>
                        <p class="text-sm text-gray-600">
                            Untuk menambahkan layanan: Login ke Dashboard → Menu Layanan → Tambah Layanan Baru
                        </p>
                    </div>
                </div>
            </div>
        @else
            <!-- LAYANAN GRID -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

                @foreach($layanans as $layanan)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                        @if($layanan->icon)
                            <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 text-white">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                                    <img src="{{ Storage::url($layanan->icon) }}" alt="{{ $layanan->nama }}" class="w-8 h-8 object-contain">
                                </div>
                                <h3 class="text-xl font-bold mb-2">{{ $layanan->nama }}</h3>
                            </div>
                        @else
                            <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 text-white">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold mb-2">{{ $layanan->nama }}</h3>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="text-gray-700 text-sm mb-4 leading-relaxed">
                                {!! nl2br(e($layanan->deskripsi)) !!}
                            </div>
                            
                            @if($layanan->link)
                                <a href="{{ $layanan->link }}" 
                                   target="_blank"
                                   class="inline-flex items-center gap-2 bg-primary hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors text-sm font-medium">
                                    <span>Akses Layanan</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        @endif

        <!-- INFO SECTION -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
            <div class="max-w-3xl mx-auto text-center">
                <svg class="w-16 h-16 text-primary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Butuh Bantuan?</h3>
                <p class="text-gray-600 mb-6">
                    Tim kami siap membantu Anda dalam mengakses layanan atau memberikan informasi lebih lanjut.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="tel:+6285123456789" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>Hubungi Kami</span>
                    </a>
                    <a href="{{ route('faq') }}" class="inline-flex items-center gap-2 bg-primary hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Kirim Pesan</span>
                    </a>
                </div>
            </div>
        </div>

    </main>

@endsection
