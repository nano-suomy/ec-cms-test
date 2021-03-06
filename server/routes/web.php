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
    return view('index');
});

/**
 * register
 */
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

/**
 * EC
 */
Route::resource('goods', 'GoodsController', ['only' => [
    'index', 'show'
]]);

/**
 * EC-CMS
 */
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'], function() {
        Route::resource('goods', 'Admin\GoodsController');
});
