<aside class="fixed inset-y-0 left-0 z-40 flex w-72 flex-col border-r border-white/5 bg-sidebar/95 shadow-2xl shadow-slate-950/30 backdrop-blur-xl transition-transform duration-300 lg:translate-x-0"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Brand -->
    <div class="flex h-20 shrink-0 items-center justify-between border-b border-white/5 bg-gradient-to-r from-sidebar-header via-sidebar-header to-sidebar-sub/50 px-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-white group" title="{{ config('app.name') }}">
            <x-brand-logo markClass="h-9 w-9 transition-transform duration-300 group-hover:scale-105" textClass="text-xl" />
            <span class="inline-flex items-center rounded-full bg-primary-500/10 px-2 py-0.5 text-[9px] font-bold text-primary-400 ring-1 ring-primary-500/20">v4.0</span>
        </a>
        <button @click="sidebarOpen = false" class="rounded-xl p-2 text-sidebar-text/80 transition-all duration-200 hover:bg-white/5 hover:text-white lg:hidden">
            <i class="ik ik-x"></i>
        </button>
    </div>


    <!-- Nav (configured in config/menu.php) -->
    <nav class="scrollbar-thin flex-1 overflow-y-auto px-3 py-4">
        <x-nav.menu :items="config('menu.main')" />
    </nav>

    <!-- User Profile Footer -->
    <div class="border-t border-white/5 bg-sidebar-sub/30 p-4 shrink-0">
        <div class="flex items-center gap-3 rounded-xl bg-white/5 p-3 ring-1 ring-white/5">
            <img class="h-9 w-9 rounded-xl object-cover ring-2 ring-white/10" src="{{ asset('img/user.jpg') }}" alt="">
            <div class="min-w-0 flex-1">
                <p class="truncate text-xs font-bold text-white">{{ auth()->user()->name ?? 'Admin User' }}</p>
                <p class="truncate text-[10px] text-white/50">{{ auth()->user()->email ?? 'admin@test.com' }}</p>
            </div>
            <a href="{{ url('logout') }}" class="flex h-8 w-8 items-center justify-center rounded-lg text-white/60 hover:bg-white/10 hover:text-white transition duration-200" title="{{ __('Logout') }}">
                <i class="ik ik-power text-sm"></i>
            </a>
        </div>
    </div>
</aside>
