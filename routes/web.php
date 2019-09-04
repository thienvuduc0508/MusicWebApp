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

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@index')->name('index');
Route::get('/newSong','GuestController@getAllNewSongs')->name('Guest.getAllNewSongs');
Route::get('/mostListenSong','GuestController@getAllMostListenSongs')->name('Guest.getAllMostListenSongs');
Route::get('/search', 'SongController@searchByName')->name('songs.searchByName');
Route::get('playsong/{id}', 'SongController@showSong')->name('songs.play');
Route::get('/newplaylists','PlaylistController@getAllNewPlaylists')->name('playlist.getAllNewPlaylists');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/{id}', 'UserController@index')->name('user.index');
        Route::get('update/{id}', 'UserController@editProfile')->name('user.edit');
        Route::post('update/{id}', 'UserController@update')->name('user.update');
        Route::get('/changepassword/{id}', 'UserController@changePassword')->name('change.password');
        Route::post('/updatepassword/{id}', 'UserController@updatePassword')->name('update.password');
    });
    Route::group(['prefix' => 'songs'], function () {
        Route::get('/', 'SongController@index')->name('songs.index');
        Route::get('create/', 'SongController@create')->name('songs.create');
        Route::post('create/', 'SongController@store')->name('songs.store');
        Route::get('update/{id}', 'SongController@edit')->name('songs.edit');
        Route::post('update/{id}', 'SongController@update')->name('songs.update');
        Route::get('delete/{id}', 'SongController@delete')->name('songs.delete');
    });
    Route::group(['prefix' => 'playlists'], function () {
        Route::get('/', 'PlaylistController@index')->name('playlists.showPlaylists');
        Route::get('create/', 'PlaylistController@create')->name('playlists.create');
        Route::post('create/', 'PlaylistController@store')->name('playlists.store');
        Route::get('detail/{id}', 'PlaylistController@showDetailPlaylist')->name('playlists.detail');
        Route::get('edit/{id}', 'PlaylistController@edit')->name('playlists.edit');
        Route::post('update/{id}', 'PlaylistController@update')->name('playlists.update');
        Route::get('delete/{id}', 'PlaylistController@destroy')->name('playlists.destroy');
    });
});
