<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends AdminController
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $page_info = [
            'page_name' => 'Comments'
        ];

        $comments = Post::findOrFail($id)->comments;

        return view('posts.comments', compact('page_info', 'comments'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function allow($id)
    {

        if (Comment::findOrFail($id)->allow()) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Comment was successfuly allowed!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Comment was not successfuly allowed! Please try it again or contact admin.']);
        }


        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        if (Comment::findOrFail($id)->delete()) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Comment was successfuly deleted!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Comment was not successfuly deleted! Please try it again or contact admin.']);
        }


        return redirect()->back();
    }
}
