<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends AdminController
{
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

        $categories = Category::withDepth()->get()->toTree();

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

        $categories = Category::withDepth()->get()->toTree();



        return view('categories.create', compact('page_info', 'categories'));
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

        $request->session()->flash('success', true);
        return redirect()->route('categories.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

        $request->session()->flash('success', true);
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
        //
    }
}
