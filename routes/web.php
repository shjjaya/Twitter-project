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
Auth::routes();
Route::middleware(['auth'])->group(function() {
    Route::resource('/profiles', 'ProfileController');

    Route::get('/profiles', function () {
        return redirect('/profiles/' . Auth::id());
    Route::get('/logout', function () {
        return redirect('/login');

    });
    });

    Route::resource('/tweets', 'TweetController');
    Route::get('/profiles/{profile}/followers', 'ProfileController@follower');
    Route::get('/profiles/{profile}/following', 'ProfileController@following');
    Route::get('/', function () {
        return redirect('/tweets');
    });
    Route::post('tweets/{tweet}/comments', 'CommentController@store');
    Route::delete('tweets/{tweet}/comments', 'CommentController@destroy');
    Route::get('/likes/{id}/tweet', 'LikeController@like');

});
