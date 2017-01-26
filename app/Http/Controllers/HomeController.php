<?php

namespace App\Http\Controllers;


use App\Post;

class HomeController extends AdminController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_info = [
            'page_name' => 'User List'
        ];

        $post_count = Post::all()->count();

        return view('home', compact('page_info', 'post_count'));
    }
}
