<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

// Route::get('/', [pagesController, 'home'])->name('homepage');
Route::get('/', 'pagesController@home')->name('home');

Route::get('/layout-templates', 'pagesController@templateCategories');
Route::get('/layout-templates/{category}', 'pagesController@templateByCategory');
Route::get('/estimate', 'pagesController@estimate');
Route::post('/estimate', 'pagesController@estimateStore');
Route::get('/category/{category}/products', 'pagesController@showProductsByCategory');
Route::get('/products/{product}', 'pagesController@showProduct');
Route::get('/products/shirt/{product}', 'pagesController@shirtProduct');
Route::get('/products/personalized-gifts', 'pagesController@personalizedGiftsByCategory')->name('personalized-gifts');
Route::get('/products/personalized-gifts/{subcategory}', 'pagesController@personalizedGiftsByCategory')->name('personalized-gifts.index');
Route::get('/products/shirts/{category}', 'pagesController@shirtsByCategory')->name('personalized-gifts.index');
Route::get('/products/shirts/{category}/{subcategory}', 'pagesController@shirtsBySubCategory')->name('personalized-gifts-subcategory.index');


// Order Filter Product /
Route::get('/product-order/{type}/{product}', 'pagesController@checkOrderType');
// Route::get('/product-order/{type}/{product}', 'pagesController@checkOrderType');
// Route::get('/product-order/{type}/{product}', 'pagesController@checkOrderType');


//Pages Page
Route::get('/pages/{page}', 'pagesController@singlePage');

// Static Routes
Route::get('/terms-and-conditions', 'pagesController@TermsAndConditions');
Route::get('/cart', 'pagesController@cart');
Route::get('/page/artworking-service', 'pagesController@artnetwork');
Route::get('/page/one-to-one-design', 'pagesController@onetoone');
Route::get('/page/pro-design', 'pagesController@prodesign');

Route::group(['prefix' => 'profile'], function() {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'ProfileController@index');
        Route::post('/update', 'ProfileController@updateProfile');
        Route::post('/orders/{order}/store-file', 'FileController@storeFile');
        Route::post('/orders/{order}/add-cloud-file', 'FileController@addCloudFile');
        Route::get('/orders/{order}/upload-your-design', 'FileController@uploadYourDesign');
        Route::post('/orders/{order}/upload-your-design', 'FileController@store');
        Route::delete('/orders/{order}/files/{file}', 'FileController@destroy');
        Route::put('/orders/{order}/update-order', 'OrderController@updateOrder');
        Route::resource('/orders', 'OrderController');
        Route::resource('/address-books', 'AddressBookController');
        Route::get('/designs', 'ProfileController@designs');
        Route::resource('/pending-proofs', 'PendingProofController');
    });
});


// Route::get('/category', 'CategoryController@show');
// Route::get('/page', 'CategoryController@show');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'manage'], function() {

    Route::group(['middleware' => ['auth','permission:browse admin']], function () {

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

        Route::get('/select-product-type', 'ProductController@selectProductType')->name('select_product_type');
        Route::post('/products/{product}/gallery', 'ProductController@storeGallery');
        Route::put('/products/{product}/assign-label', 'ProductController@assignLabel');
        Route::put('/products/{product}/change-status', 'ProductController@changeStatus');
        Route::delete('/products/{product}/gallery-image/{image}', 'ProductController@deleteGalleryImage');
        Route::resource('/products', 'ProductController');
        Route::get('/create/gift-product', 'ProductController@createGiftProduct')->name('products.gift.create');
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
        Route::get('/orders', 'ManagePages@orders')->name('orders.index');
        Route::get('/orders/{order}', 'ManagePages@order')->name('orders.show');
        Route::get('/pending-proofs', 'ManagePages@pendingProofs')->name('pending-proofs.index');
        Route::get('/pending-proofs/{pp}', 'ManagePages@pendingProof')->name('pending-proofs.show');
        Route::get('/estimates', 'EstimateController@index')->name('manage.estimates.index');
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

