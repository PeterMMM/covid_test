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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

Route::get('admin/login', function () {
    return view('admin.login');
});

Route::get('admin/dashboard', 'BookingController@bookingList');

Route::post('/admin/login', [
    'uses' => 'AdminController@login',
    'as' => 'admin.login',
]);

Route::get('/admin/logout', [
    'uses' => 'AdminController@logout',
    'as' => 'admin.logout',
]);

Route::get('/admin/booking/{id}', [
    'uses' => 'AdminController@bookingDetail',
    'as'   => 'admin.booking.detail',
]);