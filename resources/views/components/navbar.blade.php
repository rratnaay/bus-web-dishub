{{-- ================================================
     KOMPONEN: NAVBAR
     File: resources/views/components/navbar.blade.php
     ================================================ --}}

<header class="bg-white border-b border-slate-100 sticky top-0 z-50 shadow-[0_1px_12px_-2px_rgba(0,0,0,0.06)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-between h-16">

            {{-- ── Logo ── --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group flex-shrink-0">
                <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center
                            shadow-md shadow-blue-200 group-hover:shadow-blue-300 group-hover:scale-105
                            transition-all duration-200">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 7h12m0 0l-4-4m4 4l-4 4M4 17h12m0 0l-4-4m4 4l-4 4"/>
                    </svg>
                </div>
                <div class="leading-tight">
                    <span class="font-bold text-slate-800 text-base tracking-tight group-hover:text-blue-600
                                 transition-colors duration-150">BIS Hub</span>
                    <span class="hidden sm:block text-[10px] text-slate-400 font-normal -mt-0.5 leading-none">
                        Bus Information System
                    </span>
                </div>
            </a>

            {{-- ── Desktop Menu ── --}}
            <ul class="hidden md:flex items-center gap-1">
                <li>
                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} px-3 py-2 rounded-lg
                              hover:bg-slate-50 transition-all duration-150">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('routes.index') }}"
                       class="nav-link {{ request()->routeIs('routes.*') ? 'active' : '' }} px-3 py-2 rounded-lg hover:bg-slate-50 transition-all duration-150">
                        Rute
                    </a>
                </li>
                <li>
                    <a href="{{ route('stops.index') }}"
                       class="nav-link {{ request()->routeIs('stops.*') ? 'active' : '' }} px-3 py-2 rounded-lg hover:bg-slate-50 transition-all duration-150">
                        Halte
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                       class="nav-link {{ request()->routeIs('about') ? 'active' : '' }} px-3 py-2 rounded-lg hover:bg-slate-50 transition-all duration-150">
                        Tentang
                    </a>
                </li>
            </ul>

            {{-- ── Right Side: CTA + Mobile Toggle ── --}}
            <div class="flex items-center gap-3">
                {{-- CTA Button (desktop) --}}
                <a href="{{ route('routes.index') }}#peta-rute"
                   class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 text-white text-sm font-semibold
                          rounded-xl hover:bg-blue-700 hover:shadow-md hover:shadow-blue-200 hover:-translate-y-0.5
                          transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    Lihat Peta
                </a>

                {{-- Mobile Hamburger --}}
                <button id="mobile-menu-btn"
                        aria-label="Buka menu navigasi"
                        aria-expanded="false"
                        aria-controls="mobile-menu"
                        class="md:hidden flex items-center justify-center w-9 h-9 rounded-xl text-slate-500
                               hover:bg-slate-100 hover:text-slate-700 transition-colors duration-150
                               focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <svg id="icon-open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </nav>
    </div>

    {{-- ── Mobile Dropdown Menu ── --}}
    <div id="mobile-menu"
         class="md:hidden hidden border-t border-slate-100 bg-white animate-slide-up"
         role="navigation"
         aria-label="Navigasi mobile">
        <div class="max-w-7xl mx-auto px-4 py-3 flex flex-col gap-0.5">
            <a href="{{ route('home') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium
                      {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-800' }}
                      transition-colors duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Beranda
            </a>
            <a href="{{ route('routes.index') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('routes.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-800' }}
                      hover:bg-slate-50 hover:text-slate-800 transition-colors duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                </svg>
                Rute
            </a>
            <a href="{{ route('stops.index') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('stops.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-800' }}
                      hover:bg-slate-50 hover:text-slate-800 transition-colors duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Halte
            </a>
            <a href="{{ route('about') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('about') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-800' }}
                      hover:bg-slate-50 hover:text-slate-800 transition-colors duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Tentang
            </a>
            <div class="pt-2 pb-1">
                <a href="{{ route('routes.index') }}#peta-rute"
                   class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-blue-600 text-white text-sm font-semibold
                          rounded-xl hover:bg-blue-700 transition-colors duration-150">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    Lihat Peta
                </a>
            </div>
        </div>
    </div>
</header>

@push('scripts')
<script>
    (function () {
        const btn     = document.getElementById('mobile-menu-btn');
        const menu    = document.getElementById('mobile-menu');
        const iconOpen  = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        if (!btn || !menu) return;

        btn.addEventListener('click', function () {
            const isOpen = !menu.classList.contains('hidden');

            if (isOpen) {
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            } else {
                menu.classList.remove('hidden');
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
                btn.setAttribute('aria-expanded', 'true');
            }
        });

        // Close on outside click
        document.addEventListener('click', function (e) {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            }
        });
    })();
</script>
@endpush
