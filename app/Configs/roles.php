<?php

return [
    'Super Administrator' => [
        'name'          => 'super-admin',
        'display_name'  => 'Super Admin',
        'description'   => 'Employee who can do anything',
        'permissions'   => 'all'
    ],
    'Administrator' => [
        'name'          => 'admin',
        'display_name'  => 'Admin',
        'description'   => 'Employee with almost full permissions',
        'permissions'   => [
            'except' => [
                'employees', 'view-employees', 'create-employee', 'edit-employee', 'remove-employee', 'delete-employee',
            ],
        ]
    ],
    'Manager' => [
        'name'          => 'manager',
        'display_name'  => 'Manager',
        'description'   => 'Employee with permissions to manage all application content',
        'permissions'   => [
            'include' => [
                'dashboard',
            ],
        ]
    ],
    'SEO Manager' => [
        'name'          => 'seo-manager',
        'display_name'  => 'SEO Manager',
        'description'   => 'Employee with permissions to manage the SEO content of the application',
        'permissions'   => [
            'include' => [

            ],
        ]
    ],
];
