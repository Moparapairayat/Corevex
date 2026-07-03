@props([
    'wordmark' => true,          // show the "Corevex" wordmark next to the mark
    'markClass' => 'h-9 w-9',    // size of the logo mark
    'textClass' => 'text-lg',    // size of the wordmark
])

@php $gid = 'corevex-grad-'.uniqid(); @endphp

<span {{ $attributes->class('inline-flex items-center gap-2.5') }}>
    {{-- Logomark: gradient squircle with an abstract Corevex monogram --}}
    <svg class="{{ $markClass }} shrink-0" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"
         role="img" aria-label="{{ config('app.name', 'Corevex') }}">
        <defs>
            <linearGradient id="{{ $gid }}" x1="0" y1="0" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                <stop stop-color="#0f766e"/>
                <stop offset="0.55" stop-color="#2563eb"/>
                <stop offset="1" stop-color="#111827"/>
            </linearGradient>
        </defs>
        <rect width="40" height="40" rx="12" fill="url(#{{ $gid }})"/>
        <path d="M26.8 13.2C25.2 12 23.2 11.3 21 11.3c-5 0-9 4-9 9s4 9 9 9c2.2 0 4.2-.7 5.8-1.9" stroke="#fff" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M18.7 17.2l3.4 7.1 6.3-12.1" stroke="#fff" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>

    @if ($wordmark)
        <span class="{{ $textClass }} font-bold leading-none tracking-tight">Core<span class="text-primary-500">vex</span></span>
    @endif
</span>
