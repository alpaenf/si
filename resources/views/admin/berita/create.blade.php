<!-- Modal Create Berita -->
<div id="createBeritaModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center p-4" style="display: none;">
    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between rounded-t-2xl">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Tambah Berita Baru</h3>
                <p class="text-sm text-gray-600 mt-1">Lengkapi formulir di bawah untuk menambahkan berita</p>
            </div>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="space-y-6">
                <!-- Judul Berita -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Judul Berita <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                        placeholder="Masukkan judul berita...">
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Gambar Berita
                    </label>
                    <div>
                        <input type="file" name="gambar" id="gambar" accept="image/*" 
                            class="hidden" onchange="previewImage(event)">
                        <label for="gambar" id="uploadLabel" class="relative flex flex-col items-center justify-center w-full h-64 px-4 py-8 border-2 border-dashed border-gray-300 rounded-xl hover:border-primary hover:bg-blue-50 transition cursor-pointer overflow-hidden">
                            <div id="placeholderContent" class="text-center">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-sm font-medium text-gray-600 mb-1">Klik untuk upload gambar</p>
                                <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 2MB)</p>
                            </div>
                            <img id="previewImg" src="" alt="Preview" class="hidden absolute inset-0 w-full h-full object-cover">
                            <!-- Change Image Overlay -->
                            <div id="changeImageOverlay" class="hidden absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition">
                                <div class="text-white text-center">
                                    <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    <p class="text-sm font-medium">Klik untuk ganti gambar</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tags <span class="text-red-500">*</span>
                    </label>
                    <div class="space-y-3">
                        <div class="flex flex-wrap gap-2" id="selectedTags">
                            <!-- Selected tags akan muncul disini -->
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" onclick="toggleTag('berita')" class="tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Berita
                            </button>
                            <button type="button" onclick="toggleTag('kegiatan')" class="tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Kegiatan
                            </button>
                            <button type="button" onclick="toggleTag('pengumuman')" class="tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Pengumuman
                            </button>
                            <button type="button" onclick="toggleTag('spbe')" class="tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                SPBE
                            </button>
                            <button type="button" onclick="toggleTag('program')" class="tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Program
                            </button>
                            <button type="button" onclick="toggleTag('teknologi')" class="tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Teknologi
                            </button>
                            <button type="button" onclick="toggleTag('umkm')" class="tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                UMKM
                            </button>
                            <button type="button" onclick="toggleTag('digitalisasi')" class="tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Digitalisasi
                            </button>
                        </div>
                        <input type="hidden" name="tags" id="tagsInput" required>
                    </div>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Publikasi <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal" required 
                        value="{{ date('Y-m-d') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Deskripsi/Konten <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" rows="8" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition resize-none"
                        placeholder="Tulis konten berita di sini..."></textarea>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Status Publikasi <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="draft" checked 
                                class="w-4 h-4 text-primary focus:ring-primary">
                            <span class="text-sm font-medium text-gray-700">Draft</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="published" 
                                class="w-4 h-4 text-primary focus:ring-primary">
                            <span class="text-sm font-medium text-gray-700">Publikasikan</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                <button type="button" onclick="closeModal()" 
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold">
                    Batal
                </button>
                <button type="submit" 
                    class="px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition font-semibold shadow-lg">
                    Simpan Berita
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Modal Functions
    function openModal() {
        document.getElementById('createBeritaModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('createBeritaModal').style.display = 'none';
        document.body.style.overflow = 'auto';
        
        // Reset form
        document.querySelector('#createBeritaModal form').reset();
        selectedTags = [];
        updateSelectedTags();
        
        // Reset image preview
        const previewImg = document.getElementById('previewImg');
        const placeholderContent = document.getElementById('placeholderContent');
        const uploadLabel = document.getElementById('uploadLabel');
        const changeOverlay = document.getElementById('changeImageOverlay');
        
        previewImg.classList.add('hidden');
        previewImg.src = '';
        placeholderContent.classList.remove('hidden');
        changeOverlay.classList.add('hidden');
        uploadLabel.classList.add('border-dashed', 'hover:bg-blue-50', 'px-4', 'py-8');
        uploadLabel.classList.remove('border-solid', 'p-0');
    }

    // Close modal when clicking outside
    document.getElementById('createBeritaModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Image Preview
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImg = document.getElementById('previewImg');
                const placeholderContent = document.getElementById('placeholderContent');
                const uploadLabel = document.getElementById('uploadLabel');
                const changeOverlay = document.getElementById('changeImageOverlay');
                
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                placeholderContent.classList.add('hidden');
                changeOverlay.classList.remove('hidden');
                uploadLabel.classList.remove('border-dashed', 'hover:bg-blue-50', 'px-4', 'py-8');
                uploadLabel.classList.add('border-solid', 'p-0');
            }
            reader.readAsDataURL(file);
        }
    }

    // Tags Management
    let selectedTags = [];

    function toggleTag(tag) {
        const index = selectedTags.indexOf(tag);
        if (index > -1) {
            selectedTags.splice(index, 1);
        } else {
            selectedTags.push(tag);
        }
        updateSelectedTags();
    }

    function removeTag(tag) {
        const index = selectedTags.indexOf(tag);
        if (index > -1) {
            selectedTags.splice(index, 1);
        }
        updateSelectedTags();
    }

    function updateSelectedTags() {
        const container = document.getElementById('selectedTags');
        const input = document.getElementById('tagsInput');
        
        if (selectedTags.length === 0) {
            container.innerHTML = '<span class="text-sm text-gray-500 italic">Belum ada tags dipilih</span>';
        } else {
            container.innerHTML = selectedTags.map(tag => `
                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                    ${tag.charAt(0).toUpperCase() + tag.slice(1)}
                    <button type="button" onclick="removeTag('${tag}')" class="hover:text-blue-900">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </span>
            `).join('');
        }
        
        // Update hidden input
        input.value = JSON.stringify(selectedTags);
        
        // Update button styles
        document.querySelectorAll('.tag-btn').forEach(btn => {
            const tagName = btn.textContent.trim().toLowerCase();
            if (selectedTags.includes(tagName)) {
                btn.classList.remove('border-gray-300', 'text-gray-700');
                btn.classList.add('border-primary', 'bg-primary', 'text-white');
            } else {
                btn.classList.add('border-gray-300', 'text-gray-700');
                btn.classList.remove('border-primary', 'bg-primary', 'text-white');
            }
        });
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        updateSelectedTags();
    });

</script>
