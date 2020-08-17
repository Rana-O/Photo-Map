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
    return view('top');

});
Route::group(['prefix' => 'mypage'], function() {
    Route::get('profile/edit','Controllers\ProfileController@edit')->middleware('auth');
});

Auth::routes();

Route::get('/mypage', 'HomeController@index')->name('mypage');

