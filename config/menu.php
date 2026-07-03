<?php

/*
|--------------------------------------------------------------------------
| Sidebar Menus
|--------------------------------------------------------------------------
|
| The whole sidebar configuration lives here. Each menu is an ordered list
| of entries rendered by the <x-nav.menu> component. Supported keys:
|
|   'heading' => 'Section'                 // a section label
|   'label'   => 'Users'                   // visible text
|   'icon'    => 'ik ik-users'             // iconkit class
|   'route'   => 'dashboard'               // named route  (or…)
|   'url'     => 'users'                   // relative url
|   'active'  => 'users*|user/*'           // request()->is() pattern(s) that mark it active ('|' separated)
|   'can'     => 'manage_user'             // permission required to see the item (Gate::allows)
|   'badge'   => ['text' => 'New', 'color' => 'green']   // green | danger
|   'children'=> [ ...same shape... ]      // turns the entry into a collapsible group
|
*/

return [

    /*
    |----------------------------------------------------------------------
    | Top bar module switcher — jump between the sections (each has its own
    | sidebar). The first entry is treated as the default/fallback active.
    |----------------------------------------------------------------------
    */
    'top' => [
        ['label' => 'Main Dashboard', 'desc' => 'Overview & admin', 'icon' => 'ik ik-home', 'route' => 'dashboard', 'active' => 'dashboard'],
        ['label' => 'Inventory', 'desc' => 'Products, stock & sales', 'icon' => 'ik ik-shopping-cart', 'url' => 'inventory', 'active' => 'inventory|products*|categories|sales*|purchases*|suppliers|customers'],
        ['label' => 'Accounting', 'desc' => 'Income, expense & banking', 'icon' => 'ik ik-pie-chart', 'url' => 'accounting', 'active' => 'accounting|presale*|banking*|income*|expense*|budget-planner*|goal|assets'],
        ['label' => 'POS', 'desc' => 'Point of sale terminal', 'icon' => 'ik ik-credit-card', 'url' => 'pos', 'active' => 'pos'],
    ],

    /*
    |----------------------------------------------------------------------
    | Main (admin) sidebar
    |----------------------------------------------------------------------
    */
    'main' => [
        ['label' => 'Dashboard', 'icon' => 'ik ik-home', 'route' => 'dashboard', 'active' => 'dashboard'],

        ['heading' => 'Layouts'],
        ['label' => 'Inventory', 'icon' => 'ik ik-shopping-cart', 'url' => 'inventory', 'active' => 'inventory'],
        ['label' => 'POS', 'icon' => 'ik ik-credit-card', 'url' => 'pos', 'active' => 'pos'],
        ['label' => 'Accounting', 'icon' => 'ik ik-pie-chart', 'url' => 'accounting', 'active' => 'accounting', 'badge' => ['text' => 'New', 'color' => 'green']],

        ['label' => 'Adminstrator', 'icon' => 'ik ik-shield', 'active' => 'users*|roles*|permission|user/*', 'children' => [
            ['label' => 'Users', 'icon' => 'ik ik-users', 'url' => 'users', 'active' => 'users', 'can' => 'manage_user'],
            ['label' => 'Add User', 'icon' => 'ik ik-user-plus', 'url' => 'user/create', 'active' => 'user/create', 'can' => 'manage_user'],
            ['label' => 'Roles', 'icon' => 'ik ik-award', 'url' => 'roles', 'active' => 'roles*', 'can' => 'manage_roles'],
            ['label' => 'Permission', 'icon' => 'ik ik-unlock', 'url' => 'permission', 'active' => 'permission', 'can' => 'manage_permission'],
        ]],

        ['heading' => 'Insights'],
        ['label' => 'Reports', 'icon' => 'ik ik-trending-up', 'active' => 'reports*', 'children' => [
            ['label' => 'Sales', 'icon' => 'ik ik-shopping-cart', 'url' => 'reports/sales', 'active' => 'reports/sales'],
            ['label' => 'Inventory', 'icon' => 'ik ik-package', 'url' => 'reports/inventory', 'active' => 'reports/inventory'],
            ['label' => 'Profit & Loss', 'icon' => 'ik ik-bar-chart-2', 'url' => 'reports/profit-loss', 'active' => 'reports/profit-loss'],
            ['label' => 'Tax Summary', 'icon' => 'ik ik-percent', 'url' => 'reports/tax', 'active' => 'reports/tax'],
        ]],
        ['label' => 'Settings', 'icon' => 'ik ik-settings', 'active' => 'settings*', 'children' => [
            ['label' => 'General', 'icon' => 'ik ik-sliders', 'url' => 'settings', 'active' => 'settings'],
            ['label' => 'Company', 'icon' => 'ik ik-briefcase', 'url' => 'settings/company', 'active' => 'settings/company'],
            ['label' => 'Localization', 'icon' => 'ik ik-globe', 'url' => 'settings/localization', 'active' => 'settings/localization'],
            ['label' => 'Notifications', 'icon' => 'ik ik-bell', 'url' => 'settings/notifications', 'active' => 'settings/notifications'],
            ['label' => 'Appearance', 'icon' => 'ik ik-droplet', 'url' => 'settings/appearance', 'active' => 'settings/appearance'],
            ['label' => 'Security', 'icon' => 'ik ik-shield', 'url' => 'settings/security', 'active' => 'settings/security'],
        ]],

        ['heading' => 'Documentation'],
        ['label' => 'REST API', 'icon' => 'ik ik-code', 'url' => 'rest-api', 'active' => 'rest-api'],

        ['heading' => 'Themekit Pages'],
        ['label' => 'Forms', 'icon' => 'ik ik-edit', 'active' => 'form-components|form-addon|form-advance', 'children' => [
            ['label' => 'Components', 'icon' => 'ik ik-grid', 'url' => 'form-components', 'active' => 'form-components'],
            ['label' => 'Add-On', 'icon' => 'ik ik-plus-square', 'url' => 'form-addon', 'active' => 'form-addon'],
            ['label' => 'Advance', 'icon' => 'ik ik-sliders', 'url' => 'form-advance', 'active' => 'form-advance'],
        ]],
        ['label' => 'Form Picker', 'icon' => 'ik ik-calendar', 'url' => 'form-picker', 'active' => 'form-picker'],
        ['label' => 'Navigation', 'icon' => 'ik ik-menu', 'url' => 'navbar', 'active' => 'navbar'],

        ['label' => 'Widgets', 'icon' => 'ik ik-layers', 'badge' => ['text' => '150+', 'color' => 'danger'],
            'active' => 'widgets|widget-statistic|widget-data|widget-chart', 'children' => [
            ['label' => 'Basic', 'icon' => 'ik ik-square', 'url' => 'widgets', 'active' => 'widgets'],
            ['label' => 'Statistic', 'icon' => 'ik ik-bar-chart', 'url' => 'widget-statistic', 'active' => 'widget-statistic'],
            ['label' => 'Data', 'icon' => 'ik ik-database', 'url' => 'widget-data', 'active' => 'widget-data'],
            ['label' => 'Chart Widget', 'icon' => 'ik ik-pie-chart', 'url' => 'widget-chart', 'active' => 'widget-chart'],
        ]],
        ['label' => 'Basic', 'icon' => 'ik ik-box', 'active' => 'alerts|badges|buttons|navigation', 'children' => [
            ['label' => 'Alerts', 'icon' => 'ik ik-alert-triangle', 'url' => 'alerts', 'active' => 'alerts'],
            ['label' => 'Badges', 'icon' => 'ik ik-tag', 'url' => 'badges', 'active' => 'badges'],
            ['label' => 'Buttons', 'icon' => 'ik ik-toggle-right', 'url' => 'buttons', 'active' => 'buttons'],
            ['label' => 'Navigation', 'icon' => 'ik ik-navigation', 'url' => 'navigation', 'active' => 'navigation'],
        ]],
        ['label' => 'Advance', 'icon' => 'ik ik-zap', 'active' => 'modals|notifications|carousel|range-slider|rating', 'children' => [
            ['label' => 'Modals', 'icon' => 'ik ik-maximize-2', 'url' => 'modals', 'active' => 'modals'],
            ['label' => 'Notifications', 'icon' => 'ik ik-bell', 'url' => 'notifications', 'active' => 'notifications'],
            ['label' => 'Slider', 'icon' => 'ik ik-film', 'url' => 'carousel', 'active' => 'carousel'],
            ['label' => 'Range Slider', 'icon' => 'ik ik-sliders', 'url' => 'range-slider', 'active' => 'range-slider'],
            ['label' => 'Rating', 'icon' => 'ik ik-star', 'url' => 'rating', 'active' => 'rating'],
        ]],
        ['label' => 'Charts', 'icon' => 'ik ik-pie-chart', 'active' => 'charts-chartist|charts-flot|charts-knob|charts-amcharts', 'children' => [
            ['label' => 'Chartist', 'icon' => 'ik ik-activity', 'url' => 'charts-chartist', 'active' => 'charts-chartist'],
            ['label' => 'Flot', 'icon' => 'ik ik-trending-up', 'url' => 'charts-flot', 'active' => 'charts-flot'],
            ['label' => 'Knob', 'icon' => 'ik ik-disc', 'url' => 'charts-knob', 'active' => 'charts-knob'],
            ['label' => 'Amcharts', 'icon' => 'ik ik-bar-chart-2', 'url' => 'charts-amcharts', 'active' => 'charts-amcharts'],
        ]],
        ['label' => 'Calendar', 'icon' => 'ik ik-calendar', 'url' => 'calendar', 'active' => 'calendar'],
        ['label' => 'Taskboard', 'icon' => 'ik ik-check-square', 'url' => 'taskboard', 'active' => 'taskboard'],

        ['label' => 'Authentication', 'icon' => 'ik ik-lock', 'active' => 'login|register|password/*', 'children' => [
            ['label' => 'Login', 'icon' => 'ik ik-log-in', 'url' => 'login', 'active' => 'login'],
            ['label' => 'Register', 'icon' => 'ik ik-user-plus', 'url' => 'register', 'active' => 'register'],
            ['label' => 'Forgot Password', 'icon' => 'ik ik-help-circle', 'url' => 'password/forget', 'active' => 'password/forget|password/reset*'],
        ]],
        ['label' => 'Pages', 'icon' => 'ik ik-file-text', 'active' => 'profile|invoice|project|view|session-timeout', 'children' => [
            ['label' => 'Profile', 'icon' => 'ik ik-user', 'url' => 'profile', 'active' => 'profile'],
            ['label' => 'Invoice', 'icon' => 'ik ik-file', 'url' => 'invoice', 'active' => 'invoice'],
            ['label' => 'Project', 'icon' => 'ik ik-briefcase', 'url' => 'project', 'active' => 'project'],
            ['label' => 'View', 'icon' => 'ik ik-eye', 'url' => 'view', 'active' => 'view'],
            ['label' => 'Session Timeout', 'icon' => 'ik ik-clock', 'url' => 'session-timeout', 'active' => 'session-timeout'],
        ]],
        ['label' => 'Layouts', 'icon' => 'ik ik-layout', 'url' => 'layouts', 'active' => 'layouts'],
        ['label' => 'Icons', 'icon' => 'ik ik-feather', 'url' => 'icons', 'active' => 'icons'],
        ['label' => 'Pricing', 'icon' => 'ik ik-tag', 'url' => 'pricing', 'active' => 'pricing'],
    ],

    /*
    |----------------------------------------------------------------------
    | Inventory module sidebar
    |----------------------------------------------------------------------
    */
    'inventory' => [
        ['label' => 'Dashboard', 'icon' => 'ik ik-home', 'url' => 'inventory', 'active' => 'inventory'],
        ['label' => 'POS', 'icon' => 'ik ik-credit-card', 'url' => 'pos', 'active' => 'pos', 'badge' => ['text' => 'New', 'color' => 'green']],

        ['label' => 'Products', 'icon' => 'ik ik-headphones', 'active' => 'products*', 'children' => [
            ['label' => 'Add Product', 'icon' => 'ik ik-plus-square', 'url' => 'products/create', 'active' => 'products/create'],
            ['label' => 'List Products', 'icon' => 'ik ik-list', 'url' => 'products', 'active' => 'products'],
        ]],
        ['label' => 'Categories', 'icon' => 'ik ik-tag', 'url' => 'categories', 'active' => 'categories'],
        ['label' => 'Sales', 'icon' => 'ik ik-shopping-cart', 'active' => 'sales*', 'children' => [
            ['label' => 'Add Sale', 'icon' => 'ik ik-plus-square', 'url' => 'sales/create', 'active' => 'sales/create'],
            ['label' => 'List Sales', 'icon' => 'ik ik-list', 'url' => 'sales', 'active' => 'sales'],
        ]],
        ['label' => 'Purchases', 'icon' => 'ik ik-truck', 'active' => 'purchases*', 'children' => [
            ['label' => 'Add Purchase', 'icon' => 'ik ik-plus-square', 'url' => 'purchases/create', 'active' => 'purchases/create'],
            ['label' => 'List Purchases', 'icon' => 'ik ik-list', 'url' => 'purchases', 'active' => 'purchases'],
        ]],
        ['label' => 'People', 'icon' => 'ik ik-users', 'active' => 'suppliers|customers', 'children' => [
            ['label' => 'Suppliers', 'icon' => 'ik ik-truck', 'url' => 'suppliers', 'active' => 'suppliers'],
            ['label' => 'Customers', 'icon' => 'ik ik-user-check', 'url' => 'customers', 'active' => 'customers'],
        ]],
    ],

    /*
    |----------------------------------------------------------------------
    | Accounting module sidebar
    |----------------------------------------------------------------------
    */
    'accounting' => [
        ['label' => 'Dashboard', 'icon' => 'ik ik-home', 'url' => 'accounting', 'active' => 'accounting'],

        ['label' => 'Presale', 'icon' => 'ik ik-file', 'active' => 'presale*', 'children' => [
            ['label' => 'Proposals', 'icon' => 'ik ik-file-text', 'url' => 'presale/proposal', 'active' => 'presale/proposal*'],
            ['label' => 'Retainers', 'icon' => 'ik ik-clipboard', 'url' => 'presale/retainer', 'active' => 'presale/retainer*'],
        ]],
        ['label' => 'Banking', 'icon' => 'ik ik-credit-card', 'active' => 'banking*', 'children' => [
            ['label' => 'Account', 'icon' => 'ik ik-credit-card', 'url' => 'banking/account', 'active' => 'banking/account*'],
            ['label' => 'Transfer', 'icon' => 'ik ik-refresh-ccw', 'url' => 'banking/transfer', 'active' => 'banking/transfer*'],
        ]],
        ['label' => 'Income', 'icon' => 'ik ik-trending-up', 'active' => 'income*', 'children' => [
            ['label' => 'Invoice', 'icon' => 'ik ik-file-text', 'url' => 'income/invoice', 'active' => 'income/invoice*'],
            ['label' => 'Revenue', 'icon' => 'ik ik-dollar-sign', 'url' => 'income/revenue', 'active' => 'income/revenue*'],
        ]],
        ['label' => 'Expense', 'icon' => 'ik ik-credit-card', 'active' => 'expense*', 'children' => [
            ['label' => 'Bill', 'icon' => 'ik ik-file', 'url' => 'expense/bill', 'active' => 'expense/bill*'],
            ['label' => 'Payment', 'icon' => 'ik ik-dollar-sign', 'url' => 'expense/payment', 'active' => 'expense/payment*'],
        ]],
        ['label' => 'Budget Planner', 'icon' => 'ik ik-briefcase', 'url' => 'budget-planner', 'active' => 'budget-planner*'],
        ['label' => 'Goal', 'icon' => 'ik ik-trending-up', 'url' => 'goal', 'active' => 'goal'],
        ['label' => 'Assets', 'icon' => 'ik ik-package', 'url' => 'assets', 'active' => 'assets'],
    ],
];
