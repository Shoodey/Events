<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tab = 'dashboard';

        $users = User::get();
        $usersCount = $users->count();
        $activeUsers = $users->where('active', 1)->count();
        $inactiveUsers = $usersCount - $activeUsers;


        $roles = Role::get();
        $rolesCount = $roles->count();
        $usersWithRole = DB::table('role_user')->count();


        $permissionsCount = Permission::get()->count();

        return view('admin.dashboard', compact(
            'tab', 'usersCount', 'activeUsers', 'inactiveUsers',
            'rolesCount', 'usersWithRole',
            'permissionsCount'
        ));
    }
}
