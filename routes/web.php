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
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::post('/tweets', 'TweetController@store');
    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::post('/profile/{user}/follow', 'FollowsController@store');
    Route::get('/profile/{user}/edit', 'ProfileController@edit')->middleware('can:edit,user');
    Route::patch('/profile/{user}/edit', 'ProfileController@update')->middleware('can:edit,user');
    Route::get('/explore', 'ExploreController');

    Route::post('/tweet/{tweet}/like', 'TweetLikeController@store');
    Route::delete('/tweet/{tweet}/like', 'TweetLikeController@destroy');
});

Route::get('/profile/{user}', 'ProfileController@show')->name('profile');