@props(['icon' => null, 'label' => '', 'active' => false])

<div x-data="{ open: {{ $active ? 'true' : 'false' }} }" class="my-0.5">
    <button type="button" @click="open = ! open" @class([
            'group mx-3 flex w-[calc(100%-1.5rem)] items-center gap-3 rounded-xl px-4 py-2.5 text-sm transition-all duration-200',
            'bg-white/5 font-semibold text-white ring-1 ring-white/10' => $active,
            'text-white/60 hover:bg-white/5 hover:text-white' => ! $active,
        ])>
        @if ($icon)
            <i @class([$icon, 'w-5 text-center text-base transition-transform duration-200 group-hover:scale-110', 'text-primary-400' => $active, 'text-white/40 group-hover:text-white' => ! $active])></i>
        @endif
        <span class="flex-1 text-left">{{ $label }}</span>
        {{ $trailing ?? '' }}
        <i class="ik ik-chevron-right text-xs transition-transform duration-200" :class="open && 'rotate-90'"></i>
    </button>
    <div x-show="open" x-collapse class="bg-black/10 mx-3 mt-1 rounded-xl py-1" style="display:none">
        {{ $slot }}
    </div>
</div>
