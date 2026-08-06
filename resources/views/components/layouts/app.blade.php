<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>{{ $title ?? 'BIS Hub' }}</title>
        <script src="https://cdn.tailwindcss.com">
        </script>
        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
        <style>body{background:#f8fafc}#route-map{height:440px}.leaflet-container{z-index:0}</style>
    </head>
    <body class="text-slate-800">
        <nav class="bg-white/95 sticky top-0 z-20 border-b">
            <div class="max-w-6xl mx-auto px-5 h-16 flex items-center justify-between">
                <a href="{{ route('home') }}" class="font-black text-xl text-teal-700">BIS<span class="text-amber-500">HUB</span>
                </a>
                <div class="flex gap-8 text-sm font-bold">
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('search') }}">Cari Rute</a>
                </div>
                </div></nav><main>{{ $slot }}</main><footer class="mt-16 bg-slate-900 text-slate-300">
                    <div class="max-w-6xl mx-auto px-5 py-8 text-sm flex justify-between">
                        <span>© {{ date('Y') }} Dinas Perhubungan</span><span>Mobilitas lebih mudah untuk semua.</span>
                    </div>
                </footer>
                <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                <script>AOS.init({once:true,duration:650});</script>{{ $scripts ?? '' }}</body>
</html>
