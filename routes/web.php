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

Route::get('/logout', function() {
    Auth::logout();
    return redirect()->back();
});

Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::get('/', [
    'as' => 'fp_index',
    'uses' => 'FrontendController@index'
]);

Route::get('/timeline', [
    'as' => 'fp_timeline',
    'uses' => 'FrontendController@timeline'
]);

Route::get('/gallery', [
    'as' => 'fp_gallery',
    'uses' => 'FrontendController@gallery'
]);

Route::get('/schools/czech-republic', [
    'as' => 'fp_czech-republic',
    'uses' => 'FrontendController@czech'
]);

Route::get('/schools/norway', [
    'as' => 'fp_norway',
    'uses' => 'FrontendController@norway'
]);

Route::get('/schools/spain', [
    'as' => 'fp_spain',
    'uses' => 'FrontendController@spain'
]);

Route::get('/schools/portugal', [
    'as' => 'fp_portugal',
    'uses' => 'FrontendController@portugal'
]);

Route::get('/schools/italy', [
    'as' => 'fp_italy',
    'uses' => 'FrontendController@italy'
]);


Route::group(['prefix' => 'blog'], function() {



    Route::get('/p/{category}/{id}', [
        'as' => 'blog.detail',
        'uses' => 'BlogController@postDetail'
    ]);


    Route::get('/c/{category}', [
        'as' => 'blog.category',
        'uses' => 'BlogController@blogCategory'
    ]);

    Route::get('/search/', [
        'as' => 'blog.search',
        'uses' => 'BlogController@search'
    ]);


    Route::get('/a/{category}', [
        'as' => 'blog.author',
        'uses' => 'BlogController@blogAuthor'
    ]);

    Route::post('/add/comment/{post}', [
        'as' => 'blog.comment',
        'uses' => 'BlogController@addComment'
    ]);

    Route::get('/add/reply/{comment}', [
        'as' => 'blog.reply',
        'uses' => 'BlogController@addReply'
    ]);

    Route::get('/', [
        'as' => 'blog.home',
        'uses' => 'BlogController@blogIndex'
    ]);

});



Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'isVerified']], function () {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index',

    ]);




    Route::group(['prefix' => 'posts'], function () {

        Route::get('/', [
            'as' => 'posts.list',
            'uses' => 'PostsController@index',
           
        ]);


        Route::get('/deleted/restore/{id}', [
            'as' => 'posts.restore',
            'uses' => 'PostsController@restore',
           
        ]);

        Route::get('/create', [
            'as' => 'posts.create',
            'uses' => 'PostsController@create',
           
        ]);

        Route::get('/edit/{id}', [
            'as' => 'posts.edit',
            'uses' => 'PostsController@edit',
           
        ]);

        Route::get('/comments/{id}', [
            'as' => 'posts.comments',
            'uses' => 'CommentsController@index',
           
        ]);

        Route::get('/comment/delete/{id}', [
            'as' => 'comment.destroy',
            'uses' => 'CommentsController@destroy',
           
        ]);

        Route::get('/comment/allow/{id}', [
            'as' => 'comment.allow',
            'uses' => 'CommentsController@allow',

        ]);


        Route::post('/store', [
            'as' => 'posts.store',
            'uses' => 'PostsController@store',
           

        ]);

        Route::post('/update/{id}', [
            'as' => 'posts.update',
            'uses' => 'PostsController@update',
           
        ]);


        Route::get('/destroy/{id}', [
            'as' => 'posts.destroy',
            'uses' => 'PostsController@destroy',
           
        ]);

        Route::get('/trash', [
            'as' => 'posts.trash',
            'uses' => 'PostsController@trash',
           

        ]);

    });




    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', [
            'as' => 'categories.list',
            'uses' => 'CategoriesController@index',
           
        ]);


        Route::get('/deleted/restore/{id}', [
            'as' => 'categories.restore',
            'uses' => 'CategoriesController@restore',
           

        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoriesController@create'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoriesController@edit'
        ]);


        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoriesController@store'
        ]);

        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoriesController@update'
        ]);


        Route::get('/destroy/{id}', [
            'as' => 'categories.destroy',
            'uses' => 'CategoriesController@destroy'
        ]);



    });


    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [
            'as' => 'users.list',
            'uses' => 'UsersController@index'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'UsersController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'UsersController@update'
        ]);

    });
    


});

