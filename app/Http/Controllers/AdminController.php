<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;
use View;
use Menu;

class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        Date::setLocale('en');

        // Make menu
        Menu::make('MainNavBar', function($menu){



            $menu->add('Posts', ['icon' => 'fa-pencil', 'route' => 'posts.list', 'nickname' => 'posts']);
            $menu->posts->add('List', ['icon' => 'fa-list', 'route' => 'posts.list']);
            $menu->posts->add('Create', ['icon' => 'fa-plus', 'route' => 'posts.create']);
            $menu->posts->add('Deleted', ['icon' => 'fa-trash', 'route' => 'posts.trash']);


            $menu->add('Category List', ['icon' => 'fa-user', 'route' => 'categories.list', 'nickname' => 'category_list']);
            $menu->category_list->add('List', ['icon' => 'fa-list', 'route' => 'categories.list']);
            $menu->category_list->add('Create', ['icon' => 'fa-plus', 'route' => 'categories.create']);




            $menu->add('User List', ['icon' => 'fa-user', 'route' => 'users.list']);
        });



    }
}
