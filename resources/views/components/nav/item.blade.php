@props(['href' => '#', 'icon' => null, 'active' => false])

<a href="{{ $href }}" @class([
        'group mx-3 my-0.5 flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm transition-all duration-200',
        'bg-gradient-to-r from-primary-600 to-indigo-600 font-semibold text-white shadow-md shadow-primary-600/15' => $active,
        'text-white/60 hover:bg-white/5 hover:text-white hover:translate-x-1' => ! $active,
    ])>
    @if ($icon)
        <i @class([$icon, 'w-5 text-center text-base transition-transform duration-200 group-hover:scale-110', 'text-white' => $active, 'text-white/40 group-hover:text-white' => ! $active])></i>
    @endif
    <span class="flex-1">{{ $slot }}</span>
    {{ $trailing ?? '' }}
</a>
