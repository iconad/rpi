<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// routes/web.php



use Illuminate\Support\Facades\DB;

Route::get('/test-database', function () {
    $result = DB::table('menus')->select('*')->first();
    dd($result);
});


Route::get('/home-demo', function () {
    return view('home-backup');
})->name('home.demo');

Route::get('/category-printing', function () {
    return view('category-printing');
})->name('category-printing');

Route::get('/category-packages', function () {
    return view('category-packages');
})->name('category-packages');

Route::get('/category-banners', function () {
    return view('banners');
})->name('banners');

Route::get('/category-wallpapers', function () {
    return view('category-wallpapers');
})->name('category');

Route::get('/estimate-demo', function () {
    return view('estimate-demo');
})->name('estimate');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/home-dynamic', function () {
    return view('home-dynamic');
})->name('home dynamic');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/comingsoon', function () {
    return view('commingsoon');
})->name('comingsoon');

// ... other routes ...

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/', [pagesController, 'home'])->name('homepage');
Route::get('/', 'pagesController@home')->name('home');

Route::get('/layout-templates', 'pagesController@templateCategories');
Route::get('/layout-templates/{category}', 'pagesController@templateByCategory');
Route::get('/estimate', 'pagesController@estimate');
Route::post('/estimate', 'pagesController@estimateStore');
Route::get('/categories/{menu}', 'pagesController@getCategoriesByMenu');
Route::get('/category/{category}/subcategories/{subcategory}/products', 'pagesController@showProductsBySubCategory');
Route::get('/category/{category}/products', 'pagesController@showProductsByCategory');
// Route::get('/category/{category}/packing', 'pagesController@showPackingByCategory');
Route::get('/products/{product}', 'pagesController@showProduct');
Route::get('/products/shirt/{product}', 'pagesController@shirtProduct');
Route::get('/products/personalized-gifts', 'pagesController@personalizedGiftsByCategory')->name('personalized-gifts');
Route::get('/products/personalized-gifts/{subcategory}', 'pagesController@personalizedGiftsByCategory')->name('personalized-gifts.index');
Route::get('/products/wallpapers', 'pagesController@wallpapesByCategory')->name('wallpapers');
Route::get('/products/wallpapers/{subcategory}', 'pagesController@wallpapesByCategory')->name('wallpapers.index');
Route::get('/products/shirts/{category}', 'pagesController@shirtsByCategory')->name('personalized-gifts.index');
Route::get('/products/shirts/{category}/{subcategory}', 'pagesController@shirtsBySubCategory')->name('personalized-gifts-subcategory.index');


// Order Filter Product /
Route::get('/product-order/{type}/{product}', 'pagesController@checkOrderType');
// Route::get('/product-order/{type}/{product}', 'pagesController@checkOrderType');
// Route::get('/product-order/{type}/{product}', 'pagesController@checkOrderType');


//Pages Page
Route::get('/pages/{page}', 'pagesController@singlePage');

// Static Routes
// Route::get('/test-page', 'pagesController@testPage');

Route::get('/terms-and-conditions', 'pagesController@TermsAndConditions');
Route::get('/cart', 'pagesController@cart');
Route::get('/page/artworking-service', 'pagesController@artnetwork');
Route::get('/page/one-to-one-design', 'pagesController@onetoone');
Route::get('/page/pro-design', 'pagesController@prodesign');

Route::group(['prefix' => 'profile'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'ProfileController@index');
        Route::post('/update', 'ProfileController@updateProfile');
        Route::post('/orders/{order}/store-file', 'FileController@storeFile');
        Route::post('/orders/{order}/add-cloud-file', 'FileController@addCloudFile');
        Route::get('/orders/{order}/upload-your-design', 'FileController@uploadYourDesign');
        Route::get('/orders/{order}/wallpaper-checkout', 'OrderController@WallpaperOrderCheckout');
        Route::post('/orders/{order}/upload-your-design', 'FileController@store');
        Route::delete('/orders/{order}/files/{file}', 'FileController@destroy');
        Route::put('/orders/{order}/update-order', 'OrderController@updateOrder');
        Route::resource('/orders', 'OrderController');
        Route::get('/estimates', 'ProfileController@estimates');
        Route::resource('/address-books', 'AddressBookController');
        Route::get('/designs', 'ProfileController@designs');
        Route::resource('/pending-proofs', 'PendingProofController');
        Route::resource('/menu', 'MenuController');
    });
});


// Route::get('/category', 'CategoryController@show');
// Route::get('/page', 'CategoryController@show');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'manage'], function () {

    Route::group(['middleware' => ['auth', 'permission:browse admin']], function () {

        Route::get('/dashboard', 'ManagePages@dashboard')->name('manage.dashboard');
        Route::put('/categories/{category}/change-status', 'CategoryController@changeStatus');
        Route::put('/categories/{category}/assign-label', 'CategoryController@assignLabel');
        Route::resource('/categories', 'CategoryController');

        Route::resource('/categories/{category}/sub-categories', 'SubCategoryController');
        Route::put('/subcategories/{sub}/change-status', 'SubCategoryController@changeStatus');
        Route::put('/subcategories/{sub}/assign-label', 'SubCategoryController@assignLabel');

        Route::put('/menu/{menu}/assign-label', 'MenuController@assignLabel');
        Route::put('/menu/{menu}/change-status', 'MenuController@changeStatus');
        Route::resource('/menu', 'MenuController');
        Route::resource('/labels', 'LabelController');
        Route::resource('/colors', 'ColorController');
        Route::resource('/materials', 'MaterialController');

        Route::get('/select-product-type', 'ProductController@selectProductType')->name('select_product_type');
        Route::get('/products/{product}/finishings', 'ProductController@productFinishings')->name('product.finishings');
        Route::post('/products/{product}/gallery', 'ProductController@storeGallery');
        Route::put('/products/{product}/assign-label', 'ProductController@assignLabel');
        Route::put('/products/{product}/change-status', 'ProductController@changeStatus');
        Route::delete('/products/{product}/gallery-image/{image}', 'ProductController@deleteGalleryImage');
        Route::resource('/products', 'ProductController');
        Route::get('/create/wallpaper-product', 'ProductController@createWallpaperProduct')->name('products.wallpaper.create');
        Route::get('/create/gift-product', 'ProductController@createGiftProduct')->name('products.gift.create');
        Route::get('/create/packing', 'ProductController@createPacking')->name('products.packing.create');
        Route::get('/create/shirt', 'ProductController@createShirtProduct')->name('products.shirt.create');

        Route::put('/page-categories/{category}/change-status', 'PageCategoryController@changeStatus');
        Route::resource('/page-categories', 'PageCategoryController');
        Route::put('/page-categories/{category}/pages/{page}/change-status', 'PageController@changeStatus');
        Route::resource('/page-categories/{category}/pages', 'PageController');
        Route::resource('/products/{product}/points', 'PointController');
        Route::put('/sizes/{size}/change-status', 'SizeController@changeStatus');
        Route::resource('/sizes', 'SizeController');
        Route::put('/papers/{paper}/change-status', 'PaperController@changeStatus');
        Route::resource('/papers', 'PaperController');
        Route::put('/finishings/{finishing}/change-status', 'FinishingController@changeStatus');
        Route::resource('/finishings', 'FinishingController');
        Route::resource('/finishings/{finishing}/options', 'FinishingOptionController');
        Route::put('/printing/{print}/change-status', 'PrintingController@changeStatus');
        Route::resource('/printing', 'PrintingController');
        Route::resource('/printing/{print}/options', 'PrintingOptionController');
        Route::put('/packages/{pacakge}/change-status', 'PackageController@changeStatus');
        Route::resource('/products/{product}/packages', 'PackageController');
        Route::resource('/products/{product}/variants', 'VariantController');
        Route::post('/products/{product}/variants/{variant}/add-color-to-variant', 'VariantController@addColorToVariant');
        Route::put('/variants/{variant}/change-status', 'VariantController@changeStatus');
        Route::put('/prices/{price}/change-status', 'PackagePriceController@changeStatus');
        Route::resource('/products/{product}/packages/{package}/prices', 'PackagePriceController');
        Route::delete('/packagepricesizes/{packagepricesize}', 'PackagePriceSizeController@destroy');
        Route::delete('/package-price-sizes-price/{finishingid}', 'PackagePriceSizesPriceController@destroy');
        Route::get('/orders', 'ManagePages@orders')->name('orders.index');
        Route::get('/orders/{order}', 'ManagePages@order')->name('orders.show');
        Route::put('/pending-proofs/{pp}', 'PendingProofController@update');
        Route::get('/pending-proofs', 'ManagePages@pendingProofs')->name('pending-proofs.index');
        Route::get('/pending-proofs/{pp}', 'ManagePages@pendingProof')->name('pending-proofs.show');
        Route::get('/estimates', 'EstimateController@index')->name('manage.estimates.index');
        Route::resource('/sliders', 'CarouselController');
        Route::put('/sliders/{slider}/change-status', 'CarouselController@changeStatus');
        Route::get('/estimates/{estimate}', 'EstimateController@show')->name('manage.estimates.show');
        Route::resource('/estimates/{estimate}/responses', 'EstimateReplyController');
        Route::get('/users', 'ManagePages@ManageUsers')->name('users.index');
        Route::get('/users/{user}', 'ManagePages@ManageUser')->name('users.show');
        Route::get('/users/{user}/orders', 'ManagePages@ManageUserOrders')->name('user.orders');
        Route::put('/template-categories/{category}/change-status', 'TemplateCategoryController@changeStatus');
        Route::resource('/template-categories', 'TemplateCategoryController');
        Route::put('/templates/{template}/change-status', 'TemplateController@changeStatus');
        Route::post('/template-categories/templates/{type}/{template}/store-file', 'TemplateFileController@store');
        Route::delete('/template-files/{file}', 'TemplateFileController@destroy');
        Route::resource('/template-categories/{category}/templates', 'TemplateController');
    });
});

Route::get('/auth/google/redirect', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
Route::get('/test-database-connection', 'homeController@testDatabaseConnection');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/menunew', 'MenuController@show');
