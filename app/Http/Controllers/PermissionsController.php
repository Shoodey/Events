<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionsRequest;
use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
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
        $permissions = Permission::get();
        $tab = 'permissions';
        return view('admin.permissions.index', compact('permissions', 'tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tab = 'permissions';
        $columnSizes = ['sm' => [4, 8], 'lg' => [2, 10]];
        $models = [
            'users' => 'Users',
            'roles' => 'Roles',
            'permissions' => 'Permissions',
        ];

        return view('admin.permissions.create', compact('tab', 'models', 'columnSizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionsRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionsRequest $request)
    {
        Permission::create($request->only('name', 'display_name', 'description', 'model'));
        return redirect(route('admin.permissions.index'))->with('success', 'The permission has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        $tab = 'permissions';

        return view('admin.permissions.show', compact('permission', 'tab'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $tab = 'permissions';
        $columnSizes = ['sm' => [4, 8], 'lg' => [2, 10]];
        $models = [
            'users' => 'Users',
            'roles' => 'Roles',
            'permissions' => 'Permissions',
        ];

        return view('admin.permissions.edit', compact('permission', 'tab', 'models', 'columnSizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionsRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionsRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->only('name', 'display_name', 'description', 'model'));
        return redirect(route('admin.permissions.index'))->with('success' ,'The permission has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect(route('admin.permissions.index'))->with('success', 'The permission has been deleted.');
    }
}
