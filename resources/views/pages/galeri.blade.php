@extends('layouts.public')

@section('title', 'Galeri - Diskominfo Kab. Pemalang')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary via-blue-700 to-blue-900 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri Foto</h1>
                <p class="text-lg md:text-xl text-blue-100">
                    Dokumentasi kegiatan dan momen penting Diskominfo Kabupaten Pemalang
                </p>
            </div>
        </div>
    </section>

    <!-- Galeri Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @if($galeris->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($galeris as $item)
                        <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="aspect-square">
                                <img src="{{ asset('storage/' . $item->gambar) }}" 
                                     alt="{{ $item->judul }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-lg font-bold mb-2">{{ $item->judul }}</h3>
                                    @if($item->kategori)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-accent text-white mb-2">
                                            {{ $item->kategori }}
                                        </span>
                                    @endif
                                    @if($item->deskripsi)
                                        <p class="text-sm text-gray-200 line-clamp-2">{{ $item->deskripsi }}</p>
                                    @endif
                                    <p class="text-xs text-gray-300 mt-2">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $item->tanggal->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($galeris->hasPages())
                    <div class="mt-12">
                        {{ $galeris->links() }}
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Galeri</h3>
                    <p class="text-gray-500">Galeri foto akan segera ditambahkan</p>
                </div>
            @endif
        </div>
    </section>
@endsection
