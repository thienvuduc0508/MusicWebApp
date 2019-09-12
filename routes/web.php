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
Route::get('/new-song','GuestController@getAllNewSongs')->name('Guest.getAllNewSongs');
Route::get('/most-listen-song','GuestController@getAllMostListenSongs')->name('Guest.getAllMostListenSongs');
Route::get('/{id}/playsong', 'SongController@showSong')->name('songs.play');
Route::get('/new-playlists','PlaylistController@getAllNewPlaylists')->name('playlist.getAllNewPlaylists');
Route::get('/search','GuestController@search')->name('search');
Route::get('{id}/playlist','PlaylistController@getSongsInPlaylistForGuest')->name('playlist.guestPlaylists');
Route::get('singer/', 'SingerController@showListSinger')->name('singer.listSinger');
Route::get('singer/{id}', 'SingerController@showDetailSinger')->name('singer.detailSinger');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'me/profile'], function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('update', 'UserController@editProfile')->name('user.edit');
        Route::post('update', 'UserController@update')->name('user.update');
        Route::get('/change-password', 'UserController@changePassword')->name('change.password');
        Route::post('/update-password', 'UserController@updatePassword')->name('update.password');
    });


    Route::group(['prefix' => 'me/songs'], function () {
        Route::get('/', 'SongController@index')->name('songs.index');
        Route::get('create/', 'SongController@create')->name('songs.create');
        Route::post('create/', 'SongController@store')->name('songs.store');
        Route::get('{id}/update', 'SongController@edit')->name('songs.edit');
        Route::post('{id}/update/', 'SongController@update')->name('songs.update');
        Route::get('{id}/delete/', 'SongController@delete')->name('songs.delete');
        Route::get('{id}/add-singer', 'SingerController@showAddSingerToSong')->name('singer.showAddSingerToSong');

        Route::get('{id}/add-singer/{singer_id}', 'SingerController@addSinger')->name('singer.addSinger');


    });
    Route::group(['prefix' => 'me/playlists'], function () {
        Route::get('/', 'PlaylistController@index')->name('playlists.showPlaylists');
        Route::get('create/', 'PlaylistController@create')->name('playlists.create');
        Route::post('create/', 'PlaylistController@store')->name('playlists.store');
        Route::get('{id}/detail/', 'PlaylistController@showDetailPlaylist')->name('playlists.detail');
        Route::get('{id}/edit/', 'PlaylistController@edit')->name('playlists.edit');
        Route::post('{id}/update/', 'PlaylistController@update')->name('playlists.update');
        Route::get('{id}/delete', 'PlaylistController@destroy')->name('playlists.destroy');
        Route::get('/{id}/add-song', 'PlaylistController@showAddSongToPlaylist')->name('playlists.showAddSong');
        Route::get('add-song/{id}/song/{songId}', 'PlaylistController@addSong')->name('playlists.addSong');
        Route::get('/{id}/songs', 'PlaylistController@getSongsInPlaylist')->name('playlists.getSong');
        Route::get('{playlistId}/{id}/song/delete-song', 'PlaylistController@deleteSongsInPlaylist')->name('playlists.deleteSong');
    });
    Route::group(['prefix' => 'singers'], function () {
        Route::get('/', 'SingerController@index')->name('singer.index');
        Route::get('create', 'SingerController@create')->name('singer.create');
        Route::post('create', 'SingerController@store')->name('singer.store');
        Route::get('{id}/edit', 'SingerController@edit')->name('singer.edit');
        Route::post('{id}/update', 'SingerController@update')->name('singer.update');
        Route::get('{id}/delete/', 'SingerController@destroy')->name('singer.destroy');

    });
});
