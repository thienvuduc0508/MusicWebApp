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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'profile'], function () {
    Route::get('/{id}', 'UserController@index')->name('user.index');
    Route::get('update/{id}', 'UserController@editProfile')->name('user.edit');
    Route::post('update/{id}', 'UserController@update')->name('user.update');
    Route::get('/changepassword/{id}', 'UserController@changePassword')->name('change.password');
    Route::post('/updatepassword/{id}', 'UserController@updatePassword')->name('update.password');
});
