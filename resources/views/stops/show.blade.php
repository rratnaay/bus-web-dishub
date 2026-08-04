<x-layouts.app title="{{ $stop->name }} | BIS Hub">
    <section class="max-w-4xl mx-auto px-5 py-10 md:py-14">
        <a class="text-sm font-bold text-blue-600 hover:text-blue-800" href="{{ route('home') }}">← Kembali ke beranda</a>
        <header class="mt-5 rounded-3xl bg-gradient-to-br from-slate-950 to-slate-800 p-7 text-white md:p-9" data-aos="fade-up">
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/10 text-2xl">⌖</span>
            <p class="mt-5 text-xs font-bold tracking-widest text-slate-400">DETAIL HALTE · {{ $stop->code }}</p>
            <h1 class="mt-2 text-3xl font-black">{{ $stop->name }}</h1>
            <p class="mt-2 text-slate-300">{{ $stop->address ?: 'Lokasi halte terdaftar' }}</p>
        </header>
        <section class="mt-7 rounded-3xl border border-slate-200 bg-white p-6 md:p-8" data-aos="fade-up">
            <div class="flex items-center justify-between"><div><h2 class="text-xl font-black">Jalur yang berhenti di sini</h2><p class="mt-1 text-sm text-slate-500">Pilih jalur untuk melihat urutan rute lengkap.</p></div><span class="rounded-lg bg-slate-100 px-3 py-1.5 text-sm font-bold">{{ $stop->routes->pluck('bus')->unique('id')->count() }} jalur</span></div>
            <div class="mt-6 space-y-3">@forelse($stop->routes->pluck('bus')->unique('id') as $bus)<article class="flex flex-col gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-blue-200 hover:shadow-md sm:flex-row sm:items-center"><x-route-badge :number="$bus->corridor_number" :color="$bus->color" size="large"/><div class="min-w-0 flex-1"><p class="font-black">{{ $bus->name }}</p><p class="mt-1 text-sm text-slate-500">{{ $bus->routes->first()?->name ?? 'Koridor bus' }}</p>@if($bus->schedules->first())<p class="mt-2 text-xs font-semibold text-slate-500">◷ {{ substr($bus->schedules->first()->start_time,0,5) }}–{{ substr($bus->schedules->first()->end_time,0,5) }}</p>@endif</div><a href="{{ route('buses.show',$bus) }}" class="rounded-xl bg-blue-600 px-4 py-2.5 text-center text-sm font-bold text-white transition hover:bg-blue-700">Lihat Rute</a></article>@empty <p class="rounded-xl bg-slate-50 p-5 text-sm text-slate-500">Belum ada jalur bus yang berhenti di halte ini.</p>@endforelse</div>
        </section>
    </section>
</x-layouts.app>
