@extends('layouts.app')

@section('title', 'Rute Bus | BIS Hub')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
    <div class="mb-8">
        <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-2">Jaringan Transportasi</p>
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Rute Bus Surabaya</h1>
        <p class="mt-2 text-slate-500">Pilih koridor untuk melihat halte yang dilalui.</p>
    </div>

    <div id="peta-rute" class="card overflow-hidden mb-7">
        <div id="routes-map" class="h-72" aria-label="Peta halte bus Surabaya"></div>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        @forelse ($buses as $bus)
            <article class="card overflow-hidden">
                <div class="h-1.5" style="background: {{ $bus->color }}"></div>
                <div class="p-5">
                    <div class="flex items-center gap-3"><x-route-badge :number="$bus->corridor_number" :color="$bus->color" size="large"/><div><h2 class="font-bold text-slate-800">{{ $bus->name }}</h2><p class="text-sm text-slate-500">{{ $bus->description }}</p></div></div>
                    <p class="mt-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Halte</p>
                    <p class="mt-1 text-sm text-slate-600">{{ $bus->routes->first()?->stops->pluck('name')->join(' → ') ?: 'Belum ada halte' }}</p>
                </div>
            </article>
        @empty
            <p class="text-slate-500">Belum ada rute aktif.</p>
        @endforelse
    </div>
</section>
@endsection

@push('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="">
@endpush
@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
    const routeStops = @json($mapStops);
    if (window.L && document.getElementById('routes-map')) {
        const map = L.map('routes-map').setView([-7.2756, 112.7508], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; OpenStreetMap contributors' }).addTo(map);
        routeStops.forEach((stop) => L.marker([stop.latitude, stop.longitude]).addTo(map).bindPopup(`<strong>${stop.name}</strong><br>${stop.code}${stop.address ? `<br>${stop.address}` : ''}`));
        if (routeStops.length) map.fitBounds(routeStops.map((stop) => [stop.latitude, stop.longitude]), { padding: [24, 24] });
    }
</script>
@endpush
