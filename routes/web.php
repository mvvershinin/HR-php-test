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
    return redirect('/orders');
})->name('index');

Route::resource('orders', 'OrderController', [
    'only' => ['index', 'edit', 'update']
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
    Route::get('weather', 'Ajax\WeatherController@getWeather')->name('ajax.weather');
    Route::get('products-price-edit', 'Ajax\ProductController@edit')->name('ajax.products.edit.price');
    Route::post('products-price-update', 'Ajax\ProductController@update')->name('ajax.products.update.price');
});