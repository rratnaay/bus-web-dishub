@extends('layouts.app')

@section('title', 'Halte Bus | BIS Hub')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
    <div class="mb-8"><p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-2">Titik Pemberhentian</p><h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Halte Bus</h1><p class="mt-2 text-slate-500">Daftar halte aktif yang tersedia di Surabaya.</p></div>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($stops as $stop)
            <a href="{{ route('stops.show', $stop) }}" class="card p-5 hover:border-blue-200">
                <p class="text-xs font-bold uppercase tracking-wider text-blue-600">{{ $stop->code }}</p><h2 class="mt-1 font-bold text-slate-800">{{ $stop->name }}</h2><p class="mt-2 text-sm text-slate-500">{{ $stop->address ?: 'Surabaya' }}</p>
            </a>
        @empty
            <p class="text-slate-500">Belum ada halte aktif.</p>
        @endforelse
    </div>
    <div class="mt-8">{{ $stops->links() }}</div>
</section>
@endsection
