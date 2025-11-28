@extends('layouts.public')

@section('title', 'Semua Berita - Diskominfo Kab. Pemalang')

@section('content')
    <!-- BREADCRUMB -->
    <div class="bg-gradient-to-r from-primary to-blue-700 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center text-white text-sm mb-4">
                <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span>Berita</span>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Berita & Informasi</h1>
            <p class="text-white/90 text-lg">Informasi terbaru dan kegiatan Diskominfo Kabupaten Pemalang</p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 py-12">
        
        <!-- Stats & Filter Section -->
        <div class="mb-8">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Semua Berita</h2>
                        <p id="beritaCount" class="text-sm text-gray-600 mt-1">
                            Menampilkan berita...
                        </p>
                    </div>
                </div>

                <!-- Search & Filter -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari berita..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <input type="date" id="dateFilter" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                    </div>
                </div>

                <!-- Reset Filter Button -->
                <div class="mt-4 flex gap-3">
                    <button onclick="resetFilters()" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Reset Filter
                    </button>
                    <div id="filterInfo" class="hidden items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="filterInfoText"></span>
                    </div>
                </div>
            </div>
        </div>

        @if($beritas->count() > 0)
            <!-- Berita Grid -->
            <div id="beritaContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($beritas as $berita)
                    <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <!-- Image -->
                        <a href="{{ route('berita.detail', $berita->id) }}" class="block">
                            @if($berita->gambar)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-primary to-blue-700 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                            @endif
                        </a>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Tags & Date -->
                            <div class="flex items-center justify-between mb-3">
                                @if(is_array($berita->tags) && count($berita->tags) > 0)
                                    <span class="inline-block px-3 py-1 bg-primary/10 text-primary rounded-full text-xs font-bold uppercase tracking-wide">
                                        {{ ucfirst($berita->tags[0]) }}
                                    </span>
                                @endif
                                <span class="text-xs text-gray-500">
                                    {{ $berita->tanggal->format('d M Y') }}
                                </span>
                            </div>

                            <!-- Title -->
                            <a href="{{ route('berita.detail', $berita->id) }}" class="block">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug hover:text-primary transition line-clamp-2 min-h-[3.5rem]">
                                    {{ $berita->judul }}
                                </h3>
                            </a>

                            <!-- Excerpt -->
                            <p class="text-sm text-gray-600 mb-4 line-clamp-3 min-h-[4rem]">
                                {{ Str::limit(strip_tags($berita->deskripsi), 120) }}
                            </p>

                            <!-- Read More -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-500">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ ceil(str_word_count(strip_tags($berita->deskripsi)) / 200) }} min baca
                                </span>
                                <a href="{{ route('berita.detail', $berita->id) }}" class="text-primary hover:text-blue-700 font-semibold text-sm transition inline-flex items-center gap-1">
                                    Baca
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div id="paginationContainer" class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-600">
                        Menampilkan <span class="font-semibold">{{ $beritas->firstItem() ?? 0 }}</span> sampai <span class="font-semibold">{{ $beritas->lastItem() ?? 0 }}</span> dari <span class="font-semibold">{{ $beritas->total() }}</span> berita
                    </div>
                    
                    <div class="flex gap-2">
                        @if ($beritas->onFirstPage())
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed" disabled>
                                ← Sebelumnya
                            </button>
                        @else
                            <a href="{{ $beritas->previousPageUrl() }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                                ← Sebelumnya
                            </a>
                        @endif

                        @foreach ($beritas->getUrlRange(1, $beritas->lastPage()) as $page => $url)
                            @if ($page == $beritas->currentPage())
                                <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($beritas->hasMorePages())
                            <a href="{{ $beritas->nextPageUrl() }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                                Selanjutnya →
                            </a>
                        @else
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed" disabled>
                                Selanjutnya →
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Berita</h3>
                <p class="text-gray-600 mb-6">Berita akan ditampilkan di sini setelah dipublikasikan</p>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </main>

    <script>
        let searchTimeout;
        let currentPage = 1;

        // Load berita dengan filter
        function loadBerita(page = 1) {
            const searchQuery = document.getElementById('searchInput').value;
            const dateFilter = document.getElementById('dateFilter').value;

            // Update URL params tanpa reload
            const url = new URL(window.location.href);
            if (searchQuery) url.searchParams.set('search', searchQuery);
            else url.searchParams.delete('search');
            if (dateFilter) url.searchParams.set('date', dateFilter);
            else url.searchParams.delete('date');
            url.searchParams.set('page', page);
            window.history.pushState({}, '', url);

            // Show loading state
            const container = document.getElementById('beritaContainer');
            container.innerHTML = `
                <div class="col-span-full flex justify-center items-center py-12">
                    <div class="text-center">
                        <svg class="animate-spin h-12 w-12 text-primary mx-auto mb-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <p class="text-gray-600 font-medium">Memuat berita...</p>
                    </div>
                </div>
            `;

            // Fetch data
            fetch(`/berita?search=${encodeURIComponent(searchQuery)}&date=${encodeURIComponent(dateFilter)}&page=${page}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                displayBerita(data.beritas);
                displayPagination(data.pagination);
                updateFilterInfo(searchQuery, dateFilter, data.pagination.total);
                updateBeritaCount(data.pagination);
            })
            .catch(error => {
                console.error('Error:', error);
                container.innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <div class="text-red-600 mb-4">
                            <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="font-semibold text-lg">Terjadi kesalahan saat memuat berita</p>
                        </div>
                    </div>
                `;
            });
        }

        // Display berita cards
        function displayBerita(beritas) {
            const container = document.getElementById('beritaContainer');
            
            if (beritas.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full">
                        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Tidak Ada Berita Ditemukan</h3>
                            <p class="text-gray-600 mb-6">Coba ubah kata kunci pencarian atau filter tanggal Anda</p>
                        </div>
                    </div>
                `;
                return;
            }

            container.innerHTML = beritas.map(berita => `
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <a href="/berita/${berita.id}" class="block">
                        ${berita.gambar 
                            ? `<div class="h-48 overflow-hidden">
                                <img src="/storage/${berita.gambar}" alt="${berita.judul}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                               </div>`
                            : `<div class="h-48 bg-gradient-to-br from-primary to-blue-700 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                               </div>`
                        }
                    </a>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            ${berita.tags && berita.tags.length > 0
                                ? `<span class="inline-block px-3 py-1 bg-primary/10 text-primary rounded-full text-xs font-bold uppercase tracking-wide">
                                    ${berita.tags[0].charAt(0).toUpperCase() + berita.tags[0].slice(1)}
                                   </span>`
                                : ''
                            }
                            <span class="text-xs text-gray-500">${berita.tanggal_formatted}</span>
                        </div>
                        <a href="/berita/${berita.id}" class="block">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug hover:text-primary transition line-clamp-2 min-h-[3.5rem]">
                                ${berita.judul}
                            </h3>
                        </a>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3 min-h-[4rem]">
                            ${berita.excerpt}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <span class="text-xs text-gray-500">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                ${berita.read_time} min baca
                            </span>
                            <a href="/berita/${berita.id}" class="text-primary hover:text-blue-700 font-semibold text-sm transition inline-flex items-center gap-1">
                                Baca
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            `).join('');
        }

        // Display pagination
        function displayPagination(pagination) {
            const container = document.getElementById('paginationContainer');
            
            if (pagination.last_page <= 1) {
                container.style.display = 'none';
                return;
            }

            container.style.display = 'block';
            
            let paginationHTML = `
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-600">
                        Menampilkan <span class="font-semibold">${pagination.from || 0}</span> sampai 
                        <span class="font-semibold">${pagination.to || 0}</span> dari 
                        <span class="font-semibold">${pagination.total}</span> berita
                    </div>
                    <div class="flex gap-2">
            `;

            // Previous button
            if (pagination.current_page > 1) {
                paginationHTML += `
                    <button onclick="loadBerita(${pagination.current_page - 1})" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                        ← Sebelumnya
                    </button>
                `;
            } else {
                paginationHTML += `
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed" disabled>
                        ← Sebelumnya
                    </button>
                `;
            }

            // Page numbers
            for (let i = 1; i <= pagination.last_page; i++) {
                if (i === pagination.current_page) {
                    paginationHTML += `
                        <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium">
                            ${i}
                        </button>
                    `;
                } else if (
                    i === 1 || 
                    i === pagination.last_page || 
                    (i >= pagination.current_page - 1 && i <= pagination.current_page + 1)
                ) {
                    paginationHTML += `
                        <button onclick="loadBerita(${i})" 
                            class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                            ${i}
                        </button>
                    `;
                } else if (i === pagination.current_page - 2 || i === pagination.current_page + 2) {
                    paginationHTML += `<span class="px-2 text-gray-400">...</span>`;
                }
            }

            // Next button
            if (pagination.current_page < pagination.last_page) {
                paginationHTML += `
                    <button onclick="loadBerita(${pagination.current_page + 1})" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                        Selanjutnya →
                    </button>
                `;
            } else {
                paginationHTML += `
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed" disabled>
                        Selanjutnya →
                    </button>
                `;
            }

            paginationHTML += `</div></div>`;
            container.innerHTML = paginationHTML;
        }

        // Update filter info
        function updateFilterInfo(search, date, total) {
            const filterInfo = document.getElementById('filterInfo');
            const filterInfoText = document.getElementById('filterInfoText');
            
            if (!search && !date) {
                filterInfo.classList.add('hidden');
                filterInfo.classList.remove('flex');
                return;
            }

            filterInfo.classList.remove('hidden');
            filterInfo.classList.add('flex');

            let infoText = `Menampilkan ${total} berita`;
            if (search) infoText += ` dengan kata kunci "${search}"`;
            if (date) infoText += ` pada tanggal ${formatDate(date)}`;
            
            filterInfoText.textContent = infoText;
        }

        // Update berita count
        function updateBeritaCount(pagination) {
            const beritaCount = document.getElementById('beritaCount');
            beritaCount.textContent = `Menampilkan ${pagination.from || 0} sampai ${pagination.to || 0} dari ${pagination.total} berita`;
        }

        // Format date untuk display
        function formatDate(dateString) {
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const date = new Date(dateString);
            return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
        }

        // Reset filters
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('dateFilter').value = '';
            loadBerita(1);
        }

        // Event listeners
        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                loadBerita(1);
            }, 500); // Delay 500ms untuk mengurangi request
        });

        document.getElementById('dateFilter').addEventListener('change', function() {
            loadBerita(1);
        });

        // Load initial data on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Check if there are URL params
            const urlParams = new URLSearchParams(window.location.search);
            const search = urlParams.get('search');
            const date = urlParams.get('date');
            const page = urlParams.get('page') || 1;

            if (search) document.getElementById('searchInput').value = search;
            if (date) document.getElementById('dateFilter').value = date;

            loadBerita(page);
        });
    </script>
@endsection
