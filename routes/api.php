<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/edit/{id}', 'AuthController@editUser');


// Route::group(['middleware' => 'auth:api'], function(){
    Route::prefix('barang')->group(function () {
        Route::get('', 'BarangController@index');
        Route::post('create', 'BarangController@store');
        Route::get('transaksi', 'BarangController@index_transaksi');
        Route::post('transaksi/create', 'BarangController@ambil_barang');
        
        Route::get('/image/{url}', 'BarangController@jaket_image');
        Route::get('{id}', 'BarangController@show');
        Route::get('create', 'BarangController@create');
        Route::POST('edit', 'BarangController@edit');
        Route::post('{id}/update', 'BarangController@update');
        Route::post('delete', 'BarangController@delete');
    });	
// });     

Route::get('tes', 'BarangController@sendGCM');
Route::post('login', 'AuthController@login');
Route::post('signup', 'AuthController@signup');

Route::group(['prefix' => 'auth'], function () {
	    Route::post('login', 'AuthController@login');
	    Route::post('signup', 'AuthController@signup');
	  
	    Route::group(['middleware' => 'auth:api' ], function() {
	        Route::get('logout', 'AuthController@logout');
	        Route::get('user', 'AuthController@user');
	    });
	});