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

// Dasboard > Select product type
Breadcrumbs::for('manage.select_product_type', function ($trail) {
    $trail->parent('manage.products');
    $trail->push('Select Product Type', route('select_product_type'));
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
    $trail->push("Papers", route('packages.index', $product->id));
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


// Home > Products > [product] > variants
Breadcrumbs::for('product.variants', function ($trail, $product) {
    $trail->parent('manage.product', $product);
    $trail->push("Variants", route('variants.index', $product->id));
});

// Home > Products > [product] > variants > create
Breadcrumbs::for('product.variants.create', function ($trail, $product) {
    $trail->parent('product.variants', $product);
    $trail->push("create", route('variants.create', $product->id));
});

// Home > Products > [product] > variants > [variant]
Breadcrumbs::for('product.variant', function ($trail, $product, $variant) {
    $trail->parent('product.variants', $product);
    $trail->push($variant->id, route('variants.show', [$product->id,$variant->id]));
});


// Dasboard > Categories
Breadcrumbs::for('manage.categories', function ($trail) {
    $trail->parent('manage.dashboard');
    $trail->push('Categories', route('categories.index'));
});

// Dasboard > Categories > Create
Breadcrumbs::for('manage.categories.create', function ($trail) {
    $trail->parent('manage.categories');
    $trail->push('Create', route('categories.create'));
});

// Home > Categories > [Category]
Breadcrumbs::for('manage.category', function ($trail, $category) {
    $trail->parent('manage.categories');
    $trail->push($category->id, route('categories.show', $category->id));
});

// Home > Cateogry > [category] > sub category
Breadcrumbs::for('category.subs', function ($trail, $category) {
    $trail->parent('manage.categories', $category);
    $trail->push("Sub Categories", route('sub-categories.index', $category->id));
});

// Home > Cateogry > [category] > sub category > create
Breadcrumbs::for('category.subs.create', function ($trail, $category) {
    $trail->parent('category.subs', $category);
    $trail->push( "create", route('sub-categories.create', $category->id));
});


// Home > Cateogry > [category] > sub category > [sub category]
Breadcrumbs::for('category.sub', function ($trail, $category, $sub) {
    $trail->parent('category.subs', $category);
    $trail->push($sub->id, route('sub-categories.show', [$category->id,$sub->id]));
});



// ======== Frontend ========== //


Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Dasboard > Products
Breadcrumbs::for('personalized-gifts', function ($trail) {
    $trail->parent('home');
    $trail->push('Personalized Gifts', route('personalized-gifts'));
});
// Dasboard > Products
Breadcrumbs::for('personalized-gifts.index', function ($trail, $subcategory) {
    $trail->parent('personalized-gifts');
    $trail->push($subcategory, route('personalized-gifts.index', $subcategory));
});
