<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Event;
use Illuminate\Support\Facades\Cache;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Auth;
use App\User;
use View;

class BlogController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
        $devided_by = (int)floor(Category::all()->count() / 2);
        $devided_by = ($devided_by == 0) ? 1 : $devided_by;

        $lastSawPosts = [];
        if (Cache::get('lastSawPosts')) {
            foreach (Cache::get('lastSawPosts') as $item) {
                $lastSawPosts[] = Post::find($item);
            }

        }



        View::share('devided_by', $devided_by);
        View::share('categories', Category::all());
        View::share('lastSawPosts', $lastSawPosts);
    }


    public function blogIndex()
    {

        $posts = Post::orderBy('created_at', 'DECS')->has('category')->paginate(6);


        return view('blog.index', compact('posts'));
    }

    public function blogCategory($category)
    {


        $cur_cat = Category::where('slug', $category)->firstOrFail();


        $posts = Post::where('category_id', $cur_cat->id)->has('category')->paginate(6);

        return view('blog.index', compact('posts', 'cur_cat'));
    }


    public function postDetail($category, $id)
    {

        $cur_cat = Category::where('slug', $category)->firstOrFail();


        $post = Post::where('slug', $id)->where('category_id', $cur_cat->id)->firstOrFail();


        Event::fire('posts.view', $post);

        $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'DESC')->allowed()->get();

        return view('blog.detail', compact('post', 'cur_cat', 'devided_by', 'comments'));
    }

    public function addComment(Request $request, $post)
    {

        $validator = Validator::make($request->all(),
            [
                'comment' => 'required'
            ]);


        if ($validator->fails()) {
            return Redirect::to(URL::previous() . "#comment-form")->withErrors($validator)
                ->withInput();
        } else {


            Comment::create([
                'content' => $request->comment,
                'author_id' => Auth::user()->id,
                'post_id' => $post
            ]);

            return Redirect::to(URL::previous() . "#comment-form")->with('status', 'Comment addded, you have to wait to allow from admin.');

        }
    }


    public function blogAuthor($id)
    {

        $cur_auth = User::findOrFail($id);

        $posts = Post::where('author_id', $id)->orderBy('created_at', 'DESC')->has('category')->paginate(6);


        return view('blog.index', compact('posts', 'cur_auth'));
    }


    public function search(Request $request)
    {

        $cur_search = $request->search;

        $posts = Post::search($request->search, null, true)->has('category')->paginate(6);


        return view('blog.index', compact('posts', 'cur_search'));
    }
}
