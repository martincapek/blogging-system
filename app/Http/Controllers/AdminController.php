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

            $menu->add('Posts List', ['icon' => 'fa-pencil', 'route' => 'posts.list']);
            $menu->add('Category List', ['icon' => 'fa-user', 'route' => 'categories.list']);

            $menu->add('User List', ['icon' => 'fa-user', 'route' => 'users.list']);
        });



    }
}
