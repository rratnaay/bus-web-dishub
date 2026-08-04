@props(['number', 'color' => '#0f766e', 'size' => 'normal'])
<span {{ $attributes->merge(['class' => ($size === 'large' ? 'h-12 min-w-12 px-3 text-base ' : 'h-9 min-w-9 px-2 text-xs ') . 'inline-flex items-center justify-center rounded-xl font-black text-white shadow-sm']) }} style="background-color: {{ $color }}">{{ $number }}</span>
