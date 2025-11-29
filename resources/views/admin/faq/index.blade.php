@extends('layouts.admin')

@section('title', 'Kelola FAQ - Dashboard Admin')
@section('page-title', 'Kelola FAQ')
@section('page-subtitle', 'Jawab pertanyaan dari masyarakat')

@section('content')
    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-3"></div>

    <!-- Stats Cards -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-600 text-sm font-semibold uppercase tracking-wider mb-1">Menunggu Jawaban</p>
                    <p class="text-3xl font-bold text-yellow-700">{{ $pending }}</p>
                </div>
                <div class="w-16 h-16 bg-yellow-200 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-green-50 border border-green-200 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-semibold uppercase tracking-wider mb-1">Sudah Dijawab</p>
                    <p class="text-3xl font-bold text-green-700">{{ $dijawab }}</p>
                </div>
                <div class="w-16 h-16 bg-green-200 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- List Pertanyaan -->
    <div class="space-y-6">
        @forelse($faqs as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                @if($item->status == 'pending')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        BELUM DIJAWAB
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        SUDAH DIJAWAB
                                    </span>
                                @endif

                                @if($item->aktif)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">
                                        DIPUBLIKASI
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $item->pertanyaan }}</h3>
                            
                            <div class="flex items-center gap-4 text-sm text-gray-500 flex-wrap">
                                @if($item->nama)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        {{ $item->nama }}
                                    </span>
                                @endif
                                @if($item->email)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $item->email }}
                                    </span>
                                @endif
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $item->created_at->format('d M Y, H:i') }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 ml-4">
                            <a href="{{ route('admin.faq.edit', $item) }}" class="inline-flex items-center gap-1 px-4 py-2 text-blue-600 hover:text-blue-700 hover:bg-blue-50 rounded-lg transition font-medium whitespace-nowrap">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                {{ $item->status == 'pending' ? 'Jawab' : 'Edit' }}
                            </a>

                            <form action="{{ route('admin.faq.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 px-4 py-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    @if($item->jawaban && $item->status == 'dijawab')
                        <div class="bg-blue-50 rounded-xl p-4 border border-blue-100 mt-4">
                            <p class="text-sm font-semibold text-blue-700 mb-2">Jawaban:</p>
                            <p class="text-gray-700 whitespace-pre-line">{{ $item->jawaban }}</p>
                            @if($item->dijawab_at)
                                <p class="text-xs text-gray-500 mt-2">Dijawab pada: {{ $item->dijawab_at->format('d M Y, H:i') }}</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-12 text-center">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Pertanyaan</h3>
                <p class="text-gray-500">Pertanyaan dari masyarakat akan muncul di sini</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($faqs->hasPages())
        <div class="mt-8">
            {{ $faqs->links() }}
        </div>
    @endif
@endsection
