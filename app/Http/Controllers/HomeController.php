<?php

namespace App\Http\Controllers;


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

        return view('home', compact('page_info'));
    }
}
