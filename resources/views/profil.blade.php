@extends('layouts.app')

@section('title', 'Profil - Diskominfo Kab. Pemalang')

@section('content')

    <!-- HERO SECTION -->
    <section class="bg-gradient-to-br from-primary to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Profil Dinas</h1>
                <p class="text-lg text-blue-100 leading-relaxed">
                    Dinas Komunikasi dan Informatika Kabupaten Pemalang merupakan unsur pelaksana urusan pemerintahan 
                    di bidang komunikasi dan informatika yang menjadi kewenangan daerah.
                </p>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid lg:grid-cols-4 gap-6">
            
            <!-- SIDEBAR MENU -->
            <aside class="lg:col-span-1">
                <div class="bg-gray-800 text-white rounded-2xl overflow-hidden shadow-lg sticky top-32">
                    <div class="bg-primary p-4">
                        <h2 class="font-bold text-lg">Menu Profil</h2>
                    </div>
                    <nav class="p-2">
                        <a href="#visi-misi" class="block px-4 py-3 hover:bg-gray-700 rounded-lg transition">
                            Visi dan Misi
                        </a>
                        <a href="#profil-dinas" class="block px-4 py-3 hover:bg-gray-700 rounded-lg transition">
                            Profil Dinas
                        </a>
                        <a href="#profil-kepala" class="block px-4 py-3 hover:bg-gray-700 rounded-lg transition">
                            Profil Kepala Dinas
                        </a>
                        <a href="#bidang-informasi" class="block px-4 py-3 hover:bg-gray-700 rounded-lg transition">
                            Bidang Informasi dan Komunikasi Publik
                        </a>
                        <a href="#bidang-egovernment" class="block px-4 py-3 hover:bg-gray-700 rounded-lg transition">
                            Bidang E-Government
                        </a>
                        <a href="#bidang-postel" class="block px-4 py-3 hover:bg-gray-700 rounded-lg transition">
                            Bidang Postel Sandi dan Statistik
                        </a>
                        <a href="#daftar-pegawai" class="block px-4 py-3 hover:bg-gray-700 rounded-lg transition">
                            Daftar Pegawai
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- CONTENT AREA -->
            <div class="lg:col-span-3 space-y-8">

                <!-- VISI DAN MISI -->
                <section id="visi-misi" class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-accent inline-block pb-2">
                        Visi dan Misi
                    </h2>
                    
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-bold text-primary mb-3">Visi</h3>
                            <div class="bg-primary/5 border-l-4 border-primary p-6 rounded-r-lg">
                                <p class="text-gray-700 leading-relaxed italic text-lg">
                                    "Terwujudnya Pemalang yang Maju, Sejahtera, dan Berdaya Saing melalui Pemanfaatan 
                                    Teknologi Informasi dan Komunikasi yang Optimal"
                                </p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-primary mb-3">Misi</h3>
                            <div class="space-y-3">
                                <div class="flex gap-3">
                                    <span class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">1</span>
                                    <p class="text-gray-700 leading-relaxed pt-1">
                                        Meningkatkan kualitas layanan publik berbasis teknologi informasi dan komunikasi
                                    </p>
                                </div>
                                <div class="flex gap-3">
                                    <span class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">2</span>
                                    <p class="text-gray-700 leading-relaxed pt-1">
                                        Mengembangkan infrastruktur teknologi informasi dan komunikasi yang handal
                                    </p>
                                </div>
                                <div class="flex gap-3">
                                    <span class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">3</span>
                                    <p class="text-gray-700 leading-relaxed pt-1">
                                        Meningkatkan literasi digital masyarakat dan aparatur pemerintah daerah
                                    </p>
                                </div>
                                <div class="flex gap-3">
                                    <span class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">4</span>
                                    <p class="text-gray-700 leading-relaxed pt-1">
                                        Mewujudkan tata kelola pemerintahan yang baik melalui sistem pemerintahan berbasis elektronik (SPBE)
                                    </p>
                                </div>
                                <div class="flex gap-3">
                                    <span class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">5</span>
                                    <p class="text-gray-700 leading-relaxed pt-1">
                                        Meningkatkan keamanan informasi dan persandian dalam penyelenggaraan pemerintahan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- PROFIL DINAS -->
                <section id="profil-dinas" class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-accent inline-block pb-2">
                        Profil Dinas
                    </h2>
                    
                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Dinas Komunikasi dan Informatika Kabupaten Pemalang dibentuk berdasarkan Peraturan Daerah 
                            Kabupaten Pemalang untuk melaksanakan urusan pemerintahan di bidang komunikasi dan informatika 
                            yang menjadi kewenangan daerah dan tugas pembantuan yang ditugaskan kepada Kabupaten Pemalang.
                        </p>
                        
                        <h3 class="text-xl font-semibold text-gray-900 mt-6 mb-3">Tugas Pokok</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Melaksanakan urusan pemerintahan dan tugas pembantuan di bidang komunikasi dan informatika 
                            yang meliputi pengelolaan informasi dan komunikasi publik, penerapan e-government, pengelolaan 
                            pos dan telekomunikasi, persandian, serta statistik sektoral.
                        </p>

                        <h3 class="text-xl font-semibold text-gray-900 mt-6 mb-3">Fungsi</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">•</span>
                                <span>Perumusan kebijakan teknis di bidang komunikasi dan informatika</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">•</span>
                                <span>Pelaksanaan tugas dukungan teknis di bidang komunikasi dan informatika</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">•</span>
                                <span>Pemantauan, evaluasi, dan pelaporan pelaksanaan tugas dukungan teknis</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">•</span>
                                <span>Pembinaan teknis penyelenggaraan fungsi-fungsi penunjang urusan pemerintahan daerah</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">•</span>
                                <span>Pelaksanaan fungsi lain yang diberikan oleh Bupati sesuai dengan tugas dan fungsinya</span>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- PROFIL KEPALA DINAS -->
                <section id="profil-kepala" class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-accent inline-block pb-2">
                        Profil Kepala Dinas
                    </h2>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <div class="bg-gradient-to-br from-primary to-blue-700 rounded-xl p-8 text-white text-center aspect-square flex items-center justify-center">
                                <div>
                                    <div class="text-6xl mb-3">👤</div>
                                    <div class="font-bold text-lg">Kepala Dinas</div>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="space-y-4">
                                <div>
                                    <h4 class="text-sm text-gray-500 mb-1">Nama</h4>
                                    <p class="text-xl font-bold text-gray-900">[Nama Kepala Dinas]</p>
                                </div>
                                <div>
                                    <h4 class="text-sm text-gray-500 mb-1">NIP</h4>
                                    <p class="text-gray-900">[NIP]</p>
                                </div>
                                <div>
                                    <h4 class="text-sm text-gray-500 mb-1">Pendidikan</h4>
                                    <p class="text-gray-900">[Pendidikan Terakhir]</p>
                                </div>
                                <div>
                                    <h4 class="text-sm text-gray-500 mb-1">Masa Jabatan</h4>
                                    <p class="text-gray-900">[Tahun] - Sekarang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h4 class="font-semibold text-gray-900 mb-3">Sambutan Kepala Dinas</h4>
                        <p class="text-gray-700 leading-relaxed italic">
                            "Kami berkomitmen untuk terus meningkatkan kualitas layanan komunikasi dan informatika 
                            guna mendukung pembangunan daerah dan kesejahteraan masyarakat Kabupaten Pemalang."
                        </p>
                    </div>
                </section>

                <!-- BIDANG INFORMASI DAN KOMUNIKASI PUBLIK -->
                <section id="bidang-informasi" class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-accent inline-block pb-2">
                        Bidang Informasi dan Komunikasi Publik
                    </h2>
                    
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed">
                            Bidang Informasi dan Komunikasi Publik mempunyai tugas melaksanakan penyiapan perumusan 
                            kebijakan teknis, pelaksanaan, evaluasi dan pelaporan di bidang pengelolaan informasi 
                            dan komunikasi publik.
                        </p>
                        
                        <h4 class="font-semibold text-gray-900 mt-6 mb-3">Fungsi:</h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengelolaan informasi untuk komunikasi publik</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pelayanan informasi publik</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengelolaan media komunikasi publik</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Fasilitasi hubungan media massa</span>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- BIDANG E-GOVERNMENT -->
                <section id="bidang-egovernment" class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-accent inline-block pb-2">
                        Bidang E-Government
                    </h2>
                    
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed">
                            Bidang E-Government mempunyai tugas melaksanakan penyiapan perumusan kebijakan teknis, 
                            pelaksanaan, evaluasi dan pelaporan di bidang penerapan e-government dan pengembangan 
                            infrastruktur teknologi informasi dan komunikasi.
                        </p>
                        
                        <h4 class="font-semibold text-gray-900 mt-6 mb-3">Fungsi:</h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengembangan sistem pemerintahan berbasis elektronik (SPBE)</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengelolaan infrastruktur teknologi informasi dan komunikasi</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengembangan aplikasi dan sistem informasi pemerintah daerah</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Integrasi sistem informasi dan data</span>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- BIDANG POSTEL SANDI DAN STATISTIK -->
                <section id="bidang-postel" class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-accent inline-block pb-2">
                        Bidang Postel Sandi dan Statistik
                    </h2>
                    
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed">
                            Bidang Pos dan Telekomunikasi, Persandian dan Statistik mempunyai tugas melaksanakan 
                            penyiapan perumusan kebijakan teknis, pelaksanaan, evaluasi dan pelaporan di bidang pos 
                            dan telekomunikasi, persandian serta statistik sektoral.
                        </p>
                        
                        <h4 class="font-semibold text-gray-900 mt-6 mb-3">Fungsi:</h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengelolaan pos dan telekomunikasi</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengelolaan keamanan informasi dan persandian</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengelolaan statistik sektoral komunikasi dan informatika</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="text-primary font-bold">→</span>
                                <span>Pengawasan dan pengendalian frekuensi radio</span>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- DAFTAR PEGAWAI -->
                <section id="daftar-pegawai" class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-accent inline-block pb-2">
                        Daftar Pegawai
                    </h2>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 text-center">
                        <div class="text-5xl mb-3">📋</div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Informasi Pegawai</h3>
                        <p class="text-gray-600 mb-4">
                            Daftar lengkap pegawai Diskominfo Kabupaten Pemalang dapat diakses melalui 
                            sistem kepegawaian atau hubungi bagian administrasi.
                        </p>
                        <div class="grid md:grid-cols-3 gap-4 mt-6">
                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                <div class="text-3xl font-bold text-primary">45+</div>
                                <div class="text-sm text-gray-600 mt-1">Total Pegawai</div>
                            </div>
                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                <div class="text-3xl font-bold text-primary">12</div>
                                <div class="text-sm text-gray-600 mt-1">PNS</div>
                            </div>
                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                <div class="text-3xl font-bold text-primary">33</div>
                                <div class="text-sm text-gray-600 mt-1">Non-PNS</div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </main>

@endsection
