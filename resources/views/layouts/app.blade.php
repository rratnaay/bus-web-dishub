<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BIS Hub – Bus Information System Hub. Cari rute bus Surabaya dengan mudah, cepat, dan akurat.">
    <meta name="keywords" content="bus surabaya, rute bus, jadwal bus, BIS Hub, transportasi surabaya">
    <title>@yield('title', 'BIS Hub – Bus Information System Hub')</title>

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Vite: CSS + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

    @stack('head')
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-slate-100 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                    </div>
                    <span class="font-bold text-slate-700 text-sm">BIS Hub</span>
                </div>
                <p class="text-slate-400 text-xs text-center">
                    &copy; {{ date('Y') }} BIS Hub – Bus Information System Hub. Hak cipta dilindungi.
                </p>
                <div class="flex items-center gap-4 text-xs text-slate-400">
                    <a href="#" class="hover:text-blue-600 transition-colors">Privasi</a>
                    <a href="#" class="hover:text-blue-600 transition-colors">Ketentuan</a>
                    <a href="#" class="hover:text-blue-600 transition-colors">Kontak</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
