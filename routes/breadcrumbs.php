<?php

// Dashboard
Breadcrumbs::for('manage.dashboard', function ($trail) {
    $trail->push('Dashboard', route('manage.dashboard'));
});

// Dasboard > Products
Breadcrumbs::for('manage.products', function ($trail) {
    $trail->parent('manage.dashboard');
    $trail->push('Products', route('products.index'));
});

// Dasboard > Products > Create
Breadcrumbs::for('manage.products.create', function ($trail) {
    $trail->parent('manage.products');
    $trail->push('Create', route('products.create'));
});

// Home > Products > [product]
Breadcrumbs::for('manage.product', function ($trail, $product) {
    $trail->parent('manage.products');
    $trail->push($product->id, route('products.show', $product->id));
});

// Home > Products > [product] > points
Breadcrumbs::for('product.points', function ($trail, $product) {
    $trail->parent('manage.product', $product);
    $trail->push("Points", route('points.index', $product->id));
});

// Home > Products > [product] > points > create
Breadcrumbs::for('product.points.create', function ($trail, $product) {
    $trail->parent('product.points', $product);
    $trail->push("create", route('points.create', $product->id));
});

// Home > Products > [product] > points > [point]
Breadcrumbs::for('product.point', function ($trail, $product, $point) {
    $trail->parent('product.points', $product);
    $trail->push($point->title, route('points.show', [$product->id,$point->id]));
});

// Home > Products > [product] > packages
Breadcrumbs::for('product.packages', function ($trail, $product) {
    $trail->parent('manage.product', $product);
    $trail->push("Packages", route('packages.index', $product->id));
});

// Home > Products > [product] > packages > create
Breadcrumbs::for('product.packages.create', function ($trail, $product) {
    $trail->parent('product.packages', $product);
    $trail->push("create", route('packages.create', $product->id));
});

// Home > Products > [product] > packages > [package]
Breadcrumbs::for('product.package', function ($trail, $product, $package) {
    $trail->parent('product.packages', $product);
    $trail->push($package->quantity, route('packages.show', [$product->id,$package->id]));
});
