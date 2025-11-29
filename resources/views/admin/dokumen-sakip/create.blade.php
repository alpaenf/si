@extends('layouts.admin')

@section('title', 'Tambah Dokumen SAKIP - Dashboard Admin')
@section('page-title', 'Tambah Dokumen SAKIP')
@section('page-subtitle', 'Upload dokumen SAKIP baru')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('admin.dokumen-sakip.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tahun <span class="text-red-500">*</span></label>
                        <input type="number" name="tahun" min="2000" max="2100" value="{{ old('tahun', date('Y')) }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('tahun') border-red-500 @enderror">
                        @error('tahun')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Dokumen <span class="text-red-500">*</span></label>
                        <select name="jenis" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('jenis') border-red-500 @enderror">
                            <option value="">Pilih Jenis</option>
                            <option value="Renstra" {{ old('jenis') == 'Renstra' ? 'selected' : '' }}>Renstra</option>
                            <option value="RKT" {{ old('jenis') == 'RKT' ? 'selected' : '' }}>RKT</option>
                            <option value="PK" {{ old('jenis') == 'PK' ? 'selected' : '' }}>PK</option>
                            <option value="LKJIP" {{ old('jenis') == 'LKJIP' ? 'selected' : '' }}>LKJIP</option>
                            <option value="Lainnya" {{ old('jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Dokumen <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="{{ old('judul') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('judul') border-red-500 @enderror"
                            placeholder="Contoh: Rencana Strategis 2021-2026">
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">File PDF <span class="text-red-500">*</span></label>
                        <input type="file" name="file" accept=".pdf" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('file') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500">Format: PDF, Maksimal: 10MB</p>
                        @error('file')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                        <textarea name="keterangan" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('keterangan') border-red-500 @enderror"
                            placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-8">
                    <a href="{{ route('admin.dokumen-sakip.index') }}" 
                        class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold text-center">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex-1 px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition font-semibold shadow-lg">
                        Simpan Dokumen
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
