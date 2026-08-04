<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $heading ?? 'Dashboard' }} · Admin BIS Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>body{font-family:Poppins,sans-serif}.sidebar-link{transition:.2s}.sidebar-link:hover{background:rgba(255,255,255,.1)}.sidebar-link.active{background:#2563eb;color:#fff;box-shadow:0 8px 20px rgba(37,99,235,.28)}</style>
</head>
<body class="bg-slate-50 text-slate-800">
    <div class="min-h-screen lg:flex">
        <div id="sidebar-backdrop" class="fixed inset-0 z-30 hidden bg-slate-950/45 lg:hidden"></div>
        <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full flex-col bg-slate-950 px-4 py-6 text-slate-300 transition-transform duration-300 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0">
            <div class="flex items-center justify-between px-3"><a href="{{ route('admin.dashboard') }}" class="text-xl font-extrabold tracking-tight text-white">BIS<span class="text-blue-400">HUB</span><span class="ml-2 rounded-md bg-blue-600 px-1.5 py-0.5 text-[10px] tracking-wide">ADMIN</span></a><button id="close-sidebar" class="rounded-lg p-2 text-slate-400 hover:bg-white/10 lg:hidden">✕</button></div>
            <p class="mt-10 px-3 text-[11px] font-bold tracking-[.14em] text-slate-500">MENU UTAMA</p>
            <nav class="mt-3 space-y-1 text-sm font-medium">
                <a class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center gap-3 rounded-xl px-3 py-3" href="{{ route('admin.dashboard') }}"><span>▦</span> Dashboard</a>
                <a class="sidebar-link {{ request()->routeIs('admin.buses.*') ? 'active' : '' }} flex items-center gap-3 rounded-xl px-3 py-3" href="{{ route('admin.buses.index') }}"><span>🚌</span> Data Bus</a>
                <a class="sidebar-link {{ request()->routeIs('admin.stops.*') ? 'active' : '' }} flex items-center gap-3 rounded-xl px-3 py-3" href="{{ route('admin.stops.index') }}"><span>⌖</span> Data Halte</a>
                <a class="sidebar-link {{ request()->routeIs('admin.routes.*') ? 'active' : '' }} flex items-center gap-3 rounded-xl px-3 py-3" href="{{ route('admin.routes.index') }}"><span>↝</span> Data Rute</a>
                <a class="sidebar-link {{ request()->routeIs('admin.schedules.*') ? 'active' : '' }} flex items-center gap-3 rounded-xl px-3 py-3" href="{{ route('admin.schedules.index') }}"><span>◷</span> Data Jadwal</a>
            </nav>
            <div class="mt-auto border-t border-white/10 pt-4"><div class="px-3 pb-4"><p class="truncate text-sm font-bold text-white">{{ auth()->user()->name }}</p><p class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</p></div><form method="post" action="{{ route('admin.logout') }}">@csrf<button class="sidebar-link flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-red-300 hover:text-red-100"><span>↪</span> Logout</button></form></div>
        </aside>
        <main class="min-w-0 flex-1"><header class="sticky top-0 z-20 flex h-18 items-center justify-between border-b border-slate-200 bg-white/90 px-5 py-4 backdrop-blur md:px-8"><div class="flex items-center gap-3"><button id="open-sidebar" class="rounded-xl border border-slate-200 p-2 text-slate-600 lg:hidden">☰</button><div><p class="text-xs font-medium text-slate-400">Admin / <span class="text-slate-600">{{ $heading ?? 'Dashboard' }}</span></p><h1 class="text-lg font-extrabold text-slate-900">{{ $heading ?? 'Dashboard' }}</h1></div></div><a href="{{ route('home') }}" class="hidden rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:border-blue-300 hover:text-blue-600 sm:block">Lihat Website ↗</a></header><section class="mx-auto max-w-7xl p-5 md:p-8">{{ $slot }}</section></main>
    </div>
    @if(session('success'))<script>Swal.fire({icon:'success',title:'Berhasil',text:@json(session('success')),confirmButtonColor:'#2563eb',timer:2600,showConfirmButton:false});</script>@endif
    <script>const sidebar=document.getElementById('admin-sidebar'),backdrop=document.getElementById('sidebar-backdrop');const toggle=(show)=>{sidebar.classList.toggle('-translate-x-full',!show);backdrop.classList.toggle('hidden',!show)};document.getElementById('open-sidebar').onclick=()=>toggle(true);document.getElementById('close-sidebar').onclick=()=>toggle(false);backdrop.onclick=()=>toggle(false);document.querySelectorAll('[data-confirm-delete]').forEach(button=>button.addEventListener('click',event=>{event.preventDefault();const form=button.closest('form');Swal.fire({title:'Hapus data ini?',text:'Data yang sudah dihapus tidak dapat dikembalikan.',icon:'warning',showCancelButton:true,confirmButtonColor:'#dc2626',cancelButtonText:'Batal',confirmButtonText:'Ya, hapus'}).then(result=>{if(result.isConfirmed)form.submit()})}));</script>
</body></html>
