@extends('layouts.public')

@section('title', 'FAQ - Diskominfo Kab. Pemalang')

@section('content')

    <!-- HERO SECTION -->
    <section class="bg-gradient-to-br from-primary to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Frequently Asked Questions</h1>
                <p class="text-lg text-blue-100 leading-relaxed">
                    Temukan jawaban atas pertanyaan yang sering diajukan seputar layanan 
                    Dinas Komunikasi dan Informatika Kabupaten Pemalang
                </p>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="max-w-5xl mx-auto px-4 py-12">
        
        <!-- CATEGORY TABS -->
        <div class="flex flex-wrap gap-3 mb-8 justify-center">
            <button class="px-6 py-2 bg-primary text-white rounded-full font-medium shadow-md hover:bg-blue-700 transition">
                Semua
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-full font-medium shadow-sm hover:bg-gray-50 transition">
                Layanan Umum
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-full font-medium shadow-sm hover:bg-gray-50 transition">
                E-Government
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-full font-medium shadow-sm hover:bg-gray-50 transition">
                Pengaduan
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-full font-medium shadow-sm hover:bg-gray-50 transition">
                PPID
            </button>
        </div>

        <!-- FAQ ITEMS -->
        <div class="space-y-4">

            <!-- LAYANAN UMUM -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-primary/5 px-6 py-3 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-primary">Layanan Umum</h2>
                </div>
                <div class="p-4 space-y-3">
                    
                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Apa saja layanan yang disediakan Diskominfo Pemalang?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Diskominfo Pemalang menyediakan berbagai layanan meliputi:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Layanan informasi publik dan komunikasi</li>
                                <li>Pengembangan dan pengelolaan sistem informasi pemerintahan (SPBE)</li>
                                <li>Pengelolaan website dan media sosial pemerintah daerah</li>
                                <li>Layanan persandian dan keamanan informasi</li>
                                <li>Pengelolaan data dan statistik sektoral</li>
                                <li>Fasilitasi layanan pos dan telekomunikasi</li>
                            </ul>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Bagaimana cara mengakses layanan Diskominfo?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Anda dapat mengakses layanan Diskominfo melalui beberapa cara:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Mengunjungi kantor Diskominfo di Jl. Pemuda No. 1, Pemalang</li>
                                <li>Melalui website resmi atau portal layanan online</li>
                                <li>Menghubungi layanan hotline di (0284) 321234</li>
                                <li>Mengirim email ke diskominfo@pemalangkab.go.id</li>
                                <li>Melalui media sosial resmi Diskominfo Pemalang</li>
                            </ul>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Apa jam operasional Diskominfo?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Jam operasional layanan Diskominfo Pemalang:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Senin - Kamis: 07.30 - 16.00 WIB</li>
                                <li>Jumat: 07.30 - 16.30 WIB</li>
                                <li>Sabtu, Minggu, dan Hari Libur Nasional: Tutup</li>
                                <li>Layanan online 24/7 melalui website dan email</li>
                            </ul>
                        </div>
                    </details>

                </div>
            </div>

            <!-- E-GOVERNMENT -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-primary/5 px-6 py-3 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-primary">E-Government & SPBE</h2>
                </div>
                <div class="p-4 space-y-3">
                    
                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Apa itu SPBE?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>SPBE (Sistem Pemerintahan Berbasis Elektronik) adalah penyelenggaraan pemerintahan 
                            yang memanfaatkan teknologi informasi dan komunikasi untuk memberikan layanan kepada 
                            pengguna SPBE. SPBE bertujuan untuk mewujudkan tata kelola pemerintahan yang bersih, 
                            efektif, transparan, dan akuntabel serta pelayanan publik yang berkualitas dan terpercaya.</p>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Bagaimana cara mengajukan pembuatan aplikasi/sistem informasi?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Untuk mengajukan pembuatan aplikasi atau sistem informasi:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Ajukan surat permohonan resmi ke Kepala Diskominfo</li>
                                <li>Lampirkan proposal kebutuhan sistem dengan detail fitur yang diinginkan</li>
                                <li>Tim akan melakukan analisis kebutuhan dan kajian teknis</li>
                                <li>Setelah disetujui, akan dilakukan proses pengembangan</li>
                                <li>Sistem akan di-deploy setelah melalui tahap testing</li>
                            </ul>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Bagaimana cara mendapatkan akses email pemerintah?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Untuk mendapatkan email resmi pemerintah Kabupaten Pemalang (@pemalangkab.go.id):</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Pastikan Anda adalah ASN/pegawai di lingkungan Pemkab Pemalang</li>
                                <li>Ajukan permohonan melalui atasan langsung ke Diskominfo</li>
                                <li>Isi formulir pendaftaran dengan data lengkap</li>
                                <li>Email akan dibuat dalam waktu 1-3 hari kerja</li>
                                <li>Kredensial login akan dikirimkan melalui nomor HP yang terdaftar</li>
                            </ul>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Apa yang harus dilakukan jika website/aplikasi error?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Jika mengalami kendala teknis pada website atau aplikasi:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Laporkan ke helpdesk Diskominfo melalui email atau telepon</li>
                                <li>Sertakan screenshot error dan deskripsi masalah</li>
                                <li>Cantumkan waktu terjadinya error dan langkah yang dilakukan</li>
                                <li>Tim IT akan merespons dan menindaklanjuti dalam 1x24 jam</li>
                            </ul>
                        </div>
                    </details>

                </div>
            </div>

            <!-- PPID & INFORMASI PUBLIK -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-primary/5 px-6 py-3 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-primary">PPID & Informasi Publik</h2>
                </div>
                <div class="p-4 space-y-3">
                    
                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Apa itu PPID?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>PPID (Pejabat Pengelola Informasi dan Dokumentasi) adalah pejabat yang bertanggung jawab 
                            dalam pengumpulan, pendokumentasian, penyimpanan, pemeliharaan, penyediaan, distribusi, dan 
                            pelayanan informasi publik di lingkungan badan publik sesuai UU No. 14 Tahun 2008 tentang 
                            Keterbukaan Informasi Publik.</p>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Bagaimana cara mengajukan permohonan informasi publik?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Langkah-langkah mengajukan permohonan informasi publik:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Isi formulir permohonan informasi publik</li>
                                <li>Ajukan secara langsung ke kantor PPID atau melalui online</li>
                                <li>Sertakan identitas diri (KTP/dokumen resmi)</li>
                                <li>Jelaskan informasi yang diminta dengan spesifik</li>
                                <li>Permohonan akan diproses maksimal 10 hari kerja</li>
                            </ul>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Apakah ada biaya untuk mengakses informasi publik?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Akses terhadap informasi publik tidak dipungut biaya. Namun, pemohon dapat dikenakan 
                            biaya untuk penggandaan/fotokopi dan pengiriman dokumen sesuai tarif yang berlaku. 
                            Informasi yang tersedia di website dapat diakses secara gratis.</p>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Apa yang harus dilakukan jika permohonan informasi ditolak?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Jika permohonan informasi ditolak, pemohon dapat:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Mengajukan keberatan tertulis kepada Atasan PPID</li>
                                <li>Keberatan diajukan maksimal 30 hari kerja setelah penolakan</li>
                                <li>Atasan PPID akan memberikan tanggapan dalam 30 hari kerja</li>
                                <li>Jika masih tidak puas, dapat mengajukan ke Komisi Informasi</li>
                            </ul>
                        </div>
                    </details>

                </div>
            </div>

            <!-- PENGADUAN & BANTUAN -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-primary/5 px-6 py-3 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-primary">Pengaduan & Bantuan</h2>
                </div>
                <div class="p-4 space-y-3">
                    
                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Bagaimana cara menyampaikan pengaduan?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Masyarakat dapat menyampaikan pengaduan melalui:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Portal pengaduan online di website resmi</li>
                                <li>Email: pengaduan@pemalangkab.go.id</li>
                                <li>Hotline: (0284) 321234</li>
                                <li>Datang langsung ke kantor Diskominfo</li>
                                <li>Melalui aplikasi LAPOR! atau SP4N</li>
                            </ul>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Berapa lama proses penanganan pengaduan?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Waktu penanganan pengaduan disesuaikan dengan tingkat kompleksitas:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Pengaduan sederhana: 1-3 hari kerja</li>
                                <li>Pengaduan dengan kompleksitas sedang: 5-7 hari kerja</li>
                                <li>Pengaduan kompleks: maksimal 14 hari kerja</li>
                                <li>Pemohon akan mendapat nomor tiket untuk tracking</li>
                                <li>Update status dapat dipantau secara online</li>
                            </ul>
                        </div>
                    </details>

                    <details class="group bg-gray-50 rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between p-4 hover:bg-gray-100 transition cursor-pointer">
                            <h3 class="font-semibold text-gray-900">Apakah bisa melaporkan konten negatif di media sosial?</h3>
                            <span class="arrow text-primary text-2xl">▼</span>
                        </summary>
                        <div class="px-4 pb-4 text-gray-700 leading-relaxed">
                            <p>Ya, Anda dapat melaporkan konten negatif, hoax, atau ujaran kebencian terkait 
                            Kabupaten Pemalang kepada Diskominfo. Tim kami akan melakukan verifikasi dan 
                            mengambil tindakan sesuai prosedur yang berlaku, termasuk koordinasi dengan 
                            pihak berwenang jika diperlukan.</p>
                        </div>
                    </details>

                </div>
            </div>

        </div>

        <!-- CONTACT SECTION -->
        <div class="mt-12 bg-gradient-to-br from-primary to-blue-800 rounded-2xl p-8 text-white text-center">
            <h2 class="text-2xl font-bold mb-3">Masih Ada Pertanyaan?</h2>
            <p class="mb-6 text-blue-100">
                Jika pertanyaan Anda belum terjawab, jangan ragu untuk menghubungi kami
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#" class="bg-white text-primary px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition shadow-lg">
                    Hubungi Kami
                </a>
                <a href="#" class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-full font-semibold hover:bg-white/30 transition">
                    Kirim Email
                </a>
            </div>
        </div>

    </main>

@endsection
