<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Instantiate a new RostsController instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('entrust');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::get();
        $tab = 'users';
        return view('admin.users.index', compact('users', 'tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('display_name', 'id');
        $columnSizes = ['sm' => [4, 8], 'lg' => [2, 10]];
        $tab = 'users';
        return view('admin.users.create', compact('roles', 'tab', 'columnSizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if($request->active){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'active' => 1
            ]);
        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'active' => 0
            ]);
        }

        $user->roles()->sync([$request->role]);

        return redirect(route('admin.users.index'))->with('success', 'The user has been created.');
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
        $user = User::findOrFail($id);
        $roles = Role::lists('display_name', 'id');
        $columnSizes = ['sm' => [4, 8], 'lg' => [2, 10]];
        $tab = 'users';
        return view('admin.users.edit', compact('user', 'roles', 'tab', 'columnSizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if($request->password){
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
            $user->update($request->only('name', 'email', 'role', 'active'));
        }else{
            $user->update($request->only('name', 'email', 'role', 'active'));
        }
        $user->roles()->sync([$request->role]);
        return redirect(route('admin.users.index'))->with('success' ,'The user has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); //Will also delete all relationship data
        return redirect(route('admin.users.index'))->with('success', 'The user has been deleted.');
    }
}
