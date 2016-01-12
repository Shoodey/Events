<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tab = 'dashboard';

        $usersCount = User::all()->count();

        return view('admin.dashboard', compact('tab', 'usersCount'));
    }
}
