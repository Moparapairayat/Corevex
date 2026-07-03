<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title','') | {{ config('app.name') }} — {{ config('app.tagline') }}</title>
	@include('include.head')
</head>
<body class="relative min-h-screen overflow-x-hidden bg-body font-sans text-[15px] text-[#4a5361] antialiased"
      x-data="{ sidebarOpen: false, chatOpen: false }"
      :class="{ 'overflow-hidden': sidebarOpen }">

	<div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
		<div class="absolute -left-24 top-24 h-72 w-72 rounded-full bg-primary-500/10 blur-3xl"></div>
		<div class="absolute right-0 top-44 h-80 w-80 rounded-full bg-emerald-400/10 blur-3xl"></div>
		<div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-accent-500/10 blur-3xl"></div>
	</div>

	<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[200] focus:rounded-lg focus:bg-primary-600 focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-white">{{ __('Skip to content') }}</a>

	<!-- Mobile overlay -->
	<div x-show="sidebarOpen" x-transition.opacity
	     @click="sidebarOpen = false"
	     class="fixed inset-0 z-30 bg-black/50 lg:hidden" style="display:none"></div>

	<!-- Sidebar -->
	@include('include.sidebar')

	<!-- Header -->
	@include('include.header')

	<!-- Main content -->
	<main id="content" class="min-h-screen pt-16 lg:pl-72">
		<div class="p-4 sm:p-6 lg:p-8">
			@yield('content')
		</div>
		@include('include.footer')
	</main>

	<!-- Right chat drawer -->
	@include('include.chat')

	<!-- App launcher modal -->
	@include('include.modalmenu')

	<!-- Theme customizer drawer -->
	<x-theme-customizer />

	<!-- Global overlays + feedback singletons -->
	<x-command-palette />
	<x-toast />
	<x-confirm-modal />

	@include('include.script')
</body>
</html>
