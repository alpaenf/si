@extends('layouts.admin')

@section('title', 'Tambah Galeri - Dashboard Admin')
@section('page-title', 'Tambah Galeri')
@section('page-subtitle', 'Upload foto baru ke galeri')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-6">
                    <!-- Judul -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Foto <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="{{ old('judul') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('judul') border-red-500 @enderror"
                            placeholder="Contoh: Sosialisasi SPBE 2024">
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Upload Gambar -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto <span class="text-red-500">*</span></label>
                        <div>
                            <input type="file" name="gambar" id="gambar" accept="image/*" required
                                class="hidden" onchange="previewImage(event)">
                            <label for="gambar" id="uploadLabel" class="relative flex flex-col items-center justify-center w-full h-64 px-4 py-8 border-2 border-dashed border-gray-300 rounded-xl hover:border-primary hover:bg-blue-50 transition cursor-pointer overflow-hidden">
                                <div id="placeholderContent" class="text-center">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-sm font-medium text-gray-600 mb-1">Klik untuk upload foto</p>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 5MB)</p>
                                </div>
                                <img id="previewImg" src="" alt="Preview" class="hidden absolute inset-0 w-full h-full object-cover">
                                <!-- Change Image Overlay -->
                                <div id="changeImageOverlay" class="hidden absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition">
                                    <div class="text-white text-center">
                                        <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        <p class="text-sm font-medium">Klik untuk ganti foto</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('deskripsi') border-red-500 @enderror"
                            placeholder="Deskripsi foto (opsional)">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('tanggal') border-red-500 @enderror">
                        @error('tanggal')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="kategori" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('kategori') border-red-500 @enderror">
                            <option value="">Pilih Kategori</option>
                            <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="acara" {{ old('kategori') == 'acara' ? 'selected' : '' }}>Acara</option>
                            <option value="dokumentasi" {{ old('kategori') == 'dokumentasi' ? 'selected' : '' }}>Dokumentasi</option>
                            <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('kategori')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-8">
                    <a href="{{ route('admin.galeri.index') }}" 
                        class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold text-center">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex-1 px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition font-semibold shadow-lg">
                        Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('previewImg');
                    const placeholder = document.getElementById('placeholderContent');
                    const overlay = document.getElementById('changeImageOverlay');
                    
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                    overlay.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
