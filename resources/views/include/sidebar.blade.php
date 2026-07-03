<aside class="fixed inset-y-0 left-0 z-40 flex w-72 flex-col border-r border-white/5 bg-sidebar/95 shadow-2xl shadow-slate-950/30 backdrop-blur-xl transition-transform duration-300 lg:translate-x-0"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Brand -->
    <div class="flex h-20 shrink-0 items-center justify-between border-b border-white/5 bg-gradient-to-br from-sidebar-header via-sidebar-header to-sidebar-sub px-5">
        <a href="{{ route('dashboard') }}" class="flex items-center text-white" title="{{ config('app.name') }}">
            <x-brand-logo markClass="h-9 w-9" textClass="text-xl" />
        </a>
        <button @click="sidebarOpen = false" class="rounded-lg p-2 text-sidebar-text/80 transition hover:bg-white/10 hover:text-white lg:hidden">
            <i class="ik ik-x"></i>
        </button>
    </div>

    <div class="mx-4 mt-4 rounded-2xl border border-white/5 bg-white/5 p-4 text-white shadow-lg shadow-black/10">
		<p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-sidebar-text/60">Workspace</p>
		<div class="mt-3 flex items-center gap-3">
			<span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-sm font-bold text-white ring-1 ring-white/10">CV</span>
			<div class="min-w-0">
				<p class="truncate text-sm font-semibold text-white">Corevex HQ</p>
				<p class="truncate text-xs text-sidebar-text/70">POS, Inventory & Accounting</p>
			</div>
		</div>
		<div class="mt-4 grid grid-cols-3 gap-2 text-center text-[11px] text-sidebar-text/70">
			<div class="rounded-xl bg-white/5 px-2 py-2 ring-1 ring-white/5"><span class="block font-semibold text-white">24</span>Orders</div>
			<div class="rounded-xl bg-white/5 px-2 py-2 ring-1 ring-white/5"><span class="block font-semibold text-white">13</span>Alerts</div>
			<div class="rounded-xl bg-white/5 px-2 py-2 ring-1 ring-white/5"><span class="block font-semibold text-white">99%</span>Up</div>
		</div>
    </div>

    <!-- Nav (configured in config/menu.php) -->
    <nav class="scrollbar-thin flex-1 overflow-y-auto px-3 py-4">
        <x-nav.menu :items="config('menu.main')" />
    </nav>
</aside>
