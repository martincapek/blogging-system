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

            $user = Auth::user();
            if($user->isNot('admin', 'moderator')) {
                abort(403);
            }



            Menu::make('MainNavBar', function ($menu) use($user) {





                    $menu->add('Posts', ['icon' => 'fa-pencil', 'route' => 'posts.list', 'nickname' => 'posts'])->active('/admin/posts/*');
                        $menu->posts->add('List', ['icon' => 'fa-list', 'route' => 'posts.list']);
                        $menu->posts->add('Create', ['icon' => 'fa-plus', 'route' => 'posts.create']);
                        $menu->posts->add('Deleted', ['icon' => 'fa-trash', 'route' => 'posts.trash']);
                if($user->isNot('moderator')) {

                    $menu->add('Category List', ['icon' => 'fa-user', 'route' => 'categories.list', 'nickname' => 'category_list']);

                        $menu->category_list->add('List', ['icon' => 'fa-list', 'route' => 'categories.list']);

                        $menu->category_list->add('Create', ['icon' => 'fa-plus', 'route' => 'categories.create']);






                $menu->add('User List', ['icon' => 'fa-user', 'route' => 'users.list']);
                }
            });


            return $next($request);
        });


        Date::setLocale('en');


    }
}
