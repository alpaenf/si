@extends('layouts.admin')

@section('title', 'Edit Layanan - Dashboard Admin')
@section('page-title', 'Edit Layanan')
@section('page-subtitle', 'Perbarui informasi layanan')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('admin.layanan.update', $layanan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Nama Layanan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Layanan <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama', $layanan->nama) }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('nama') border-red-500 @enderror"
                            placeholder="Contoh: Aplikasi PPID Online">
                        @error('nama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Icon (Font Awesome) -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Icon (Font Awesome Class)</label>
                        <div class="flex gap-3">
                            <input type="text" name="icon" value="{{ old('icon', $layanan->icon) }}"
                                class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('icon') border-red-500 @enderror"
                                placeholder="fas fa-laptop-code">
                            @if($layanan->icon)
                            <div class="w-16 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="{{ $layanan->icon }} text-2xl text-blue-600"></i>
                            </div>
                            @endif
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Gunakan class Font Awesome, contoh: fas fa-laptop-code, fas fa-mobile-alt</p>
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="5"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('deskripsi') border-red-500 @enderror"
                            placeholder="Jelaskan detail tentang layanan ini...">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Link -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Link (URL)</label>
                        <input type="url" name="link" value="{{ old('link', $layanan->link) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('link') border-red-500 @enderror"
                            placeholder="https://example.com/layanan">
                        <p class="mt-1 text-xs text-gray-500">Link untuk mengakses layanan (opsional)</p>
                        @error('link')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil <span class="text-red-500">*</span></label>
                        <input type="number" name="urutan" value="{{ old('urutan', $layanan->urutan) }}" min="1" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition @error('urutan') border-red-500 @enderror"
                            placeholder="1">
                        <p class="mt-1 text-xs text-gray-500">Urutan tampil layanan (angka lebih kecil tampil lebih dulu)</p>
                        @error('urutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Aktif -->
                    <div>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="aktif" value="1" {{ old('aktif', $layanan->aktif) ? 'checked' : '' }}
                                class="w-5 h-5 text-primary focus:ring-primary rounded">
                            <div>
                                <span class="block text-sm font-semibold text-gray-700">Aktifkan Layanan</span>
                                <span class="text-xs text-gray-500">Layanan akan ditampilkan di website</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-8">
                    <a href="{{ route('admin.layanan.index') }}" 
                        class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold text-center">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex-1 px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition font-semibold shadow-lg">
                        Perbarui Layanan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
