<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('admin.login');
            }
            if ($request->is('super-admin/*')) {
                return route('super_admin.login');
            }
            if ($request->is('employee/*')) {
                return route('employee.login');
            }
            if ($request->is('doctor/*')) {
                return route('doctor.login');
            }
        }
    }
}