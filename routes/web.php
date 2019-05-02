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
})->name('index');

Route::resource('orders', 'OrderController', [
    'only' => ['index', 'edit']
]);

Route::resource('products', 'ProductController', [
    'only' => ['index', 'edit']
]);

Route::group(['prefix' => 'ajax'], function () {
    Route::get('orders-all', 'Ajax\OrderController@getAll')->name('ajax.orders.all');
    Route::get('orders-new', 'Ajax\OrderController@getNew')->name('ajax.orders.new');
    Route::get('orders-current', 'Ajax\OrderController@getCurrent')->name('ajax.orders.current');
    Route::get('orders-overdue', 'Ajax\OrderController@getOverdue')->name('ajax.orders.overdue');
    Route::get('orders-finished', 'Ajax\OrderController@getFinished')->name('ajax.orders.finished');
});