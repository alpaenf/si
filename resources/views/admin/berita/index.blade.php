@extends('layouts.admin')

@section('title', 'Kelola Berita - Dashboard Admin')
@section('page-title', 'Kelola Berita')
@section('page-subtitle', 'Manajemen berita dan artikel Diskominfo')

@section('content')
    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-3"></div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center p-4" style="display: none;">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 transform transition-all">
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Hapus Berita?</h3>
                <p class="text-gray-600 mb-1">Anda yakin ingin menghapus berita:</p>
                <p id="deleteBeritaTitle" class="font-semibold text-gray-900 mb-4"></p>
                <p class="text-sm text-red-600 mb-6">Tindakan ini tidak dapat dibatalkan!</p>
                
                <div class="flex items-center gap-3">
                    <button onclick="closeDeleteModal()" class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold">
                        Batal
                    </button>
                    <button onclick="submitDelete()" class="flex-1 px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl transition font-semibold shadow-lg">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Actions -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="text-gray-600">Kelola semua berita, artikel, dan informasi publik yang dipublikasikan di website</p>
        </div>
        <button onclick="openModal()" class="flex items-center gap-2 px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 font-semibold">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Berita
        </button>
    </div>

    <!-- Filter & Search -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Search -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Cari Berita</label>
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Cari judul berita..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Filter Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <select id="statusFilter" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                    <option value="">Semua Status</option>
                    <option value="published">Dipublikasikan</option>
                    <option value="draft">Draft</option>
                </select>
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

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Berita</p>
                    <p id="totalCount" class="text-3xl font-bold text-gray-900">{{ $beritas->total() }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Dipublikasikan</p>
                    <p id="publishedCount" class="text-3xl font-bold text-gray-900">{{ $beritas->where('status', 'published')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Draft</p>
                    <p id="draftCount" class="text-3xl font-bold text-gray-900">{{ $beritas->where('status', 'draft')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita Grid -->
    <div class="mb-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900">Daftar Berita</h3>
            <div id="beritaInfo" class="text-sm text-gray-600">
                Menampilkan {{ $beritas->firstItem() ?? 0 }} sampai {{ $beritas->lastItem() ?? 0 }} dari {{ $beritas->total() }} berita
            </div>
        </div>

        <!-- Grid 3x3 -->
        @if($beritas->count() > 0)
            <div id="beritaGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($beritas as $berita)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <!-- Image -->
                    <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600 overflow-hidden">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4">
                            @if($berita->status === 'published')
                                <span class="inline-block px-3 py-1 bg-green-500 text-white rounded-full text-xs font-semibold shadow-lg">Published</span>
                            @else
                                <span class="inline-block px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-semibold shadow-lg">Draft</span>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Tags & Date -->
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex flex-wrap gap-1">
                                @if(is_array($berita->tags) && count($berita->tags) > 0)
                                    @foreach(array_slice($berita->tags, 0, 2) as $tag)
                                        <span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                            {{ ucfirst($tag) }}
                                        </span>
                                    @endforeach
                                    @if(count($berita->tags) > 2)
                                        <span class="inline-block px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-semibold">
                                            +{{ count($berita->tags) - 2 }}
                                        </span>
                                    @endif
                                @endif
                            </div>
                            <span class="text-xs text-gray-500">
                                {{ $berita->created_at->format('d M Y') }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h4 class="font-bold text-gray-900 mb-2 line-clamp-2 min-h-[3rem]">
                            {{ $berita->judul }}
                        </h4>

                        <!-- Excerpt -->
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2 min-h-[2.5rem]">
                            {{ Str::limit(strip_tags($berita->deskripsi), 100) }}
                        </p>

                        <!-- Actions -->
                        <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
                            <button onclick="editBerita({{ $berita->id }})" class="flex-1 flex items-center justify-center gap-2 px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span class="text-sm font-medium">Edit</span>
                            </button>
                            <a href="{{ route('admin.berita.show', $berita->id) }}" class="flex-1 flex items-center justify-center gap-2 px-4 py-2 text-green-600 hover:bg-green-50 rounded-lg transition" title="Lihat">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="text-sm font-medium">Lihat</span>
                            </a>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus" onclick="confirmDelete({{ $berita->id }}, '{{ $berita->judul }}')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            <!-- Hidden Delete Form -->
                            <form id="delete-form-{{ $berita->id }}" action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div id="paginationContainer" class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-600">
                        Menampilkan <span class="font-semibold">{{ $beritas->firstItem() ?? 0 }}</span> sampai <span class="font-semibold">{{ $beritas->lastItem() ?? 0 }}</span> dari <span class="font-semibold">{{ $beritas->total() }}</span> hasil
                    </div>
                    <div class="flex gap-2">
                        @if ($beritas->onFirstPage())
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed" disabled>
                                Sebelumnya
                            </button>
                        @else
                            <a href="{{ $beritas->previousPageUrl() }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                                Sebelumnya
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
                                Selanjutnya
                            </a>
                        @else
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed" disabled>
                                Selanjutnya
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
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Berita</h3>
                <p class="text-gray-600 mb-6">Mulai tambahkan berita pertama Anda</p>
                <button onclick="openModal()" class="inline-flex items-center gap-2 px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Berita
                </button>
            </div>
        @endif
    </div>

    <!-- Include Modal Create Berita -->
    @include('admin.berita.create')
    
    <!-- Include Modal Edit Berita -->
    @include('admin.berita.edit')

    <script>
        let searchTimeout;
        let currentPage = 1;

        // Load berita dengan filter
        function loadBerita(page = 1) {
            const searchQuery = document.getElementById('searchInput').value;
            const statusFilter = document.getElementById('statusFilter').value;

            // Update URL params tanpa reload
            const url = new URL(window.location.href);
            if (searchQuery) url.searchParams.set('search', searchQuery);
            else url.searchParams.delete('search');
            if (statusFilter) url.searchParams.set('status', statusFilter);
            else url.searchParams.delete('status');
            url.searchParams.set('page', page);
            window.history.pushState({}, '', url);

            // Show loading state
            const container = document.getElementById('beritaGrid');
            if (container) {
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
            }

            // Fetch data
            fetch(`/dashboard/berita?search=${encodeURIComponent(searchQuery)}&status=${encodeURIComponent(statusFilter)}&page=${page}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                displayBerita(data.beritas);
                displayPagination(data.pagination);
                updateStats(data.stats);
                updateFilterInfo(searchQuery, statusFilter, data.pagination.total);
                updateBeritaInfo(data.pagination);
            })
            .catch(error => {
                console.error('Error:', error);
                if (container) {
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
                }
            });
        }

        // Display berita cards
        function displayBerita(beritas) {
            const container = document.getElementById('beritaGrid');
            if (!container) return;

            if (beritas.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full">
                        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak Ada Berita Ditemukan</h3>
                            <p class="text-gray-600 mb-6">Coba ubah kata kunci pencarian atau filter status Anda</p>
                        </div>
                    </div>
                `;
                return;
            }

            container.innerHTML = beritas.map(berita => `
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600 overflow-hidden">
                        ${berita.gambar 
                            ? `<img src="/storage/${berita.gambar}" alt="${berita.judul}" class="w-full h-full object-cover">`
                            : `<div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                               </div>`
                        }
                        <div class="absolute top-4 right-4">
                            ${berita.status === 'published'
                                ? '<span class="inline-block px-3 py-1 bg-green-500 text-white rounded-full text-xs font-semibold shadow-lg">Published</span>'
                                : '<span class="inline-block px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-semibold shadow-lg">Draft</span>'
                            }
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex flex-wrap gap-1">
                                ${berita.tags && berita.tags.length > 0
                                    ? berita.tags.slice(0, 2).map(tag => 
                                        `<span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                            ${tag.charAt(0).toUpperCase() + tag.slice(1)}
                                         </span>`
                                      ).join('') + (berita.tags.length > 2 ? `<span class="inline-block px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-semibold">+${berita.tags.length - 2}</span>` : '')
                                    : ''
                                }
                            </div>
                            <span class="text-xs text-gray-500">${berita.created_at}</span>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2 line-clamp-2 min-h-[3rem]">
                            ${berita.judul}
                        </h4>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2 min-h-[2.5rem]">
                            ${berita.excerpt}
                        </p>
                        <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
                            <button onclick="editBerita(${berita.id})" class="flex-1 flex items-center justify-center gap-2 px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span class="text-sm font-medium">Edit</span>
                            </button>
                            <a href="/dashboard/berita/${berita.id}" class="flex-1 flex items-center justify-center gap-2 px-4 py-2 text-green-600 hover:bg-green-50 rounded-lg transition" title="Lihat">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="text-sm font-medium">Lihat</span>
                            </a>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus" onclick="confirmDelete(${berita.id}, '${berita.judul}')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            <form id="delete-form-${berita.id}" action="/dashboard/berita/${berita.id}" method="POST" class="hidden">
                                <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').content}">
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Display pagination
        function displayPagination(pagination) {
            const container = document.getElementById('paginationContainer');
            if (!container) return;

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
                        <span class="font-semibold">${pagination.total}</span> hasil
                    </div>
                    <div class="flex gap-2">
            `;

            // Previous button
            if (pagination.current_page > 1) {
                paginationHTML += `<button onclick="loadBerita(${pagination.current_page - 1})" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">Sebelumnya</button>`;
            } else {
                paginationHTML += `<button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed" disabled>Sebelumnya</button>`;
            }

            // Page numbers
            for (let i = 1; i <= pagination.last_page; i++) {
                if (i === pagination.current_page) {
                    paginationHTML += `<button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium">${i}</button>`;
                } else if (
                    i === 1 || 
                    i === pagination.last_page || 
                    (i >= pagination.current_page - 1 && i <= pagination.current_page + 1)
                ) {
                    paginationHTML += `<button onclick="loadBerita(${i})" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">${i}</button>`;
                } else if (i === pagination.current_page - 2 || i === pagination.current_page + 2) {
                    paginationHTML += `<span class="px-2 text-gray-400">...</span>`;
                }
            }

            // Next button
            if (pagination.current_page < pagination.last_page) {
                paginationHTML += `<button onclick="loadBerita(${pagination.current_page + 1})" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">Selanjutnya</button>`;
            } else {
                paginationHTML += `<button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed" disabled>Selanjutnya</button>`;
            }

            paginationHTML += `</div></div>`;
            container.innerHTML = paginationHTML;
        }

        // Update stats
        function updateStats(stats) {
            document.getElementById('totalCount').textContent = stats.total;
            document.getElementById('publishedCount').textContent = stats.published;
            document.getElementById('draftCount').textContent = stats.draft;
        }

        // Update filter info
        function updateFilterInfo(search, status, total) {
            const filterInfo = document.getElementById('filterInfo');
            const filterInfoText = document.getElementById('filterInfoText');

            if (!search && !status) {
                filterInfo.classList.add('hidden');
                filterInfo.classList.remove('flex');
                return;
            }

            filterInfo.classList.remove('hidden');
            filterInfo.classList.add('flex');

            let infoText = `Menampilkan ${total} berita`;
            if (search) infoText += ` dengan kata kunci "${search}"`;
            if (status) infoText += ` dengan status ${status === 'published' ? 'Published' : 'Draft'}`;

            filterInfoText.textContent = infoText;
        }

        // Update berita info
        function updateBeritaInfo(pagination) {
            const beritaInfo = document.getElementById('beritaInfo');
            if (beritaInfo) {
                beritaInfo.textContent = `Menampilkan ${pagination.from || 0} sampai ${pagination.to || 0} dari ${pagination.total} berita`;
            }
        }

        // Reset filters
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('statusFilter').value = '';
            loadBerita(1);
        }

        // Event listeners
        document.getElementById('searchInput')?.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                loadBerita(1);
            }, 500);
        });

        document.getElementById('statusFilter')?.addEventListener('change', function() {
            loadBerita(1);
        });

        // Load initial data on page load if filters are present
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const search = urlParams.get('search');
            const status = urlParams.get('status');
            const page = urlParams.get('page') || 1;

            if (search || status) {
                if (search) document.getElementById('searchInput').value = search;
                if (status) document.getElementById('statusFilter').value = status;
                loadBerita(page);
            }
        });

        // Toast Notification System
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            const icons = {
                success: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                error: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                warning: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
                info: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
            };
            
            const colors = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                warning: 'bg-yellow-500',
                info: 'bg-blue-500'
            };
            
            toast.className = `flex items-center gap-3 ${colors[type]} text-white px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 translate-x-full opacity-0 min-w-[320px] max-w-md`;
            toast.innerHTML = `
                <div class="flex-shrink-0">${icons[type]}</div>
                <p class="flex-1 font-semibold">${message}</p>
                <button onclick="this.parentElement.remove()" class="flex-shrink-0 hover:bg-white/20 rounded-lg p-1 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            
            container.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
            }, 10);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }

        // Delete Modal Functions
        let deleteFormId = null;
        
        function confirmDelete(id, judul) {
            deleteFormId = id;
            document.getElementById('deleteBeritaTitle').textContent = `"${judul}"`;
            document.getElementById('deleteModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            deleteFormId = null;
        }
        
        function submitDelete() {
            if (deleteFormId) {
                document.getElementById('delete-form-' + deleteFormId).submit();
            }
        }
        
        // Close modal when clicking outside
        document.getElementById('deleteModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Function to load berita data and open edit modal
        function editBerita(id) {
            fetch(`/dashboard/berita/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    openEditModal(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Gagal memuat data berita', 'error');
                });
        }

        // Show toast on page load if there's a session message
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                showToast('{{ session('success') }}', 'success');
            });
        @endif
        
        @if(session('error'))
            document.addEventListener('DOMContentLoaded', function() {
                showToast('{{ session('error') }}', 'error');
            });
        @endif
    </script>
@endsection
