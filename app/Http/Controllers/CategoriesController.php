<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends AdminController
{
    /**
     * CategoriesController constructor.
     * @param Request $request
     */

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->middleware(function ($request, $next) {

            if ($request->user()->isNot('admin')) {
                abort(403);
            }


            return $next($request);
        });

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $page_info = [
            'page_name' => 'Categories List'
        ];

        $categories = Category::all();

        return view('categories.index', compact('page_info', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_info = [
            'page_name' => 'Create new Category'
        ];


        return view('categories.create', compact('page_info'));
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
            'name' => 'required|unique:categories|max:255',
        ]);

        $cat_attr = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image
        ];

        if ($request->parent_id) {
            $parent = Category::findOrFail($request->parent_id);

            $category = Category::create($cat_attr, $parent);
        } else {
            $category = Category::create($cat_attr);
        }

        if ($category) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Category was successfuly created!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Category was not successfuly created! Please try it again or contact admin.']);
        }
        return redirect()->route('categories.list');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::findOrFail($id);

        $page_info = [
            'page_name' => 'Edit Category - ' . $category->name
        ];

        $parent_category = $category->parent_id;

        $categories = Category::withDepth()->get()->toTree();



        return view('categories.edit', compact('page_info', 'categories', 'category', 'parent_category'));
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
        $category = Category::findOrFail($id);


        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image;



        if($request->parent_id) {
            $parent = Category::findOrFail($request->parent_id);

            $category->appendToNode($parent)->save();
        } else {
            $category->saveAsRoot();
        }

        if ($category) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Category was successfuly edited!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Category was not successfuly edited! Please try it again or contact admin.']);
        }
        return redirect()->route('categories.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);


        if ($category->posts->count()) {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Category has posts. You have to unassing all posts before deleting.']);
        } else {
            if (Category::findOrFail($id)->delete()) {
                session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'Category was successfuly deleted!']);
            } else {
                session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'Category was not successfuly deleted! Please try it again or contact admin.']);
            }
        }


        return redirect()->route('categories.list');
    }
}
