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
use App\Mail\NewUserWelcomeMail;


Route::get('/', 'PostsController@index')->middleware('auth');

Auth::routes();

Route::get('/email', function (){
  return new NewUserWelcomeMail();
});


Route::post('follow/{user}', 'FollowsController@store');

Route::post('favorite/{post}', 'PostsController@favoritePost')->middleware('auth');

Route::get('p/favorites', 'PostsController@myFavorites')->middleware('auth');
Route::get('/comments', 'PostsController@comments')->middleware('auth');

Route::get('/p/create', 'PostsController@create')->middleware('auth');
Route::post('/p', 'PostsController@store')->middleware('auth');
Route::get('/p/{post}/edit', 'PostsController@edit')->middleware('auth');
Route::patch('/p/{post}', 'PostsController@update')->middleware('auth');
Route::get('/p/{post}', 'PostsController@show');
Route::delete('/p/{post}', 'PostsController@delete');


Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
