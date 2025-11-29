@extends('layouts.admin')

@section('title', 'Pengaturan Website - Dashboard Admin')
@section('page-title', 'Pengaturan Website')
@section('page-subtitle', 'Kelola konfigurasi umum, kontak, dan media sosial')

@section('content')
    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-3"></div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Informasi Umum -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 px-6 py-4">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Informasi Umum
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Nama Website -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Website <span class="text-red-500">*</span></label>
                    <input type="text" name="settings[general][site_name]" value="{{ old('settings.general.site_name', $settings['general']['site_name'] ?? '') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="Diskominfo Kabupaten XXX">
                </div>

                <!-- Tagline -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tagline</label>
                    <input type="text" name="settings[general][site_tagline]" value="{{ old('settings.general.site_tagline', $settings['general']['site_tagline'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="Membangun Masyarakat Digital">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Website</label>
                    <textarea name="settings[general][site_description]" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="Deskripsi singkat tentang website...">{{ old('settings.general.site_description', $settings['general']['site_description'] ?? '') }}</textarea>
                </div>

                <!-- Logo Website -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Logo Website</label>
                    @if(isset($settings['general']['site_logo']) && $settings['general']['site_logo'])
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $settings['general']['site_logo']) }}" alt="Logo" class="h-16 object-contain border rounded-lg p-2">
                    </div>
                    @endif
                    <input type="file" name="settings[general][site_logo]" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    <p class="mt-1 text-xs text-gray-500">Format: PNG, JPG, JPEG (Max. 2MB). Biarkan kosong jika tidak ingin mengubah.</p>
                </div>

                <!-- Footer Text -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Teks Footer</label>
                    <input type="text" name="settings[general][footer_text]" value="{{ old('settings.general.footer_text', $settings['general']['footer_text'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="© 2024 Diskominfo. All rights reserved.">
                </div>
            </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-green-500 to-green-700 px-6 py-4">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Informasi Kontak
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                    <textarea name="settings[contact][address]" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="Jl. Contoh No. 123, Kota, Provinsi">{{ old('settings.contact.address', $settings['contact']['address'] ?? '') }}</textarea>
                </div>

                <!-- Telepon -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Telepon</label>
                    <input type="text" name="settings[contact][phone]" value="{{ old('settings.contact.phone', $settings['contact']['phone'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="(021) 1234567">
                </div>

                <!-- Fax -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Fax</label>
                    <input type="text" name="settings[contact][fax]" value="{{ old('settings.contact.fax', $settings['contact']['fax'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="(021) 7654321">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="settings[contact][email]" value="{{ old('settings.contact.email', $settings['contact']['email'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="info@diskominfo.go.id">
                </div>

                <!-- Jam Operasional -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jam Operasional</label>
                    <input type="text" name="settings[contact][working_hours]" value="{{ old('settings.contact.working_hours', $settings['contact']['working_hours'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="Senin - Jumat, 08:00 - 16:00 WIB">
                </div>
            </div>
        </div>

        <!-- Media Sosial -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
            <div class="bg-gradient-to-r from-purple-500 to-purple-700 px-6 py-4">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                    </svg>
                    Media Sosial
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Facebook -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Facebook URL</label>
                    <input type="url" name="settings[social][facebook]" value="{{ old('settings.social.facebook', $settings['social']['facebook'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="https://facebook.com/username">
                </div>

                <!-- Twitter/X -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Twitter/X URL</label>
                    <input type="url" name="settings[social][twitter]" value="{{ old('settings.social.twitter', $settings['social']['twitter'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="https://twitter.com/username">
                </div>

                <!-- Instagram -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Instagram URL</label>
                    <input type="url" name="settings[social][instagram]" value="{{ old('settings.social.instagram', $settings['social']['instagram'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="https://instagram.com/username">
                </div>

                <!-- YouTube -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">YouTube URL</label>
                    <input type="url" name="settings[social][youtube]" value="{{ old('settings.social.youtube', $settings['social']['youtube'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="https://youtube.com/@username">
                </div>

                <!-- TikTok -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">TikTok URL</label>
                    <input type="url" name="settings[social][tiktok]" value="{{ old('settings.social.tiktok', $settings['social']['tiktok'] ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                        placeholder="https://tiktok.com/@username">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-3">
            <button type="reset" 
                class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold">
                Reset
            </button>
            <button type="submit" 
                class="px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition font-semibold shadow-lg">
                Simpan Pengaturan
            </button>
        </div>
    </form>

    <script>
        @if(session('success'))
            showToast('{{ session('success') }}', 'success');
        @endif

        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `px-6 py-4 rounded-xl shadow-lg transform transition-all duration-300 ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            } text-white`;
            toast.innerHTML = `
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">${message}</span>
                </div>
            `;
            
            const container = document.getElementById('toast-container');
            container.appendChild(toast);
            
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>
@endsection
