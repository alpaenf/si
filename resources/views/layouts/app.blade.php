<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Diskominfo Kab. Pemalang')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0057a3',
                        'primary-soft': '#e5f1ff',
                        accent: '#f7a823',
                        dark: '#1b2430',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">

    <!-- HEADER -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between gap-4 flex-wrap">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logo.png') }}" alt="Logo Diskominfo Pemalang" class="w-30 h-14 object-contain">
                    <div>
                        <h1 class="text-primary font-bold text-base uppercase tracking-wide">Diskominfo Kab. Pemalang</h1>
                        <p class="text-gray-600 text-xs">Dinas Komunikasi dan Informatika Kabupaten Pemalang</p>
                    </div>
                </a>
                
                <form class="flex items-center gap-2">
                    <input type="text" placeholder="Cari layanan..." 
                           class="border border-gray-300 rounded-full px-4 py-2 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    <button type="submit" class="bg-primary hover:bg-blue-700 text-white px-5 py-2 rounded-full text-sm font-medium transition shadow-md hover:shadow-lg">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- NAV -->
    <nav class="bg-white border-t border-b border-gray-200 sticky top-[80px] z-40">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex gap-6 text-sm overflow-x-auto">
                <a href="{{ route('home') }}" class="py-3 px-1 border-b-2 {{ Request::is('/') ? 'border-accent text-primary font-semibold' : 'border-transparent text-gray-600 hover:text-primary hover:border-gray-300' }} transition whitespace-nowrap">Beranda</a>
                <a href="{{ route('profil') }}" class="py-3 px-1 border-b-2 {{ Request::is('profil') ? 'border-accent text-primary font-semibold' : 'border-transparent text-gray-600 hover:text-primary hover:border-gray-300' }} transition whitespace-nowrap">Profil</a>
                <a href="{{ route('faq') }}" class="py-3 px-1 border-b-2 {{ Request::is('faq') ? 'border-accent text-primary font-semibold' : 'border-transparent text-gray-600 hover:text-primary hover:border-gray-300' }} transition whitespace-nowrap">FAQ</a>
                <a href="{{ route('sakip') }}" class="py-3 px-1 border-b-2 {{ Request::is('sakip') ? 'border-accent text-primary font-semibold' : 'border-transparent text-gray-600 hover:text-primary hover:border-gray-300' }} transition whitespace-nowrap">SAKIP</a>
                <a href="{{ route('layanan') }}" class="py-3 px-1 border-b-2 {{ Request::is('layanan') ? 'border-accent text-primary font-semibold' : 'border-transparent text-gray-600 hover:text-primary hover:border-gray-300' }} transition whitespace-nowrap">Layanan Publik</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-30 h-10">
                        <div>
                            <h3 class="font-bold text-white text-sm">Diskominfo Kab. Pemalang</h3>
                            <p class="text-xs text-gray-400">Dinas Komunikasi dan Informatika</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed">
                        Melayani masyarakat dengan teknologi informasi dan komunikasi yang inovatif untuk Pemalang yang lebih maju.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-semibold text-white mb-3 text-sm uppercase tracking-wide">Tautan Cepat</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('profil') }}" class="hover:text-white transition">Profil Dinas</a></li>
                        <li><a href="{{ route('layanan') }}" class="hover:text-white transition">Layanan Publik</a></li>
                        <li><a href="{{ route('sakip') }}" class="hover:text-white transition">SAKIP</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold text-white mb-3 text-sm uppercase tracking-wide">Hubungi Kami</h4>
                    <ul class="space-y-2 text-sm">
                        <li>Alamat: Jl. Pemuda No. 1, Pemalang</li>
                        <li>Telepon: (0284) 321234</li>
                        <li>Email: diskominfo@pemalangkab.go.id</li>
                        <li class="pt-2 flex gap-3">
                            <a href="#" class="hover:text-white transition">Facebook</a>
                            <a href="#" class="hover:text-white transition">Instagram</a>
                            <a href="#" class="hover:text-white transition">Twitter</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-6 text-center text-sm text-gray-500">
                <p>&copy; 2025 Diskominfo Kabupaten Pemalang. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
