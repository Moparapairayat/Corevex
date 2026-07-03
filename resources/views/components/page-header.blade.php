@props(['title' => '', 'subtitle' => null, 'icon' => null, 'breadcrumbs' => []])

<div class="mb-6 rounded-3xl border border-white/70 bg-white/80 px-5 py-5 shadow-xl shadow-slate-200/60 backdrop-blur dark:border-white/5 dark:bg-white/5 dark:shadow-black/20">
    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex items-center gap-3">
        @if ($icon)
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-primary-500 via-primary-600 to-primary-700 text-white shadow-lg shadow-primary-500/20">
                <i class="{{ $icon }} text-lg"></i>
            </span>
        @endif
        <div>
            <h4 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-50">{{ $title }}</h4>
            @if ($subtitle)<p class="text-sm text-gray-500 dark:text-gray-400">{{ $subtitle }}</p>@endif
        </div>
        </div>

    @if (! empty($breadcrumbs))
        <nav class="flex items-center gap-1 rounded-full border border-gray-200 bg-white px-3 py-1.5 text-sm text-gray-400 shadow-sm dark:border-white/10 dark:bg-white/5">
            @foreach ($breadcrumbs as $label => $url)
                @if (! $loop->last && $url)
                    <a href="{{ $url }}" class="rounded-full px-2 py-1 transition hover:bg-primary-50 hover:text-primary-600 dark:hover:bg-white/10">{{ $label }}</a>
                    <i class="ik ik-chevron-right mx-0.5 text-[10px]"></i>
                @else
                    <span class="rounded-full bg-gray-100 px-2 py-1 text-gray-700 dark:bg-white/10 dark:text-gray-200">{{ is_string($label) ? $label : $url }}</span>
                @endif
            @endforeach
        </nav>
    @endif

    {{ $slot ?? '' }}
</div>
