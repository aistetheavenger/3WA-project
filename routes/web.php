<?php

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('dishes', 'DishesController');
    Route::get('/profile', 'UsersController@profile')->name('users.profile');
    Route::post('/profile', 'UsersController@profileUpdate')->name('users.profile.update');
});

Route::group(['middleware'=>['auth', 'admin']], function(){
	Route::resource('dishes', 'DishesController');
	// Route::resource('/admin/dishes', 'DishController');
	Route::resource('/orders', 'OrdersController');
	Route::resource('/reservation', 'TableReservationController');
	Route::resource('/users', 'UsersController');
	


});



Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/reservation', function () {
    return view('/reservations/user/reservation');
});




Route::get('/shopNow', 'DishesController@user');
Route::resource('cart', 'CartController');
Route::resource('reservation', 'TableReservationController');
Route::resource('orders', 'OrderController');
Route::get('/user/orders', 'OrderController@userIndex')->name('user.orders');
Route::get('/booking', 'TableReservationController@index')->name('reservations.user.index');
Route::get('/admin/reservation', 'TableReservationController@index')->name('reservations.admin.index');













