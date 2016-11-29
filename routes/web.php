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


// Route::group(['middleware' => 'admin'], function () {
//         Route::get('/admin', 'AdminController@index');
//         Route::resource('admin/users', 'AdminUsersController', ['as' => 'admin']);
//         Route::resource('admin/products', 'ProductController', ['as' => 'admin']);
// }); pasikurti muddleware



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

Route::resource('reservation', 'TableReservationController');

Route::resource('orders', 'OrderController');

Route::get('/user/orders', 'OrderController@userIndex')->name('user.orders');

Route::get('/booking', 'TableReservationController@index')->name('reservations.user.index');

Route::get('/admin/reservation', 'TableReservationController@index')->name('reservations.admin.index');













