<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('alpha_space', function($attribute, $value, $parameters) {
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        app('view')->composer(['layouts.admin', 'layouts.auth', 'auth.lock'], function($view)
        {
            $action = app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', str_replace('Controller', '', $controller));

            if($controller === 'Auth') $controller = 'Authentication';

            $view->with(compact('controller', 'action'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
