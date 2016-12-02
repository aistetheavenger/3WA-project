<?php

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('dishes', 'DishesController');
});

Route::group(['middleware'=>['auth', 'admin']], function(){
	Route::resource('/admin/dishes', 'AdminDishController');
	Route::resource('/orders', 'OrdersController');
	Route::resource('/reservation', 'TableReservationController');

	return "this page requires that you be logged in and an Admin";


});



Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/reservation', function () {
    return view('/reservations/user/reservation');
});

Route::resource('/users', 'UsersController');


Route::get('/shopNow', 'DishesController@user');
Route::resource('cart', 'CartController');
Route::resource('reservation', 'TableReservationController');
Route::resource('orders', 'OrderController');
Route::get('/user/orders', 'OrderController@userIndex')->name('user.orders');
Route::get('/booking', 'TableReservationController@index')->name('reservations.user.index');
Route::get('/admin/reservation', 'TableReservationController@index')->name('reservations.admin.index');













