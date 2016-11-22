<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');

    Route::resource('dishes', 'DishesController');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/reservation', function () {
    return view('/reservations/user/reservation');
});

Route::get('/shopNow', 'DishesController@user');

//Route::get('/cart', 'CartController@index')->name('cart.create');

Route::resource('cart', 'CartController');

//Route::get('/dishes', 'DishesController@index');












