<x-layouts.app title="{{ $bus->name }} | BIS Hub">
    @php($stops = $bus->routes->flatMap->stops->sortBy('pivot.sequence')->unique('id')->values())
    @php($mainRoute = $bus->routes->first())
    <section class="max-w-6xl mx-auto px-5 py-10 md:py-14">
        <a class="text-sm font-bold text-blue-600 hover:text-blue-800" href="{{ route('search') }}">← Kembali ke hasil pencarian</a>
        <div class="mt-5 grid gap-7 lg:grid-cols-[1.45fr_.85fr]">
            <div class="space-y-7">
                <header class="rounded-3xl bg-white border border-slate-200 p-6 md:p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex items-start gap-4"><x-route-badge :number="$bus->corridor_number" :color="$bus->color" size="large"/><div><p class="text-xs font-bold uppercase tracking-widest text-slate-400">Jalur bus · {{ $bus->code }}</p><h1 class="mt-1 text-3xl font-black tracking-tight">{{ $bus->name }}</h1><p class="mt-2 text-slate-600">{{ $mainRoute?->name ?? $bus->description }}</p></div></div>
                    <div class="mt-6 flex flex-wrap gap-3"><span class="rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-700">⌖ <b>{{ $stops->count() }}</b> halte</span><span class="rounded-lg bg-slate-100 px-3 py-2 text-sm text-slate-700">◷ <b>{{ $bus->estimated_minutes ? $bus->estimated_minutes.' menit' : 'Estimasi belum tersedia' }}</b></span></div>
                </header>
                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm" data-aos="fade-up"><div class="border-b border-slate-100 px-6 py-5"><h2 class="font-black text-xl">Peta rute</h2><p class="mt-1 text-sm text-slate-500">Ketuk marker untuk melihat nama halte.</p></div><div id="route-map"></div></div>
            </div>
            <aside class="space-y-5">
                <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm" data-aos="fade-left"><div class="flex items-center justify-between"><div><h2 class="font-black text-xl">Halte perjalanan</h2><p class="mt-1 text-sm text-slate-500">Pilih halte untuk menandainya aktif.</p></div><span class="h-3 w-3 rounded-full" style="background:{{ $bus->color }}"></span></div>
                    <ol id="stops-timeline" class="mt-6">@forelse($stops as $index => $stop)<li class="timeline-stop group relative flex cursor-pointer gap-4 pb-6 last:pb-0" data-stop="{{ $index }}"><div class="flex w-5 flex-col items-center"><span class="timeline-dot mt-0.5 h-5 w-5 rounded-full border-[3px] border-slate-300 bg-white transition"></span>@if(! $loop->last)<span class="mt-1 w-0.5 flex-1 bg-slate-200"></span>@endif</div><a href="{{ route('stops.show',$stop) }}" class="min-w-0 pb-1"><p class="font-bold text-slate-500 transition group-hover:text-slate-900">{{ $stop->name }}</p><p class="mt-0.5 text-xs text-slate-400">{{ $index === 0 ? 'Titik keberangkatan' : ($loop->last ? 'Titik tujuan' : $stop->address) }}</p></a></li>@empty <li class="text-sm text-slate-500">Halte belum ditambahkan ke rute ini.</li>@endforelse</ol>
                </section>
                <section class="rounded-3xl bg-slate-900 p-6 text-white" data-aos="fade-left"><h2 class="font-black">Jam operasional</h2>@forelse($bus->schedules as $s)<div class="mt-4 border-t border-slate-700 pt-4"><p class="text-sm text-slate-400">{{ $s->day_type }}</p><p class="mt-1 font-bold">{{ substr($s->start_time,0,5) }}–{{ substr($s->end_time,0,5) }} @if($s->headway_minutes)<span class="font-normal text-slate-400">· tiap {{ $s->headway_minutes }} menit</span>@endif</p></div>@empty <p class="mt-3 text-sm text-slate-400">Jadwal belum tersedia.</p>@endforelse</section>
            </aside>
        </div>
    </section>
    <x-slot:scripts><script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script><script>
        const stops=@json($stops); const lineColor='{{ $bus->color }}'; const map=L.map('route-map'); const points=stops.map(s=>[Number(s.latitude),Number(s.longitude)]);
        if(points.length){L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution:'© OpenStreetMap'}).addTo(map);L.polyline(points,{color:lineColor,weight:5,opacity:.9}).addTo(map);points.forEach((point,index)=>L.circleMarker(point,{radius:7,color:'#fff',weight:3,fillColor:lineColor,fillOpacity:1}).addTo(map).bindPopup(`<b>${index+1}. ${stops[index].name}</b>`));map.fitBounds(points,{padding:[35,35]});}else map.setView([-7.2575,112.7521],12);
        const selectStop=(index)=>document.querySelectorAll('.timeline-stop').forEach((item,i)=>{const active=i===index;item.querySelector('.timeline-dot').style.borderColor=active?lineColor:'#cbd5e1';item.querySelector('.timeline-dot').style.backgroundColor=active?lineColor:'#fff';item.querySelector('p').classList.toggle('text-slate-900',active);item.querySelector('p').classList.toggle('text-slate-500',!active);}); document.querySelectorAll('.timeline-stop').forEach(item=>item.addEventListener('click',()=>selectStop(+item.dataset.stop))); if(stops.length) selectStop(0);
    </script></x-slot:scripts>
</x-layouts.app>
