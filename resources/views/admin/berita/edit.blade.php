<!-- Modal Edit Berita -->
<div id="editBeritaModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center p-4" style="display: none;">
    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between rounded-t-2xl">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Edit Berita</h3>
                <p class="text-sm text-gray-600 mt-1">Perbarui informasi berita</p>
            </div>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <form id="editBeritaForm" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Judul Berita -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Judul Berita <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul" id="edit_judul" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                        placeholder="Masukkan judul berita...">
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Gambar Berita
                    </label>
                    <div>
                        <input type="file" name="gambar" id="edit_gambar" accept="image/*" 
                            class="hidden" onchange="previewEditImage(event)">
                        <label for="edit_gambar" id="edit_uploadLabel" class="relative flex flex-col items-center justify-center w-full h-64 px-4 py-8 border-2 border-dashed border-gray-300 rounded-xl hover:border-primary hover:bg-blue-50 transition cursor-pointer overflow-hidden">
                            <div id="edit_placeholderContent" class="text-center">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-sm font-medium text-gray-600 mb-1">Klik untuk upload gambar baru</p>
                                <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 2MB)</p>
                            </div>
                            <img id="edit_previewImg" src="" alt="Preview" class="hidden absolute inset-0 w-full h-full object-cover">
                            <!-- Change Image Overlay -->
                            <div id="edit_changeImageOverlay" class="hidden absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition">
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
                        <div class="flex flex-wrap gap-2" id="edit_selectedTags">
                            <!-- Selected tags akan muncul disini -->
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" onclick="toggleEditTag('berita')" class="edit-tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Berita
                            </button>
                            <button type="button" onclick="toggleEditTag('kegiatan')" class="edit-tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Kegiatan
                            </button>
                            <button type="button" onclick="toggleEditTag('pengumuman')" class="edit-tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Pengumuman
                            </button>
                            <button type="button" onclick="toggleEditTag('spbe')" class="edit-tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                SPBE
                            </button>
                            <button type="button" onclick="toggleEditTag('program')" class="edit-tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Program
                            </button>
                            <button type="button" onclick="toggleEditTag('teknologi')" class="edit-tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Teknologi
                            </button>
                            <button type="button" onclick="toggleEditTag('umkm')" class="edit-tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                UMKM
                            </button>
                            <button type="button" onclick="toggleEditTag('digitalisasi')" class="edit-tag-btn px-3 py-1.5 border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium hover:border-primary hover:text-primary transition">
                                Digitalisasi
                            </button>
                        </div>
                        <input type="hidden" name="tags" id="edit_tagsInput" required>
                    </div>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Publikasi <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal" id="edit_tanggal" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Deskripsi/Konten <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" id="edit_deskripsi" rows="8" required 
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
                            <input type="radio" name="status" value="draft" id="edit_status_draft"
                                class="w-4 h-4 text-primary focus:ring-primary">
                            <span class="text-sm font-medium text-gray-700">Draft</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="published" id="edit_status_published"
                                class="w-4 h-4 text-primary focus:ring-primary">
                            <span class="text-sm font-medium text-gray-700">Publikasikan</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                <button type="button" onclick="closeEditModal()" 
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold">
                    Batal
                </button>
                <button type="submit" 
                    class="px-6 py-3 bg-primary hover:bg-blue-700 text-white rounded-xl transition font-semibold shadow-lg">
                    Update Berita
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let editSelectedTags = [];

    // Open Edit Modal with data
    function openEditModal(berita) {
        const modal = document.getElementById('editBeritaModal');
        const form = document.getElementById('editBeritaForm');
        
        // Set form action
        form.action = `/dashboard/berita/${berita.id}`;
        
        // Fill form fields
        document.getElementById('edit_judul').value = berita.judul;
        
        // Format tanggal (convert dari format database ke format input date)
        if (berita.tanggal) {
            const date = new Date(berita.tanggal);
            const formattedDate = date.toISOString().split('T')[0];
            document.getElementById('edit_tanggal').value = formattedDate;
        }
        
        document.getElementById('edit_deskripsi').value = berita.deskripsi;
        
        // Set status
        if (berita.status === 'draft') {
            document.getElementById('edit_status_draft').checked = true;
        } else {
            document.getElementById('edit_status_published').checked = true;
        }
        
        // Set tags
        editSelectedTags = berita.tags || [];
        updateEditSelectedTags();
        
        // Set image if exists
        if (berita.gambar) {
            const previewImg = document.getElementById('edit_previewImg');
            const placeholderContent = document.getElementById('edit_placeholderContent');
            const uploadLabel = document.getElementById('edit_uploadLabel');
            const changeOverlay = document.getElementById('edit_changeImageOverlay');
            
            previewImg.src = `/storage/${berita.gambar}`;
            previewImg.classList.remove('hidden');
            placeholderContent.classList.add('hidden');
            changeOverlay.classList.remove('hidden');
            uploadLabel.classList.remove('border-dashed', 'hover:bg-blue-50', 'px-4', 'py-8');
            uploadLabel.classList.add('border-solid', 'p-0');
        }
        
        // Show modal
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeEditModal() {
        const modal = document.getElementById('editBeritaModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
        
        // Reset form
        document.getElementById('editBeritaForm').reset();
        editSelectedTags = [];
        updateEditSelectedTags();
        
        // Reset image preview
        const previewImg = document.getElementById('edit_previewImg');
        const placeholderContent = document.getElementById('edit_placeholderContent');
        const uploadLabel = document.getElementById('edit_uploadLabel');
        const changeOverlay = document.getElementById('edit_changeImageOverlay');
        
        previewImg.classList.add('hidden');
        previewImg.src = '';
        placeholderContent.classList.remove('hidden');
        changeOverlay.classList.add('hidden');
        uploadLabel.classList.add('border-dashed', 'hover:bg-blue-50', 'px-4', 'py-8');
        uploadLabel.classList.remove('border-solid', 'p-0');
    }

    // Close modal when clicking outside
    document.getElementById('editBeritaModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditModal();
        }
    });

    // Image Preview for Edit
    function previewEditImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImg = document.getElementById('edit_previewImg');
                const placeholderContent = document.getElementById('edit_placeholderContent');
                const uploadLabel = document.getElementById('edit_uploadLabel');
                const changeOverlay = document.getElementById('edit_changeImageOverlay');
                
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

    // Tags Management for Edit
    function toggleEditTag(tag) {
        const index = editSelectedTags.indexOf(tag);
        if (index > -1) {
            editSelectedTags.splice(index, 1);
        } else {
            editSelectedTags.push(tag);
        }
        updateEditSelectedTags();
    }

    function removeEditTag(tag) {
        const index = editSelectedTags.indexOf(tag);
        if (index > -1) {
            editSelectedTags.splice(index, 1);
        }
        updateEditSelectedTags();
    }

    function updateEditSelectedTags() {
        const container = document.getElementById('edit_selectedTags');
        const input = document.getElementById('edit_tagsInput');
        
        if (editSelectedTags.length === 0) {
            container.innerHTML = '<span class="text-sm text-gray-500 italic">Belum ada tags dipilih</span>';
        } else {
            container.innerHTML = editSelectedTags.map(tag => `
                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                    ${tag.charAt(0).toUpperCase() + tag.slice(1)}
                    <button type="button" onclick="removeEditTag('${tag}')" class="hover:text-blue-900">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </span>
            `).join('');
        }
        
        // Update hidden input
        input.value = JSON.stringify(editSelectedTags);
        
        // Update button styles
        document.querySelectorAll('.edit-tag-btn').forEach(btn => {
            const tagName = btn.textContent.trim().toLowerCase();
            if (editSelectedTags.includes(tagName)) {
                btn.classList.remove('border-gray-300', 'text-gray-700');
                btn.classList.add('border-primary', 'bg-primary', 'text-white');
            } else {
                btn.classList.add('border-gray-300', 'text-gray-700');
                btn.classList.remove('border-primary', 'bg-primary', 'text-white');
            }
        });
    }
</script>
