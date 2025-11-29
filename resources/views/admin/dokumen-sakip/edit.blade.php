@extends('layouts.admin')

@section('title', 'Edit Dokumen SAKIP - Dashboard Admin')
@section('page-title', 'Edit Dokumen SAKIP')
@section('page-subtitle', 'Perbarui dokumen SAKIP')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('admin.dokumen-sakip.update', $dokumenSakip) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tahun <span class="text-red-500">*</span></label>
                        <input type="number" name="tahun" min="2000" max="2100" value="{{ old('tahun', $dokumenSakip->tahun) }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Dokumen <span class="text-red-500">*</span></label>
                        <select name="jenis" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <option value="Renstra" {{ $dokumenSakip->jenis == 'Renstra' ? 'selected' : '' }}>Renstra</option>
                            <option value="RKT" {{ $dokumenSakip->jenis == 'RKT' ? 'selected' : '' }}>RKT</option>
                            <option value="PK" {{ $dokumenSakip->jenis == 'PK' ? 'selected' : '' }}>PK</option>
                            <option value="LKJIP" {{ $dokumenSakip->jenis == 'LKJIP' ? 'selected' : '' }}>LKJIP</option>
                            <option value="Lainnya" {{ $dokumenSakip->jenis == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Dokumen <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="{{ old('judul', $dokumenSakip->judul) }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">File PDF Saat Ini</label>
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">{{ basename($dokumenSakip->file_path) }}</p>
                                <p class="text-xs text-gray-500">{{ $dokumenSakip->ukuran_file }}</p>
                            </div>
                            <a href="{{ asset('storage/' . $dokumenSakip->file_path) }}" target="_blank" class="text-blue-600 hover:text-blue-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti File PDF (Opsional)</label>
                        <input type="file" name="file" accept=".pdf"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengganti file</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                        <textarea name="keterangan" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition">{{ old('keterangan', $dokumenSakip->keterangan) }}</textarea>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-8">
                    <a href="{{ route('admin.dokumen-sakip.index') }}" 
                        class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold text-center">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex-1 px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition font-semibold shadow-lg">
                        Perbarui Dokumen
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
