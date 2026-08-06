{{-- ===================================================
     KOMPONEN: FORM PENCARIAN RUTE
     File: resources/views/components/search-form.blade.php
     =================================================== --}}

<div class="card shadow-card p-6 lg:p-7 animate-slide-up" style="animation-delay: 0.05s;">

    {{-- Header --}}
    <div class="mb-6">
        <div class="flex items-center gap-2 mb-1">
            <div class="w-1 h-6 bg-gradient-to-b from-blue-500 to-blue-700 rounded-full"></div>
            <h2 class="text-xl font-bold text-slate-800 tracking-tight">
                Cari rute perjalanan anda
            </h2>
        </div>
        <p class="text-sm text-slate-400 pl-3 ml-1">
            Masukkan titik keberangkatan dan tujuan untuk menemukan rute terbaik
        </p>
    </div>

    {{-- Form --}}
    <form action="{{ route('search') }}" method="GET" id="search-form" novalidate>
        @csrf
        <div class="space-y-4">

            {{-- Input: Lokasi Anda --}}
            <div class="relative group">
                <label for="lokasi"
                       class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                    Lokasi Anda
                </label>
                <div class="relative">
                    {{-- Icon kiri --}}
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none
                                 text-blue-500 transition-colors duration-150 group-focus-within:text-blue-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 2v3M12 19v3M2 12h3M19 12h3"/>
                        </svg>
                    </span>
                    <select
                        id="lokasi"
                        name="origin"
                        class="input-field appearance-none pl-10 pr-10"
                        aria-label="Masukkan lokasi asal Anda"
                    >
                        <option value="">Pilih halte asal</option>
                        @foreach ($stops as $stop)
                            <option value="{{ $stop->id }}" @selected((string) request('origin') === (string) $stop->id)>{{ $stop->name }} ({{ $stop->code }})</option>
                        @endforeach
                    </select>
                    {{-- Clear button --}}
                    <button type="button"
                            onclick="document.getElementById('lokasi').selectedIndex=0"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-300 hover:text-slate-500
                                   transition-colors duration-150 focus:outline-none"
                            aria-label="Hapus lokasi asal">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Divider dengan tombol swap --}}
            <div class="flex items-center gap-3">
                <div class="flex-1 border-t border-dashed border-slate-200"></div>
                <button type="button"
                        id="swap-btn"
                        aria-label="Tukar lokasi dan tujuan"
                        class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-100
                               text-slate-500 hover:bg-blue-50 hover:text-blue-600 hover:scale-110
                               active:scale-95 transition-all duration-200 focus:outline-none
                               focus:ring-2 focus:ring-blue-300">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4"/>
                    </svg>
                </button>
                <div class="flex-1 border-t border-dashed border-slate-200"></div>
            </div>

            {{-- Input: Tujuan --}}
            <div class="relative group">
                <label for="tujuan"
                       class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">
                    Tujuan
                </label>
                <div class="relative">
                    {{-- Icon kiri --}}
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none
                                 text-red-400 transition-colors duration-150 group-focus-within:text-red-500">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </span>
                    <select
                        id="tujuan"
                        name="destination"
                        class="input-field appearance-none pl-10 pr-10"
                        aria-label="Masukkan tujuan perjalanan Anda"
                    >
                        <option value="">Pilih halte tujuan</option>
                        @foreach ($stops as $stop)
                            <option value="{{ $stop->id }}" @selected((string) request('destination') === (string) $stop->id)>{{ $stop->name }} ({{ $stop->code }})</option>
                        @endforeach
                    </select>
                    {{-- Clear button --}}
                    <button type="button"
                            onclick="document.getElementById('tujuan').selectedIndex=0"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-300 hover:text-slate-500
                                   transition-colors duration-150 focus:outline-none"
                            aria-label="Hapus tujuan">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Opsi tambahan --}}
            <div class="flex flex-wrap items-center gap-3 py-1">
                <span class="text-xs font-medium text-slate-400">Pilihan:</span>
                <label class="flex items-center gap-1.5 cursor-pointer group">
                    <input type="radio" name="mode" value="cepat" checked
                           class="w-3.5 h-3.5 text-blue-600 focus:ring-blue-400 focus:ring-offset-0
                                  cursor-pointer accent-blue-600">
                    <span class="text-xs text-slate-500 group-hover:text-slate-700 transition-colors">Tercepat</span>
                </label>
                <label class="flex items-center gap-1.5 cursor-pointer group">
                    <input type="radio" name="mode" value="hemat"
                           class="w-3.5 h-3.5 text-blue-600 focus:ring-blue-400 focus:ring-offset-0
                                  cursor-pointer accent-blue-600">
                    <span class="text-xs text-slate-500 group-hover:text-slate-700 transition-colors">Terhemat</span>
                </label>
                <label class="flex items-center gap-1.5 cursor-pointer group">
                    <input type="radio" name="mode" value="transit"
                           class="w-3.5 h-3.5 text-blue-600 focus:ring-blue-400 focus:ring-offset-0
                                  cursor-pointer accent-blue-600">
                    <span class="text-xs text-slate-500 group-hover:text-slate-700 transition-colors">Transit Minimum</span>
                </label>
            </div>

            {{-- Submit Button --}}
            <button type="submit" id="btn-cari" class="btn-primary flex items-center justify-center gap-2 mt-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Cari Rute
            </button>
        </div>
    </form>

    {{-- Rute Populer --}}
    <div class="mt-5 pt-4 border-t border-slate-100">
        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2.5">Pencarian Populer</p>
        <div class="flex flex-wrap gap-2">
            @foreach ([
                ['dari' => 'Terminal Purabaya', 'ke' => 'Tunjungan Plaza'],
                ['dari' => 'Wonokromo',         'ke' => 'ITS Surabaya'],
                ['dari' => 'Jl. Darmo',         'ke' => 'Surabaya Zoo'],
            ] as $route)
            <button type="button"
                    data-dari="{{ $route['dari'] }}"
                    data-ke="{{ $route['ke'] }}"
                    class="popular-route text-xs px-3 py-1.5 bg-slate-50 text-slate-500
                           border border-slate-200 rounded-full hover:bg-blue-50 hover:border-blue-200
                           hover:text-blue-600 transition-all duration-150 focus:outline-none
                           focus:ring-2 focus:ring-blue-300">
                {{ $route['dari'] }} → {{ $route['ke'] }}
            </button>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
    (function () {
        // Swap lokasi & tujuan
        const swapBtn = document.getElementById('swap-btn');
        const lokasiInput = document.getElementById('lokasi');
        const tujuanInput = document.getElementById('tujuan');

        if (swapBtn && lokasiInput && tujuanInput) {
            swapBtn.addEventListener('click', function () {
                // Rotate animation
                this.style.transform = 'scale(1.2) rotate(180deg)';
                setTimeout(() => { this.style.transform = ''; }, 250);

                const tmp = lokasiInput.value;
                lokasiInput.value = tujuanInput.value;
                tujuanInput.value = tmp;
            });
        }

        // Popular route shortcuts
        document.querySelectorAll('.popular-route').forEach(function (btn) {
            btn.addEventListener('click', function () {
                if (lokasiInput) lokasiInput.value = Array.from(lokasiInput.options).find((option) => option.text.startsWith(this.dataset.dari))?.value || '';
                if (tujuanInput) tujuanInput.value = Array.from(tujuanInput.options).find((option) => option.text.startsWith(this.dataset.ke))?.value || '';
                lokasiInput.focus();
            });
        });
    })();
</script>
@endpush
