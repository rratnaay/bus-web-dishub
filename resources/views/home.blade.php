{{-- ===================================================
     HALAMAN: HOME
     =================================================== --}}

@extends('layouts.app')

@section('title', 'BIS Hub – Temukan Rute Bus Surabaya')

@section('content')

    {{-- ─────────────────────────────────────────────
         HERO SECTION
         ───────────────────────────────────────────── --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 py-14 lg:py-20">

        {{-- Decorative circles --}}
        <div class="absolute -top-16 -right-16 w-64 h-64 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-blue-400/20 rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96
                    bg-white/3 rounded-full blur-3xl pointer-events-none"></div>

        {{-- Dot grid pattern --}}
        <div class="absolute inset-0 opacity-10 pointer-events-none"
             style="background-image: radial-gradient(circle, rgba(255,255,255,0.6) 1px, transparent 1px);
                    background-size: 28px 28px;">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 bg-white/10 text-white/90 text-xs font-semibold
                        px-3 py-1.5 rounded-full border border-white/20 mb-5 backdrop-blur-sm">
                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                Layanan Bus Aktif – Surabaya
            </div>

            {{-- Headline --}}
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight tracking-tight mb-4">
                Perjalanan Lebih Mudah <br class="hidden sm:block">
                <span class="text-blue-200">dengan BIS Hub</span>
            </h1>

            {{-- Sub --}}
            <p class="text-blue-100 text-base sm:text-lg max-w-xl mx-auto mb-8 font-light leading-relaxed">
                Temukan rute bus terbaik, halte terdekat, dan jadwal perjalanan di Kota Surabaya — real-time, akurat, dan gratis.
            </p>

            {{-- Quick stats --}}
            <div class="flex flex-wrap justify-center gap-6 sm:gap-10">
                @foreach ([
                    ['num' => '24+',    'label' => 'Koridor Bus'],
                    ['num' => '300+',   'label' => 'Halte Aktif'],
                    ['num' => '50rb+',  'label' => 'Pengguna/Hari'],
                ] as $stat)
                <div class="text-center">
                    <p class="text-2xl font-extrabold text-white">{{ $stat['num'] }}</p>
                    <p class="text-xs text-blue-200 font-medium mt-0.5">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────────────────────────────────────────────
         MAIN CONTENT: 2-KOLOM GRID
         ───────────────────────────────────────────── --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-start">

            {{-- Kolom Kiri: Form Pencarian --}}
            <div class="lg:sticky lg:top-24">
                @include('components.search-form')

                {{-- Info Cards bawah form --}}
                <div class="grid grid-cols-2 gap-3 mt-4">
                    <div class="card shadow-card p-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-700">Jadwal Real-Time</p>
                            <p class="text-[10px] text-slate-400">Update setiap menit</p>
                        </div>
                    </div>
                    <div class="card shadow-card p-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-700">Rute Terverifikasi</p>
                            <p class="text-[10px] text-slate-400">Resmi dari Pemkot</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Hasil Rute --}}
            <div>
                @include('components.route-result')

                {{-- Info footer --}}
                <p class="text-center text-xs text-slate-400 mt-3">
                    Data rute diperbarui secara berkala. Durasi perjalanan bersifat estimasi.
                </p>
            </div>

        </div>
    </section>

    {{-- ─────────────────────────────────────────────
         FITUR UNGGULAN
         ───────────────────────────────────────────── --}}
    <section class="bg-white border-t border-slate-100 py-12 lg:py-16 mt-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-10">
                <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-2">Kenapa BIS Hub?</p>
                <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-800 tracking-tight">
                    Semua yang kamu butuhkan <br class="hidden sm:block">
                    <span class="text-blue-600">dalam satu aplikasi</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                @foreach ([
                    [
                        'icon'  => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7',
                        'color' => 'blue',
                        'title' => 'Pencarian Rute Cerdas',
                        'desc'  => 'Temukan rute bus terpendek dan terhemat berdasarkan lokasi Anda saat ini.',
                    ],
                    [
                        'icon'  => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                        'color' => 'emerald',
                        'title' => 'Jadwal Real-Time',
                        'desc'  => 'Pantau posisi bus secara langsung dan dapatkan estimasi waktu kedatangan akurat.',
                    ],
                    [
                        'icon'  => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z',
                        'color' => 'orange',
                        'title' => 'Info Halte Terdekat',
                        'desc'  => 'Cari halte bus terdekat dari posisi Anda dengan panduan rute jalan kaki.',
                    ],
                    [
                        'icon'  => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                        'color' => 'purple',
                        'title' => 'Info Tarif Transparan',
                        'desc'  => 'Ketahui biaya perjalanan di muka sebelum menaiki bus, tanpa biaya tersembunyi.',
                    ],
                    [
                        'icon'  => 'M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z',
                        'color' => 'rose',
                        'title' => 'Bagikan Rute',
                        'desc'  => 'Bagikan rute perjalanan kepada teman atau keluarga hanya dengan satu klik.',
                    ],
                    [
                        'icon'  => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        'color' => 'teal',
                        'title' => 'Data Resmi & Terpercaya',
                        'desc'  => 'Semua data rute bersumber dari UPTD Transportasi Kota Surabaya yang terverifikasi.',
                    ],
                ] as $feature)
                @php
                    $colorMap = [
                        'blue'   => ['bg' => 'bg-blue-50',   'icon' => 'text-blue-600',   'ring' => 'ring-blue-100'],
                        'emerald'=> ['bg' => 'bg-emerald-50','icon' => 'text-emerald-600','ring' => 'ring-emerald-100'],
                        'orange' => ['bg' => 'bg-orange-50', 'icon' => 'text-orange-500', 'ring' => 'ring-orange-100'],
                        'purple' => ['bg' => 'bg-purple-50', 'icon' => 'text-purple-600', 'ring' => 'ring-purple-100'],
                        'rose'   => ['bg' => 'bg-rose-50',   'icon' => 'text-rose-500',   'ring' => 'ring-rose-100'],
                        'teal'   => ['bg' => 'bg-teal-50',   'icon' => 'text-teal-600',   'ring' => 'ring-teal-100'],
                    ];
                    $c = $colorMap[$feature['color']] ?? $colorMap['blue'];
                @endphp
                <div class="card shadow-card p-6 hover:shadow-card-hover group">
                    <div class="w-12 h-12 {{ $c['bg'] }} {{ $c['icon'] }} rounded-xl flex items-center justify-center
                                mb-4 ring-4 {{ $c['ring'] }} group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-800 mb-1.5 text-base">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- ─────────────────────────────────────────────
         CTA BANNER
         ───────────────────────────────────────────── --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        <div class="relative bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl overflow-hidden
                    px-6 py-10 lg:px-12 lg:py-14 text-center">
            {{-- Decoration --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-blue-400/20 rounded-full translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

            <div class="relative">
                <h2 class="text-2xl lg:text-3xl font-extrabold text-white mb-3">
                    Siap memulai perjalanan?
                </h2>
                <p class="text-blue-100 mb-7 max-w-md mx-auto text-sm">
                    Cari rute bus Surabaya sekarang — cepat, mudah, dan tanpa ribet.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-3">
                    <a href="#search-form"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-blue-700 font-bold
                              text-sm rounded-xl hover:shadow-lg hover:shadow-blue-900/30 hover:-translate-y-0.5
                              active:translate-y-0 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-white">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Cari Rute Sekarang
                    </a>
                    <a href="{{ route('stops.index') }}"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3 border border-white/40 text-white font-semibold
                              text-sm rounded-xl hover:bg-white/10 hover:-translate-y-0.5 active:translate-y-0
                              transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-white/50">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Lihat Semua Halte
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="">
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
    (function () {
        const stops = @json($mapStops);
        const form = document.getElementById('search-form');
        const mapElement = document.getElementById('route-map');
        let map;
        let routeLayer;

        const escapeHtml = (value) => String(value).replace(/[&<>'"]/g, (character) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#039;', '"': '&quot;' })[character]);

        if (window.L && mapElement) {
            map = L.map(mapElement).setView([-7.2756, 112.7508], 12);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors',
            }).addTo(map);

            const stopLayer = L.featureGroup().addTo(map);
            stops.forEach((stop) => {
                L.marker([Number(stop.latitude), Number(stop.longitude)])
                    .bindPopup(`<strong>${escapeHtml(stop.name)}</strong><br>${escapeHtml(stop.code)}${stop.address ? `<br>${escapeHtml(stop.address)}` : ''}`)
                    .addTo(stopLayer);
            });
            if (stops.length) map.fitBounds(stopLayer.getBounds(), { padding: [24, 24] });
        }

        const setResultMessage = (message) => {
            document.getElementById('route-bus').textContent = message;
            document.getElementById('route-description').textContent = 'Pilih halte asal dan tujuan untuk melihat rute.';
        };

        const updateRoute = (route) => {
            document.getElementById('route-minutes').textContent = route.minutes || '—';
            document.getElementById('route-origin').textContent = route.origin.name;
            document.getElementById('route-destination').textContent = route.destination.name;
            document.getElementById('route-bus').textContent = `${route.bus_name} – Koridor ${route.corridor}`;
            document.getElementById('route-description').textContent = `${route.origin.name} → ${route.destination.name}`;

            const steps = document.getElementById('journey-steps');
            steps.innerHTML = [
                `Naik di ${escapeHtml(route.origin.name)}`,
                `Naik ${escapeHtml(route.bus_name)} Koridor ${escapeHtml(route.corridor)}`,
                `Lewati ${route.stops.length} halte`,
                `Turun di ${escapeHtml(route.destination.name)}`,
            ].map((text, index) => `<div class="route-step relative grid grid-cols-[1rem_minmax(0,1fr)] items-start gap-3 ${index < 3 ? 'pb-4' : ''}"><div class="relative z-10 mt-0.5 flex h-4 w-4 items-center justify-center"><div class="w-4 h-4 ${index === 1 ? 'bg-[#4D4AB6]' : 'bg-slate-400'} rounded-full flex items-center justify-center ring-2 ring-slate-100"><div class="w-1.5 h-1.5 bg-white rounded-full"></div></div></div><div class="min-w-0"><p class="text-sm font-medium leading-normal text-slate-700">${text}</p></div></div>`).join('');

            if (!map) return;
            if (routeLayer) routeLayer.remove();
            routeLayer = L.featureGroup().addTo(map);
            const coordinates = route.stops.map((stop) => [Number(stop.latitude), Number(stop.longitude)]);
            L.polyline(coordinates, { color: route.color || '#2563eb', weight: 5, opacity: 0.85 }).addTo(routeLayer);
            route.stops.forEach((stop) => L.circleMarker([Number(stop.latitude), Number(stop.longitude)], { radius: 6, color: route.color || '#2563eb', fillOpacity: 1 }).bindPopup(`<strong>${escapeHtml(stop.name)}</strong><br>${escapeHtml(stop.code)}`).addTo(routeLayer));
            if (coordinates.length) map.fitBounds(routeLayer.getBounds(), { padding: [28, 28] });
        };

        if (!form) return;
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const button = document.getElementById('btn-cari');
            const originalLabel = button.innerHTML;
            button.disabled = true;
            button.textContent = 'Mencari rute...';

            try {
                const response = await fetch(`${form.action}?${new URLSearchParams(new FormData(form))}`, { headers: { Accept: 'application/json' } });
                const payload = await response.json();
                if (!response.ok) throw new Error(payload.message || 'Rute tidak dapat ditemukan.');
                updateRoute(payload.route);
            } catch (error) {
                setResultMessage(error.message);
            } finally {
                button.disabled = false;
                button.innerHTML = originalLabel;
            }
        });
    })();
</script>
@endpush
