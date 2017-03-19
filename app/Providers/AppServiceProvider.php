<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('posts.view', 'App\Events\ViewPostsHandler');


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       //
    }
}
