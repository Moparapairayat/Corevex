@props(['href' => '#', 'active' => false, 'icon' => null])

<a href="{{ $href }}" @class([
        'group mx-2 my-0.5 flex items-center gap-2.5 rounded-lg py-2 pl-8 pr-4 text-xs transition-all duration-200',
        'font-bold text-white bg-white/5' => $active,
        'text-white/50 hover:bg-white/5 hover:text-white hover:translate-x-1' => ! $active,
    ])>
    @if ($icon)
        <i @class([$icon, 'w-4 text-center text-[13px] transition-transform duration-200 group-hover:scale-110', 'text-primary-400' => $active, 'text-white/35 group-hover:text-white' => ! $active])></i>
    @endif
    <span class="flex-1">{{ $slot }}</span>
</a>
