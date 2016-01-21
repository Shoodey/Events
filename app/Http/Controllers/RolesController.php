<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
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
        $roles = Role::get();
        $tab = 'roles';
        return view('admin.roles.index', compact('roles', 'tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        $columnSizes = ['sm' => [4, 8], 'lg' => [2, 10]];
        $tab = 'roles';
        return view('admin.roles.create', compact('permissions', 'tab', 'columnSizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RolesRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        $role = Role::create($request->only('name', 'display_name', 'description'));
        if(!empty($request->all()['permissions'])){
            $role->perms()->sync(array_keys($request->all()['permissions']));
        }
        return redirect(route('admin.roles.index'))->with('success' ,'The role has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $tab = 'role';
        return view('admin.roles.show', compact('role', 'tab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = Role::findOrFail($id);
        $role->load('perms');
        $permissions = Permission::get();
        $tab = 'roles';
        $columnSizes = ['sm' => [4, 8], 'lg' => [2, 10]];
        return view('admin.roles.edit', compact('role', 'permissions', 'tab', 'columnSizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RolesRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        if(!empty($request->all()['permissions'])){
            $role->perms()->sync(array_keys($request->all()['permissions']));
        }else{
            $role->perms()->sync([]);
        }
        $role->update($request->only('name', 'display_name', 'description'));
        return redirect(route('admin.roles.index'))->with('success' ,'The role has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete(); //Will also delete all relationship data
        return redirect(route('admin.roles.index'))->with('success', 'The role has been deleted.');
    }
}
