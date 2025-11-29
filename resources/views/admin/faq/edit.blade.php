@extends('layouts.admin')

@section('title', 'Jawab Pertanyaan - Dashboard Admin')
@section('page-title', $faq->status == 'pending' ? 'Jawab Pertanyaan' : 'Edit Jawaban')
@section('page-subtitle', 'Berikan jawaban untuk pertanyaan dari masyarakat')

@section('content')
    <div class="max-w-4xl">
        <!-- Pertanyaan Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 mb-6">
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Pertanyaan dari:</h2>
            
            <div class="flex items-center gap-6 mb-6 pb-6 border-b border-gray-200">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary to-blue-700 flex items-center justify-center text-white font-bold text-2xl">
                    {{ substr($faq->nama ?? 'A', 0, 1) }}
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-gray-900">{{ $faq->nama ?? 'Anonim' }}</h3>
                    <p class="text-gray-600">{{ $faq->email ?? '-' }}</p>
                    <p class="text-sm text-gray-500 mt-1">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $faq->created_at->format('d M Y, H:i') }} WIB
                    </p>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-6">
                <p class="text-sm font-semibold text-gray-600 mb-3">Pertanyaan:</p>
                <p class="text-lg text-gray-900 leading-relaxed">{{ $faq->pertanyaan }}</p>
            </div>
        </div>

        <!-- Form Jawaban -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('admin.faq.update', $faq) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jawaban <span class="text-red-500">*</span>
                        </label>
                        <textarea name="jawaban" rows="10" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('jawaban') border-red-500 @enderror"
                            placeholder="Tuliskan jawaban yang jelas dan informatif...">{{ old('jawaban', $faq->jawaban) }}</textarea>
                        @error('jawaban')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-2 text-sm text-gray-500">Berikan jawaban yang jelas, informatif, dan membantu masyarakat memahami informasi yang dibutuhkan.</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Urutan Tampilan
                            </label>
                            <input type="number" name="urutan" min="0" value="{{ old('urutan', $faq->urutan ?? 0) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <p class="mt-1 text-xs text-gray-500">Semakin kecil angka, semakin atas urutannya</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Status Publikasi
                            </label>
                            <div class="flex items-center gap-3 h-[50px]">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="aktif" class="sr-only peer" {{ old('aktif', $faq->aktif) ? 'checked' : '' }}>
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary"></div>
                                    <span class="ms-3 text-sm font-medium text-gray-700">Tampilkan di halaman FAQ publik</span>
                                </label>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Aktifkan agar muncul di halaman FAQ publik</p>
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="text-sm text-blue-700">
                                <p class="font-semibold mb-1">Tips Menjawab Pertanyaan:</p>
                                <ul class="list-disc ml-4 space-y-1">
                                    <li>Jawab dengan jelas dan mudah dipahami</li>
                                    <li>Gunakan bahasa formal tapi tidak kaku</li>
                                    <li>Sertakan informasi kontak jika diperlukan</li>
                                    <li>Periksa kembali sebelum dipublikasikan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.faq.index') }}" 
                        class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold text-center">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex-1 px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition font-semibold shadow-lg flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ $faq->status == 'pending' ? 'Kirim Jawaban' : 'Perbarui Jawaban' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
