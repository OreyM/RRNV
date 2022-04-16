<?php

return [
    [
        'type' => 'item',
        'title' => 'Dashboard',
        'alias' => 'dashboard',
        'icon' => 'fas fa-tachometer-alt',
        'children' => [],
    ],
    [
        'type' => 'header',
        'title' => 'Store',
    ],
    [
        'type' => 'item',
        'title' => 'Catalog',
        'alias' => '',
        'icon' => 'fa fa-tags fw',
        'children' => [
            [
                'title' => 'Category',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Products',
                'alias' => 'products',
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Filters',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Attributes',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Attribute groups',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Options',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Manufacturers',
                'alias' => 'manufacturers',
                'icon' => 'far fa-circle nav-icon',
            ],
        ],
    ],
    [
        'type' => 'item',
        'title' => 'Sales',
        'alias' => '',
        'icon' => 'fa fa-shopping-cart fw',
        'children' => [
            [
                'title' => 'Orders',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Refund',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
        ],
    ],
    [
        'type' => 'item',
        'title' => 'Clients',
        'alias' => '',
        'icon' => 'fa-solid fa-users',
        'children' => [
            [
                'title' => 'Clients',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Client groups',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
        ],
    ],
    [
        'type' => 'item',
        'title' => 'Mailbox',
        'alias' => 'dashboard',
        'icon' => 'fa-solid fa-envelopes-bulk',
        'children' => [],
    ],
    [
        'type' => 'item',
        'title' => 'Marketing',
        'alias' => '',
        'icon' => 'fa-solid fa-gift',
        'children' => [
            [
                'title' => 'Stock',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Discounts',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Certificates',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Banners',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
        ],
    ],
    [
        'type'  => 'header',
        'title' => 'SEO',
    ],
    [
        'type'      => 'item',
        'title'     => 'Comments',
        'alias'     => '', // TODO
        'icon'      => 'fa-solid fa-message',
        'children'  => [],
    ],
    [
        'type'      => 'item',
        'title'     => 'Blog',
        'alias'     => '', // TODO
        'icon'      => 'fa-solid fa-newspaper',
        'children'  => [
            [
                'title' => 'Pages',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Articles',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
        ],
    ],
    [
        'type' => 'header',
        'title' => 'System',
    ],
    [
        'type' => 'item',
        'title' => 'Settings',
        'alias' => '', // TODO
        'icon' => 'fa-solid fa-gear',
        'children' => [],
    ],
    [
        'type' => 'item',
        'title' => 'Employees',
        'alias' => '',
        'icon' => 'fa-solid fa-users-gear',
        'children' => [
            [
                'title' => 'Employees',
                'alias' => 'employees',
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Roles',
                'alias' => 'roles',
                'icon' => 'far fa-circle nav-icon',
            ],
        ],
    ],
    [
        'type' => 'item',
        'title' => 'Localization',
        'alias' => '', // TODO
        'icon' => 'fa-solid fa-globe',
        'children' => [
            [
                'title' => 'Languages',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Currency',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Stock Statuses',
                'alias' => 'stock-statuses',
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'title' => 'Taxes',
                'alias' => '', // TODO
                'icon' => 'far fa-circle nav-icon',
            ],
        ],
    ],
    [
        'type' => 'item',
        'title' => 'Statistics',
        'alias' => '', // TODO
        'icon' => 'fa-solid fa-chart-column',
        'children' => [],
    ],
];
