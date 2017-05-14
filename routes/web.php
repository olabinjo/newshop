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

Route::post('/ajax/add-to-cart', 'WebsiteController@addToCart');
Route::get('/cart', ['as'=>'cart', 'uses'=>'WebsiteController@viewCart']);


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

	

	

	Route::get('/home', 'StoreController@index');


	/*Route below was changed to not conflict with other create methods*/
	Route::get('/{store_name}/creating', 'ProductController@create');


	Route::resource('product', 'ProductController');

	

	Route::get('products/{store_name}', ['as'=>'store_name', 'uses'=>'ProductController@index']);
	Route::get('product/{store_name}/{id}/edit', 'ProductController@edit');
	Route::post('product/save', 'ProductController@store');


	Route::resource('image', 'ProductImageController');

	Route::get('upload', 'UploadController@index');
	Route::post('upload/uploadFiles','uploadController@multiple_upload');


	Route::post('category/save', 'CategoryController@save');
});




Route::get('/{store_name}', 'WebsiteController@productList');
Route::get('/{store_name}/{product_id}', 'WebsiteController@singleProduct');



