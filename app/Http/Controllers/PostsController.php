<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Jenssegers\Date\Date;

class PostsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = false)
    {
        $page_info = [
            'page_name' => trans('pages.posts_list')
        ];

        if ($status == 'deleted') {
            $posts = Post::onlyTrashed()->get();


        } else {
            $posts = Post::all();

        }


        return view('posts.index', compact('posts', 'page_info', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_info = [
            'page_name' => trans('pages.posts_create')
        ];

        return view('posts.create', compact('page_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'perex' => 'required',
            'text' => 'required',
            'image' => 'required'

        ]);


        $post = Post::create([
            'title' => $request->title,
            'perex' => $request->perex,
            'content' => $request->text,
            'image' => $request->image,
            'author' => \Auth::user()->id,
            'publish' => $request->publish
        ]);

        /*
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_tags' => $request->seo_tags,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_image' => $request->og_image,

         */

        $request->session()->flash('success', true);
        return redirect()->route('posts.list');





    }


    public function restore($id) {
        if (Post::withTrashed()->findOrFail($id)->restore()) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!','message' => 'Post was successfuly restored!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Post was not successfuly restored! Please try it again or contact admin.']);
        }



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Post::findOrFail($id)->delete()) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!','message' => 'Post was successfuly deleted! You can restore it in deleted post.']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Post was not successfuly deleted! Please try it again or contact admin.']);
        }



        return redirect()->route('posts.list');

    }
}
