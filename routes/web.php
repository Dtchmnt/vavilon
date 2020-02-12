<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** Admin */
Route::group(['middleware' => ['status', 'auth']], function(){
    $groupData = [
      'namespace' => 'Shop\Admin',
        'prefix' => 'admin',
    ];
    Route::group($groupData, function (){
       Route::resource('index', 'MainController')
           ->names('shop.admin.index');
        Route::resource('category', 'CategoryController')
            ->names('shop.admin.categories.index');
        Route::resource('storage', 'StorageController')
            ->names('shop.admin.storage.index');
        Route::resource('partner', 'PartnerController')
            ->names('shop.admin.partner.index');
        Route::resource('product', 'ProductController')
            ->names('shop.admin.product.index');
    });
});

