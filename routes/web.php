<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/tweets', 'TweetController@index')->name('home')->middleware('auth');
Route::post('tweets', 'TweetController@store')->middleware('auth');
Route::delete('tweets/{tweet}', 'TweetController@destroy');
Route::get('tweets/{tweet}', 'TweetController@show');

Route::post('tweets/{tweet}/like', 'TweetsLikesController@store');
Route::delete('tweets/{tweet}/dislike', 'TweetsLikesController@destroy');
Route::get('tweet/{tweet}/likes', 'TweetsLikesController@showLikes');
Route::get('tweet/{tweet}/dislikes', 'TweetsLikesController@showDislikes');


Route::get('profiles/{user:username}', 'ProfilesController@show')->name('profile');

Route::post('profiles/{user:username}/follow', 'FollowController@store');

Route::patch('/profiles/{user:username}', 'ProfilesController@update')->middleware('can:edit,user');

Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit')
->middleware('can:edit,user');

Route::get('/explore', 'ExploreController');

Route::get('/notifications', 'NotificationController@index')->middleware('auth');
Route::get('/notifications/read', 'NotificationController@indexRead')->middleware('auth');

Route::post('/notifications/read', 'NotificationController@read')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('getuser/{letters}', 'AjaxController@listen');

Auth::routes();
