@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <x-page-header title="{{ __('Dashboard') }}" subtitle="{{ __('Welcome back, here is your store overview') }}" icon="ik ik-bar-chart-2"
                   :breadcrumbs="['Home' => url('dashboard'), 'Dashboard' => null]">
        <div x-data="{ period: 'Month' }" class="inline-flex rounded-xl border border-gray-200/60 bg-white p-1 shadow-sm backdrop-blur-md dark:border-white/5 dark:bg-white/5">
            <template x-for="p in ['Today', 'Week', 'Month', 'Year']" :key="p">
                <button @click="period = p" :class="period === p ? 'bg-primary-500 text-white shadow-sm' : 'text-gray-500 hover:bg-gray-100/80 dark:text-gray-400 dark:hover:bg-white/5'"
                        class="rounded-lg px-3.5 py-1.5 text-xs font-semibold transition-all duration-200" x-text="p"></button>
            </template>
        </div>
    </x-page-header>


    <!-- Stat cards -->
    <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
        <x-stat-card class="hover-glow-accent" value="2,563" label="{{ __('Products') }}" icon="fas fa-cube" color="accent"
                     trend="+4.6%" :spark="[8,12,9,14,11,16,13,18]" />
        <x-stat-card class="hover-glow-primary" value="3,612" label="{{ __('Orders') }}" icon="ik ik-shopping-cart" color="primary"
                     trend="+8.1%" :spark="[5,8,6,9,12,10,14,17]" />
        <x-stat-card class="hover-glow-green" value="865" label="{{ __('Customers') }}" icon="ik ik-user" color="green"
                     trend="+2.3%" :spark="[10,9,11,10,13,12,15,16]" />
        <x-stat-card class="hover-glow-amber" value="$35,500" label="{{ __('Sales') }}" icon="ik ik-dollar-sign" color="amber"
                     trend="-1.2%" :trendUp="false" :spark="[14,12,15,11,13,10,12,9]" />
    </div>

    <!-- Charts row -->
    <div class="mt-5 grid grid-cols-1 gap-5 xl:grid-cols-3">
        <x-card class="xl:col-span-2" hover>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <i class="ik ik-bar-chart-2 text-primary-500"></i>
                    <span>{{ __('Revenue Overview') }}</span>
                </div>
            </x-slot:header>
            <x-slot:actions>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-500/10 px-2.5 py-1 text-xs font-semibold text-primary-600"><span class="h-1.5 w-1.5 rounded-full bg-primary-500"></span>{{ __('This year') }}</span>
            </x-slot:actions>
            <x-chart.line height="h-64" color="primary"
                          :data="[12, 19, 14, 23, 18, 27, 22, 31, 26, 34, 29, 38]"
                          :labels="['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']"
                          prefix="$" suffix="k" />
        </x-card>

        <x-card hover>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <i class="ik ik-pie-chart text-primary-500"></i>
                    <span>{{ __('Sales by Category') }}</span>
                </div>
            </x-slot:header>
            <x-chart.donut label="2,563" sublabel="{{ __('Total') }}"
                           :segments="[
                               ['value' => 42, 'color' => 'primary', 'label' => 'Electronics'],
                               ['value' => 28, 'color' => 'green', 'label' => 'Clothing'],
                               ['value' => 18, 'color' => 'amber', 'label' => 'Accessories'],
                               ['value' => 12, 'color' => 'accent', 'label' => 'Others'],
                           ]" />
        </x-card>
    </div>

    <!-- Secondary charts -->
    <div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-3">
        <x-card hover>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <i class="ik ik-shopping-bag text-primary-500"></i>
                    <span>{{ __('Weekly Orders') }}</span>
                </div>
            </x-slot:header>
            <x-chart.bar height="h-48" color="primary" prefix="" suffix=" orders"
                         :data="[34, 52, 41, 63, 48, 72, 55]"
                         :labels="['Mon','Tue','Wed','Thu','Fri','Sat','Sun']" />
        </x-card>
        <x-card hover>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <i class="ik ik-trending-up text-green-500"></i>
                    <span>{{ __('Sales Difference') }}</span>
                </div>
            </x-slot:header>
            <x-chart.line height="h-48" color="green" :area="true"
                          :data="[20, 14, 26, 18, 30, 24, 36]"
                          :labels="['W1','W2','W3','W4','W5','W6','W7']" prefix="$" suffix="k" />
        </x-card>
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-700 p-5 text-white shadow-lg shadow-teal-500/15 dark:bg-none dark:bg-green-500/10 dark:text-gray-800 dark:ring-1 dark:ring-green-500/20">
            <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-white/10 blur-2xl"></div>
            <div class="relative mb-4 flex items-start justify-between">
                <div>
                    <h6 class="text-xs font-semibold uppercase tracking-wider text-white/80 dark:text-gray-400">{{ __('Sales In July') }}</h6>
                    <h5 class="text-2xl font-bold tracking-tight mt-1">{{ __('$2,665.00') }}</h5>
                </div>
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 backdrop-blur shadow"><i class="ik ik-dollar-sign text-lg"></i></span>
            </div>
            <div class="relative mb-5 flex gap-6 text-xs">
                <div><p class="text-white/70 dark:text-gray-500">{{ __('Direct Sale') }}</p><p class="font-bold text-sm mt-0.5">{{ __('$1,768') }}</p></div>
                <div><p class="text-white/70 dark:text-gray-500">{{ __('Referral') }}</p><p class="font-bold text-sm mt-0.5">{{ __('$897') }}</p></div>
            </div>
            <x-chart.bar height="h-20" color="white"
                         :data="[40, 65, 50, 80, 60, 90, 70, 55, 75]" />
        </div>
    </div>

    <!-- New customers + products -->
    <div class="mt-5 grid grid-cols-1 gap-5 xl:grid-cols-3">
        <x-card hover>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <i class="ik ik-users text-primary-500"></i>
                    <span>{{ __('New Customers') }}</span>
                </div>
            </x-slot:header>
            @php
                $customers = [
                    ['Alex Thompson', 'Cheers!', '1.jpg', true, null],
                    ['John Doue', 'stay hungry stay foolish!', '2.jpg', true, null],
                    ['Alex Thompson', 'Cheers!', '3.jpg', false, '30 min ago'],
                    ['John Doue', 'Cheers!', '4.jpg', false, '10 min ago'],
                ];
            @endphp
            <div class="space-y-4">
                @foreach ($customers as [$name, $msg, $img, $online, $ago])
                    <div class="flex items-center gap-3 p-1 rounded-xl transition-all duration-200 hover:bg-gray-50 dark:hover:bg-white/5">
                        <span class="relative shrink-0">
                            <img src="{{ asset('img/users/'.$img) }}" alt="" class="h-10 w-10 rounded-full object-cover ring-2 ring-gray-100 dark:ring-white/10">
                            @if ($online)<span class="absolute bottom-0 right-0 h-3 w-3 rounded-full border-2 border-white bg-green-500"></span>@endif
                        </span>
                        <div class="min-w-0 flex-1">
                            <h6 class="truncate text-sm font-bold text-gray-800 dark:text-gray-200">{{ __($name) }}</h6>
                            <p class="truncate text-xs text-gray-400 dark:text-gray-500">{{ __($msg) }}</p>
                        </div>
                        @if ($ago)<span class="whitespace-nowrap text-xs text-gray-400"><i class="far fa-clock mr-1"></i>{{ __($ago) }}</span>@endif
                    </div>
                @endforeach
            </div>
        </x-card>

        <x-card class="xl:col-span-2" no-padding hover>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <i class="ik ik-grid text-primary-500"></i>
                    <span>{{ __('New Products') }}</span>
                </div>
            </x-slot:header>
            <div class="overflow-x-auto">
                <table class="w-full text-sm premium-table">
                    <thead>
                        <tr class="border-b border-gray-100 text-left text-xs uppercase tracking-wider text-gray-400">
                            <th class="px-5 py-3.5 font-semibold">{{ __('Product Name') }}</th>
                            <th class="px-5 py-3.5 font-semibold text-center">{{ __('Image') }}</th>
                            <th class="px-5 py-3.5 font-semibold">{{ __('Status') }}</th>
                            <th class="px-5 py-3.5 font-semibold">{{ __('Price') }}</th>
                            <th class="px-5 py-3.5 font-semibold text-right">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-white/5">
                        @foreach ([['HeadPhone','p1.jpg','$10'],['Iphone 6','p2.jpg','$20'],['Jacket','p3.jpg','$35'],['Sofa','p4.jpg','$85'],['Iphone 6','p2.jpg','$20']] as [$pname, $pimg, $price])
                            <tr class="hover:bg-gray-50/50">
                                <td class="px-5 py-3.5 font-semibold text-gray-800 dark:text-gray-200">{{ __($pname) }}</td>
                                <td class="px-5 py-3.5 text-center"><img src="{{ asset('img/widget/'.$pimg) }}" alt="" class="mx-auto h-7 w-7 rounded object-cover shadow-sm ring-1 ring-gray-100 dark:ring-white/10"></td>
                                <td class="px-5 py-3.5"><x-status-pill status="active" /></td>
                                <td class="px-5 py-3.5 font-bold text-gray-900 dark:text-gray-100">{{ __($price) }}</td>
                                <td class="px-5 py-3.5 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="#!" class="flex h-7 w-7 items-center justify-center rounded-lg bg-green-500/10 text-green-600 hover:bg-green-500 hover:text-white transition duration-200"><i class="ik ik-edit text-xs"></i></a>
                                        <a href="#!" class="flex h-7 w-7 items-center justify-center rounded-lg bg-accent-500/10 text-accent-600 hover:bg-accent-500 hover:text-white transition duration-200"><i class="ik ik-trash-2 text-xs"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>
    </div>

    <!-- Application sales -->
    <div class="mt-5">
        <x-card no-padding hover>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <i class="ik ik-shopping-cart text-primary-500"></i>
                    <span>{{ __('Application Sales') }}</span>
                </div>
            </x-slot:header>
            <div class="overflow-x-auto">
                <table class="w-full text-sm premium-table">
                    <thead>
                        <tr class="border-b border-gray-100 text-left text-xs uppercase tracking-wider text-gray-400">
                            <th class="px-5 py-3.5 font-semibold">{{ __('Application') }}</th>
                            <th class="px-5 py-3.5 font-semibold">{{ __('Sales') }}</th>
                            <th class="px-5 py-3.5 font-semibold text-center">{{ __('Trend') }}</th>
                            <th class="px-5 py-3.5 font-semibold">{{ __('Avg Price') }}</th>
                            <th class="px-5 py-3.5 font-semibold text-right">{{ __('Total') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-white/5">
                        @foreach ([
                            ['Able Pro','Powerful Admin Theme','16,300','$53','$15,652','green',[8,10,9,12,14,13,16]],
                            ['Photoshop','Design Software','26,421','$35','$18,785','primary',[12,11,13,12,15,17,16]],
                            ['Guruable','Best Admin Template','8,265','$98','$9,652','amber',[14,12,11,10,9,11,8]],
                            ['Flatable','Admin App','10,652','$20','$7,856','accent',[9,11,10,13,11,14,15]],
                        ] as [$app, $desc, $sales, $avg, $total, $c, $spark])
                            <tr class="hover:bg-gray-50/50">
                                <td class="px-5 py-3.5">
                                    <h6 class="font-bold text-gray-800 dark:text-gray-200">{{ __($app) }}</h6>
                                    <p class="text-xs text-gray-400 mt-0.5">{{ __($desc) }}</p>
                                </td>
                                <td class="px-5 py-3.5 font-semibold text-gray-700 dark:text-gray-300">{{ __($sales) }}</td>
                                <td class="px-5 py-3.5 text-center"><div class="inline-block w-20"><x-chart.sparkline :data="$spark" :color="$c" class="h-7 w-full" /></div></td>
                                <td class="px-5 py-3.5 text-gray-700 dark:text-gray-300">{{ $avg }}</td>
                                <td class="px-5 py-3.5 font-bold text-primary-600 text-right">{{ __($total) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="border-t border-gray-100 dark:border-white/5 px-5 py-4 text-right">
                <a href="#!" class="text-xs font-bold text-primary-600 hover:text-primary-700 transition duration-200 uppercase tracking-wider">{{ __('View all Projects') }}</a>
            </div>
        </x-card>
    </div>
@endsection
