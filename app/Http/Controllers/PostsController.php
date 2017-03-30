<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Comment;
use App\Http\Requests;
use Jenssegers\Date\Date;

class PostsController extends AdminController
{

    /**
     * Display all posts.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {


        $user = $request->user();

        if ($request->user()->isNot('admin', 'moderator')) {
            abort(403);
        }


        $page_info = [
            'page_name' => trans('pages.posts_list')
        ];


        if ($user->isAn('admin')) {
            $posts = Post::orderBy('created_at', 'DECS')->get();
        } else {
            $posts = Post::where('author_id', $user->id)->orderBy('created_at', 'DECS')->get();
        }


        return view('posts.index', compact('posts', 'page_info', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->isNot('admin', 'moderator')) {
            abort(403);
        }

        $page_info = [
            'page_name' => trans('pages.posts_create')
        ];

        $categories = Category::all();

        return view('posts.create', compact('page_info', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->user()->isNot('admin', 'moderator')) {
            abort(403);
        }

        $this->validate($request, [
            'title' => 'required|max:255|' . Rule::unique('posts')->where(function ($query) use ($request) {
                    $query->where('category_id', $request->id);

                }),
            'perex' => 'required',
            'text' => 'required',
        ]);


        $post = [
            'title' => $request->title,
            'perex' => $request->perex,
            'text' => $request->text,
            'image' => $request->image,
            'author_id' => \Auth::user()->id,
            'publish' => $request->publish,
            'category_id' => $request->category_id,

        ];


        if (Post::create($post)) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Post was successfuly created!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Post was not successfuly created! Please try it again or contact admin.']);
        }

        return redirect()->route('posts.list');

    }

    /**
     * Show deleted posts.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash(Request $request)
    {

        if ($request->user()->isNot('admin', 'moderator')) {
            abort(403);
        }

        $page_info = [
            'page_name' => trans('pages.posts_deleted'),
            'page_destc' => "dad"
        ];

        if ($request->user()->isAn('admin')) {
            $posts = Post::onlyTrashed()->orderBy('created_at', 'DECS')->get();
        } else {
            $posts = Post::onlyTrashed()->where('author_id', $request->user()->id)->orderBy('created_at', 'DECS')->get();
        }

        $status = "deleted";


        return view('posts.index', compact('page_info', 'posts', 'status'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request, $id)
    {
        if ($request->user()->isNot('admin', 'moderator')) {
            abort(403);
        }

        $post = Post::withTrashed()->findOrFail($id);

        if($post->author_id != $request->user()->id) {
            abort(403);
        }



        if ($post->restore()) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Post was successfuly restored!']);
        } else {
            session()->flash('  status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Post was not successfuly restored! Please try it again or contact admin.']);
        }


        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        if ($request->user()->isNot('admin', 'moderator')) {
            abort(403);
        }

        $page_info = [
            'page_name' => trans('pages.posts_edit')
        ];

        $post = Post::findOrFail($id);

        if($post->author_id != $request->user()->id) {
            abort(403);
        }

        $categories = Category::all();

        return view('posts.edit', compact('page_info', 'post', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->user()->isNot('admin', 'moderator')) {
            abort(403);
        }


        $this->validate($request, [
            'title' => 'required|max:255|unique:posts,title,' . $id,
            'perex' => 'required',
            'text' => 'required',
        ]);


        $post = Post::findOrFail($id);

        if($post->author_id != $request->user()->id) {
            abort(403);
        }


        $post->title = $request->title;
        $post->perex = $request->perex;
        $post->text = $request->text;
        $post->image = $request->image;
        $post->category_id = $request->category_id;


        if ($post->save()) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Post was successfuly updated!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Post was not successfuly updated! Please try it again or contact admin.']);
        }

        return redirect()->route('posts.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        if ($request->user()->isNot('admin', 'moderator')) {
            abort(403);
        }
        $post = Post::findOrFail($id);

        if($post->author_id != $request->user()->id) {
            abort(403);
        }

        if ($post->delete()) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Post was successfuly deleted!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Post was not successfuly deleted! Please try it again or contact admin.']);
        }


        return redirect()->route('posts.list');

    }
}
