<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use Bouncer;

class UsersController extends AdminController
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
    public function index(Request $request)
    {

        if($request->user()->isNot('admin')) {
           return redirect(route('user.edit', $request->user()->id));
        }

        $page_info = [
            'page_name' => 'User List'
        ];

        $users = User::all();

        return view('users.index', compact('page_info', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $page_info = [
            'page_name' => 'User List'
        ];

        $user = User::findOrFail($id);

        if($request->user()->isNot('admin') && $request->user()->id != $id) {
            abort(403);
        }

        $roles = \DB::table('roles')->get();
        $role = \DB::table('assigned_roles')->where('entity_id', $id)->first()->role_id;



        return view('users.edit', compact('page_info', 'user', 'roles', 'role'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        \DB::table('assigned_roles')->where('entity_id', $user->id)->delete();
        $role = \DB::table('roles')->where('id', $request->role)->first()->name;

        $user->assign($role);
        Bouncer::refreshFor($user);


        if ($user->save()) {
            session()->flash('status', ['type' => 'success', 'caption' => 'Cool!', 'message' => 'User was successfuly updated!']);
        } else {
            session()->flash('status', ['type' => 'danger', 'caption' => 'Opps..', 'message' => 'User was not successfuly updated! Please try it again or contact admin.']);
        }



        return redirect()->route('users.list');

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
