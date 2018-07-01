<?php

namespace App\Http\Controllers\Admin\System;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;

class UsersController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('ingroup:1', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.system.system_users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('admin.system.system_users_create')->with('groups', $groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'group' => 'required|numeric',
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'gender' => 'required|min:4|max:6', //male of female
            'password' => 'required|min:6',
            'password2' => 'required|min:6|same:password'
        ];
        $this->validate($request, $rules);
        
        $user = new User;
        $user->email = $request->email;
        $user->group_id = $request->group;
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect('admin/system-users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        $groups = Group::all();
        
        $data_array = [
            'user' => $user,
            'groups' => $groups
        ];
        
        return view('admin.system.system_users_edit', $data_array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $rules = [
            'group' => 'required|numeric',
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'gender' => 'required|min:4|max:6', //male of female
        ];
        $this->validate($request, $rules);
        
        $user = User::findOrFail($id);
        $user->email = $request->email;
        $user->group_id = $request->group;
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->active = ($request->active == 'on');
        
        if($request->password !== '') {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        
        return redirect('admin/system-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
