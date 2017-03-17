<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Menu;

class FrontendController extends Controller
{
    
    public function __construct()
    {
        Menu::make('main_nav', function($menu){

            $menu->add('Home');
            $menu->add('Schools', ['url' => 'schools', 'class'=> 'dropdown-toggle']);
            $menu->get('schools')->add('Czech Republic', ['url' => 'schools/czech-republic', 'class' => '']);
            $menu->schools->add('Italy', 'schools/italy');
            $menu->schools->add('Norway', 'schools/norway');
            $menu->schools->add('Portugal', 'schools/portugal');
            $menu->schools->add('Spain', 'schools/spain');
            $menu->add('Timeline', 'timeline');
            $menu->add('Gallery',  'gallery');
            $menu->add('Blog',  'blog');

        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function timeline()
    {
        return view('frontend.timeline');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gallery()
    {
        return view('frontend.gallery');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function schools($school_name = null)
    {
        return view('frontend.index');
    }

    public function czech()
    {
        return view('frontend.czech');
    }

    public function norway()
    {
        return view('frontend.norway');
    }

    public function portugal()
    {
        return view('frontend.portugal');
    }

    public function italy()
    {
        return view('frontend.italy');
    }

    public function spain()
    {
        return view('frontend.spain');
    }


}
