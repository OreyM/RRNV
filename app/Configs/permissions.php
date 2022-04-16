<?php

return [
//  PAGES
    [
        'group' => 'pages',
        'group_description' => 'Access to appliation pages',
        'permissions' => [
            [
                'name'          => 'dashboard',
                'display_name'  => 'Dashboard',
                'description'   => 'Access to the Dashboard page',
            ],
            [
                'name'          => 'employees',
                'display_name'  => 'Employees',
                'description'   => 'Access to the Employees page',
            ],
            [
                'name'          => 'roles',
                'display_name'  => 'Roles',
                'description'   => 'Access to the Roles page',
            ],
            [
                'name'          => 'permissions',
                'display_name'  => 'Permissions',
                'description'   => 'Access to the Permissions page',
            ],
            [
                'name'          => 'products',
                'display_name'  => 'Products',
                'description'   => 'Access to the Products page',
            ],
        ],
    ],
//  EMPLOYEES
    [
        'group' => 'employees',
        'group_description' => 'Group of permissions to work with employees data',
        'permissions' => [
            [
                'name'          => 'view-employees',
                'display_name'  => 'View Employees',
                'description'   => 'View a all employees or a specific employee',
            ],
            [
                'name'          => 'create-employee',
                'display_name'  => 'Create Employee',
                'description'   => 'Create a new employee',
            ],
            [
                'name'          => 'edit-employee',
                'display_name'  => 'Edit Employee',
                'description'   => 'Edit existing employee',
            ],
            [
                'name'          => 'remove-employee',
                'display_name'  => 'Remove Employee',
                'description'   => 'Remove existing employee',
            ],
            [
                'name'          => 'delete-employee',
                'display_name'  => 'Delete Employee',
                'description'   => 'Delete existing employee without recovery',
            ],
        ],
    ],
// ROLES
    [
        'group' => 'roles',
        'group_description' => 'Group of permissions to work with roles data',
        'permissions' => [
            [
                'name'          => 'view-roles',
                'display_name'  => 'View Roles',
                'description'   => 'View a all roles or a specific role',
            ],
            [
                'name'          => 'create-role',
                'display_name'  => 'Create Role',
                'description'   => 'Create a new role',
            ],
            [
                'name'          => 'edit-role',
                'display_name'  => 'Edit Role',
                'description'   => 'Edit existing role',
            ],
            [
                'name'          => 'remove-role',
                'display_name'  => 'Remove Role',
                'description'   => 'Remove existing role',
            ],
            [
                'name'          => 'delete-role',
                'display_name'  => 'Delete Role',
                'description'   => 'Delete existing role without recovery',
            ],
        ],
    ],
// PRODUCTS
    [
        'group' => 'products',
        'group_description' => 'Group of permissions to work with products data',
        'permissions' => [
            [
                'name'          => 'view-products',
                'display_name'  => 'View Products',
                'description'   => 'View a all products list',
            ],
            [
                'name'          => 'create-product',
                'display_name'  => 'Create Product',
                'description'   => 'Create a new product',
            ],
            [
                'name'          => 'edit-product',
                'display_name'  => 'Edit Product',
                'description'   => 'Edit existing product',
            ],
            [
                'name'          => 'remove-product',
                'display_name'  => 'Remove Product',
                'description'   => 'Remove existing product',
            ],
            [
                'name'          => 'delete-product',
                'display_name'  => 'Delete Product',
                'description'   => 'Delete existing product without recovery',
            ],
        ],
    ],
// CATALOG
    [
        'group' => 'catalog',
        'group_description' => 'Group of permissions to work with catalog data',
        'permissions' => [
            [
                'name'          => 'manufacturers',
                'display_name'  => 'Manufacturers',
                'description'   => 'CRUD for product manufacturers',
            ],
        ],
    ],
// LOCALIZATION
    [
        'group' => 'localization',
        'group_description' => 'Group of permissions to work with localizations data',
        'permissions' => [
            [
                'name'          => 'stock-status',
                'display_name'  => 'Stock Statuses',
                'description'   => 'CRUD for product stock status',
            ],
            [
                'name'          => 'tax-rates',
                'display_name'  => 'Tax Rates',
                'description'   => 'CRUD for manage tax rates',
            ],
        ],
    ],
];
