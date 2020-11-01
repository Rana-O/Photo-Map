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
     // logger()->info('something happends');
     return view('top');
 });

Route::group(['prefix' => 'mypage'], function() {
    Route::get('myprofile', 'Mypage\ProfileController@myprofile')->middleware('auth');
    Route::post('myprofile', 'Mypage\ProfileController@myprofile')->middleware('auth');
    Route::post('myprofile/edit', 'Mypage\ProfileController@edit')->middleware('auth');
    Route::get('myprofile/edit', 'Mypage\ProfileController@edit')->middleware('auth');
    Route::post('myprofile/update', 'Mypage\ProfileController@update')->middleware('auth');
    Route::get('edit/', 'Mypage\editController@jump')->middleware('auth');
});

Auth::routes();

Route::post('/api/photo', 'Mypage\editController@store');
// Route::get('/api/photo', 'Mypage\editController@store');

Route::get('/mypage', 'HomeController@index')->name('mypage');

//Route::get('/register', 'RegisterController@register')->name('register.register');
//Route::post('/register', 'RegisterController@register');

