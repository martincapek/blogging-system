<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Jenssegers\Date\Date;
use Menu;


class AdminController extends Controller
{

    public function __construct(Request $request)
    {

        $this->middleware(function ($request, $next) {


            Menu::make('MainNavBar', function ($menu) {

                $user = Auth::user();
                if ($user->can('*-post')) {
                    $menu->add('Posts', ['icon' => 'fa-pencil', 'route' => 'posts.list', 'nickname' => 'posts'])->active('/admin/posts/*');
                    if ($user->can('list-post')) {
                        $menu->posts->add('List', ['icon' => 'fa-list', 'route' => 'posts.list']);
                    }
                    if ($user->can('create-post')) {
                        $menu->posts->add('Create', ['icon' => 'fa-plus', 'route' => 'posts.create']);
                    }
                    if ($user->can('restore-post')) {
                        $menu->posts->add('Deleted', ['icon' => 'fa-trash', 'route' => 'posts.trash']);
                    }
                }

                if ($user->can('*-category')) {
                    $menu->add('Category List', ['icon' => 'fa-user', 'route' => 'categories.list', 'nickname' => 'category_list']);

                    if ($user->can('list-category')) {
                        $menu->category_list->add('List', ['icon' => 'fa-list', 'route' => 'categories.list']);

                    }
                    if ($user->can('create-category')) {
                        $menu->category_list->add('Create', ['icon' => 'fa-plus', 'route' => 'categories.create']);

                    }

                }



                $menu->add('User List', ['icon' => 'fa-user', 'route' => 'users.list']);
            });


            return $next($request);
        });


        Date::setLocale('en');


    }
}
