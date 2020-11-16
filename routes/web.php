<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/products/{product}', 'pagesController@showProduct');
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
        Route::put('/menu/{menu}/assign-label', 'MenuController@assignLabel');
        Route::put('/menu/{menu}/change-status', 'MenuController@changeStatus');
        Route::resource('/menu', 'MenuController');
        Route::resource('/labels', 'LabelController');
        Route::post('/products/{product}/gallery', 'ProductController@storeGallery');
        Route::put('/products/{product}/change-status', 'ProductController@changeStatus');
        Route::delete('/products/{product}/gallery-image/{image}', 'ProductController@deleteGalleryImage');
        Route::resource('/products', 'ProductController');
        Route::resource('/products/{product}/points', 'PointController');
        Route::put('/sizes/{size}/change-status', 'SizeController@changeStatus');
        Route::resource('/sizes', 'SizeController');
        Route::put('/papers/{paper}/change-status', 'PaperController@changeStatus');
        Route::resource('/papers', 'PaperController');
        Route::put('/finishings/{finishing}/change-status', 'FinishingController@changeStatus');
        Route::resource('/finishings', 'FinishingController');
        Route::put('/packages/{pacakge}/change-status', 'PackageController@changeStatus');
        Route::resource('/products/{product}/packages', 'PackageController');
        Route::put('/prices/{price}/change-status', 'PackagePriceController@changeStatus');
        Route::resource('/products/{product}/packages/{package}/prices', 'PackagePriceController');
        Route::delete('/packagepricesizes/{packagepricesize}', 'PackagePriceSizeController@destroy');

    });

});
