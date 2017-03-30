<?php

namespace App\Http\Controllers;


use App\Comment;
use App\Post;
use App\User;

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
            'page_name' => 'Dashboard'
        ];

        $post_count = Post::all()->count();
        $comments_count = Comment::all()->count();
        $users_count = User::all()->count();
        $views_all = Post::select('views')->sum('views');

        return view('home', compact('page_info', 'post_count', 'comments_count', 'users_count', 'views_all'));
    }
}
