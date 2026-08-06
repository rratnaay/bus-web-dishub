{{-- ===================================================
     KOMPONEN: HASIL RUTE
     File: resources/views/components/route-result.blade.php
     =================================================== --}}

<div class="space-y-4 animate-slide-up" style="animation-delay: 0.1s;">

    {{-- ─────────────────────────────────────────────
         MAP PLACEHOLDER
         ───────────────────────────────────────────── --}}
    <div class="card shadow-card overflow-hidden">
        <div class="map-placeholder h-64 relative">

            {{-- Grid lines (visual map feel) --}}
            <svg class="absolute inset-0 w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="32" height="32" patternUnits="userSpaceOnUse">
                        <path d="M 32 0 L 0 0 0 32" fill="none" stroke="#94a3b8" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"/>
            </svg>

            {{-- Background gradient --}}
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-slate-100 to-slate-200"></div>

            {{-- Route line SVG simulation --}}
            <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
                {{-- Road background (thick grey) --}}
                <path d="M 60 200 Q 120 160 180 120 Q 240 80 300 90 Q 360 100 400 70"
                      stroke="#cbd5e1" stroke-width="8" fill="none" stroke-linecap="round"/>
                {{-- Route path (blue) --}}
                <path d="M 60 200 Q 120 160 180 120 Q 240 80 300 90 Q 360 100 400 70"
                      stroke="#5d3bf6" stroke-width="4" fill="none" stroke-linecap="round"
                      stroke-dasharray="8 4" class="animate-pulse-subtle"/>
                {{-- Road 2 --}}
                <path d="M 80 240 L 250 190 L 380 160"
                      stroke="#e2e8f0" stroke-width="6" fill="none" stroke-linecap="round"/>
                <path d="M 20 120 L 150 140 L 250 110"
                      stroke="#e2e8f0" stroke-width="5" fill="none" stroke-linecap="round"/>
            </svg>

            {{-- Origin pin --}}
            <div class="absolute bottom-12 left-12 flex flex-col items-center gap-1">
                <div class="w-5 h-5 bg-white border-3 border-blue-600 rounded-full shadow-md
                            ring-4 ring-blue-100 z-10"></div>
                <div class="bg-white text-xs font-semibold text-blue-700 px-2 py-0.5 rounded-full
                            shadow-sm border border-blue-100 whitespace-nowrap">
                    Terminal Purabaya
                </div>
            </div>

            {{-- Destination pin --}}
            <div class="absolute top-6 right-12 flex flex-col items-center gap-1">
                <div class="text-red-500 drop-shadow-md">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                </div>
                <div class="bg-white text-xs font-semibold text-red-600 px-2 py-0.5 rounded-full
                            shadow-sm border border-red-100 whitespace-nowrap">
                    Tunjungan Plaza
                </div>
            </div>

            {{-- Center label --}}
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="bg-white/80 backdrop-blur-sm rounded-xl px-4 py-2 shadow-md border border-slate-200/50
                            flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    <span class="text-xs font-semibold text-slate-600">Peta Rute Bus</span>
                    <span class="badge-blue">Live</span>
                </div>
            </div>

            {{-- Zoom controls --}}
            <div class="absolute right-3 top-1/2 -translate-y-1/2 flex flex-col gap-1">
                <button class="w-7 h-7 bg-white rounded-lg shadow-sm border border-slate-200 flex items-center justify-center
                               text-slate-500 hover:bg-slate-50 hover:text-slate-700 transition-colors text-sm font-bold
                               focus:outline-none" aria-label="Zoom in">+</button>
                <button class="w-7 h-7 bg-white rounded-lg shadow-sm border border-slate-200 flex items-center justify-center
                               text-slate-500 hover:bg-slate-50 hover:text-slate-700 transition-colors text-sm font-bold
                               focus:outline-none" aria-label="Zoom out">−</button>
            </div>
        </div>
    </div>

    {{-- ─────────────────────────────────────────────
         INFO RINGKASAN
         ───────────────────────────────────────────── --}}
    <div class="card shadow-card p-5">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-bold text-slate-800">Rute Terbaik</h3>
            <span class="badge-blue">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Direkomendasikan
            </span>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-2 gap-3 mb-4">

            {{-- Waktu Tempuh --}}
            <div class="bg-blue-50 rounded-xl p-3.5 flex items-start gap-3">
                <div class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4.5 h-4.5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-blue-500 uppercase tracking-wider">Waktu</p>
                    <p class="text-lg font-bold text-blue-700 leading-tight">43 <span class="text-sm font-semibold">menit</span></p>
                    <p class="text-[10px] text-blue-400">±5 menit</p>
                </div>
            </div>

            {{-- Harga --}}
            <div class="bg-emerald-50 rounded-xl p-3.5 flex items-start gap-3">
                <div class="w-9 h-9 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4.5 h-4.5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-emerald-500 uppercase tracking-wider">Harga</p>
                    <p class="text-lg font-bold text-emerald-700 leading-tight">Rp <span>5.000</span></p>
                    <p class="text-[10px] text-emerald-400">sekali jalan</p>
                </div>
            </div>

            {{-- Halte Naik --}}
            <div class="bg-slate-50 rounded-xl p-3.5 flex items-start gap-3">
                <div class="w-9 h-9 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4.5 h-4.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider">Naik di</p>
                    <p class="text-sm font-bold text-slate-700 leading-tight truncate">Halte Dukuh Menanggal</p>
                    <p class="text-[10px] text-slate-400">± 5 menit jalan kaki</p>
                </div>
            </div>

            {{-- Halte Turun --}}
            <div class="bg-slate-50 rounded-xl p-3.5 flex items-start gap-3">
                <div class="w-9 h-9 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4.5 h-4.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider">Turun di</p>
                    <p class="text-sm font-bold text-slate-700 leading-tight truncate">Halte Kaliasin</p>
                    <p class="text-[10px] text-slate-400">± 3 menit jalan kaki</p>
                </div>
            </div>

        </div>

        <div class="flex items-center gap-2 p-3 bg-slate-50 rounded-xl mb-4">
            <div class="w-8 h-8 bg-[#4D4AB6] rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 7h8M8 11h8m-7 4h6M5 3h14a2 2 0 012 2v11a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-700">Surabaya Bus – Koridor R4</p>
                <p class="text-[10px] text-slate-400 truncate">Terminal Purabaya → Tanjung Perak</p>
            </div>
            <span class="badge-green flex-shrink-0">
                <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" class="animate-ping" style="animation-duration:2s;"/>
                    <circle cx="4" cy="4" r="2"/>
                </svg>
                Beroperasi
            </span>
        </div>

        {{-- Langkah Perjalanan (collapsible) --}}
        <div>
            <button id="steps-toggle"
                    aria-expanded="false"
                    aria-controls="journey-steps"
                    class="w-full flex items-center justify-between py-2 px-3 rounded-lg text-sm font-semibold
                           text-slate-600 bg-slate-50 hover:bg-slate-100 transition-colors duration-150
                           focus:outline-none focus:ring-2 focus:ring-blue-300">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Langkah Perjalanan
                </span>
                <svg id="steps-arrow" class="w-4 h-4 text-slate-400 transition-transform duration-200"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div id="journey-steps" class="hidden mt-3 space-y-0 animate-fade-in">

                @php
                $steps = [
                    ['type' => 'walk', 'icon' => 'walk',    'color' => 'slate',  'text' => 'Jalan kaki 5 menit ke Halte Dukuh Menanggal', 'sub' => '± 350 meter'],
                    ['type' => 'bus',  'icon' => 'bus',     'color' => 'blue',   'text' => 'Naik Surabaya Bus Koridor R4',                  'sub' => 'Arah Tanjung Perak'],
                    ['type' => 'stop', 'icon' => 'stop',    'color' => 'blue',   'text' => '12 halte pemberhentian',                        'sub' => '~38 menit di bus'],
                    ['type' => 'walk', 'icon' => 'walk',    'color' => 'slate',  'text' => 'Turun di Halte Kaliasin',                        'sub' => ''],
                    ['type' => 'walk', 'icon' => 'walk',    'color' => 'emerald','text' => 'Jalan kaki 3 menit ke tujuan',                  'sub' => 'Tunjungan Plaza'],
                ];
                @endphp

                @foreach ($steps as $i => $step)
                <div class="route-step relative {{ !$loop->last ? 'pb-0' : '' }}">
                    {{-- Vertical connector line --}}
                    @unless ($loop->last)
                    <div class="absolute left-[7px] top-6 bottom-0 w-px bg-slate-200"></div>
                    @endunless

                    {{-- Dot --}}
                    <div class="relative z-10 mt-1 flex-shrink-0">
                        @if ($step['type'] === 'bus')
                            <div class="w-4 h-4 bg-[#4D4AB6] rounded-full flex items-center justify-center ring-2 ring-blue-100">
                                <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
                            </div>
                        @elseif ($step['type'] === 'stop')
                            <div class="w-4 h-4 bg-slate-300 rounded-full flex items-center justify-center ring-2 ring-slate-100">
                                <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
                            </div>
                        @else
                            <div class="w-4 h-4 bg-{{ $step['color'] === 'emerald' ? 'emerald' : 'slate' }}-400 rounded-full
                                        flex items-center justify-center ring-2 ring-{{ $step['color'] === 'emerald' ? 'emerald' : 'slate' }}-100">
                                <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
                            </div>
                        @endif
                    </div>

                    {{-- Text --}}
                    <div class="flex-1 min-w-0 -mt-4 ml-7">
                        <p class="text-sm text-slate-700 font-medium leading-snug">{{ $step['text'] }}</p>
                        @if ($step['sub'])
                            <p class="text-xs text-slate-400 mt-0.5">{{ $step['sub'] }}</p>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex gap-2 mt-4">
            <button class="flex-1 py-2.5 px-4 bg-blue-600 text-white text-xs font-semibold rounded-xl
                           hover:bg-blue-700 hover:shadow-md hover:shadow-blue-200 hover:-translate-y-0.5
                           active:translate-y-0 transition-all duration-200 flex items-center justify-center gap-1.5
                           focus:outline-none focus:ring-2 focus:ring-blue-400">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                </svg>
                Mulai Navigasi
            </button>
            <button class="py-2.5 px-4 bg-slate-100 text-slate-600 text-xs font-semibold rounded-xl
                           hover:bg-slate-200 active:scale-95 transition-all duration-150 flex items-center gap-1.5
                           focus:outline-none focus:ring-2 focus:ring-slate-300">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                </svg>
                Bagikan
            </button>
            <button class="py-2.5 px-4 bg-slate-100 text-slate-600 text-xs font-semibold rounded-xl
                           hover:bg-slate-200 active:scale-95 transition-all duration-150 flex items-center gap-1.5
                           focus:outline-none focus:ring-2 focus:ring-slate-300">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                </svg>
                Simpan
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    (function () {
        const toggleBtn   = document.getElementById('steps-toggle');
        const stepsPanel  = document.getElementById('journey-steps');
        const arrowIcon   = document.getElementById('steps-arrow');

        if (!toggleBtn || !stepsPanel) return;

        toggleBtn.addEventListener('click', function () {
            const isOpen = !stepsPanel.classList.contains('hidden');

            if (isOpen) {
                stepsPanel.classList.add('hidden');
                arrowIcon.style.transform = 'rotate(0deg)';
                toggleBtn.setAttribute('aria-expanded', 'false');
            } else {
                stepsPanel.classList.remove('hidden');
                arrowIcon.style.transform = 'rotate(180deg)';
                toggleBtn.setAttribute('aria-expanded', 'true');
            }
        });
    })();
</script>
@endpush
