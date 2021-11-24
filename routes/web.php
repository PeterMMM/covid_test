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

Route::get('admin', function () {
    return view('admin.login');
});

Route::get('admin/dashboard', 'BookingController@bookingList');

Route::get('admin/users', 'AdminController@userList');

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

Route::get('booking/status/update/{booking_id}/{status_id}/{screen}', [
    'uses' => 'BookingController@statusUpdate',
    'as'   => 'booking.status.update',
]);

Route::get('send-mail',function(){
    $details = [
        'title' => 'Mail from COVID TEST BOOKING service',
        'body'  => 'This is confirm message for booking date that you register.'
    ];

    \Mail::to('minmg.peter@gmail.com')->send(new \App\Mail\BookingReplyMail($details));
      // check for failures
    dd("Email send.");
    if (Mail::failures()) {
        return response()->Fail('Sorry! Please try again latter');
    }else{
        return response()->success('Great! Successfully send in your mail');
    }
    dd("Email send.");
});