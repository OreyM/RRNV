<?php

/**
 * @url https://github.com/diglactic/laravel-breadcrumbs
 */

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard-brcr', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', Routing::url('dashboard'));
});


Breadcrumbs::for('employees-brcr', function (BreadcrumbTrail $trail) {
    $trail->push('Employees', Routing::url('employees'));
});

Breadcrumbs::for('roles-brcr', function (BreadcrumbTrail $trail) {
    $trail->push('Roles', Routing::url('roles'));
});

Breadcrumbs::for('permissions-brcr', function (BreadcrumbTrail $trail) {
    $trail->push('Permissions', Routing::url('permissions'));
});

// CATALOG
Breadcrumbs::for('manufacturers-brcr', function (BreadcrumbTrail $trail) {
    $trail->push('Manufacturers', Routing::url('manufacturers'));
});

Breadcrumbs::for('products-brcr', function (BreadcrumbTrail $trail) {
    $trail->push('Products', Routing::url('products'));
});

Breadcrumbs::for('create-product-brcr', function (BreadcrumbTrail $trail) {
    $trail->parent('products-brcr');
    $trail->push('New Product', Routing::url('product.create'));
});

// LOCALIZATION
Breadcrumbs::for('stock-statuses-brcr', function (BreadcrumbTrail $trail) {
    $trail->push('Stock Statuses', Routing::url('stock-statuses'));
});
