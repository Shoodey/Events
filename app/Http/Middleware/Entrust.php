<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Entrust
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {
        $actionName = explode('\\', $request->route()->getActionName());
        $action = end($actionName);
        $fragments = explode('@', $action);

        $controller = $fragments['0'];
        $controller = strtolower(str_replace('Controller', '', $controller));

        $method = $fragments['1'];

        $requiredPermission = $method . '-' . $controller;

        if(!Auth::user()->can($requiredPermission)){
            return redirect('/')->with('error', "You do not have permission to access this.");
        }

        return $next($request);
    }
}
