<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::get('/', function () {
    return "Nothing here.";
});



Route::group(['prefix' => 'admin', 'middlewear' => ['web', 'auth', 'isVerified']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/users', [
        'as' => 'users.list',
        'uses' => 'UsersController@index'
    ]);

    Route::get('/posts', [
        'as' => 'posts.list',
        'uses' => 'PostsController@index'
    ]);


    Route::get('/categories', [
        'as' => 'categories.list',
        'uses' => 'CategoriesController@index'
    ]);
});
