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

Route::get('login/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Auth::routes();



Route::get('/settings', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth'] ,function(){

	Route::resource('/stores', 'StoreController');

	Route::get('/products/{storeName}', ['uses' =>'ProductController@index']);

	Route::get('/home', 'StoreController@index');

	Route::get('/{store_name}/create', 'ProductController@create');

	Route::resource('/product', 'ProductController');

	Route::get('product/{store_name}/{id}/edit', 'ProductController@edit');
	
});

Route::resource('productimage', 'ProductImageController');






