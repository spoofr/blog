<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->admin) { // If $admin = 0, display this
            Session::flash('warning', 'You do not have permission to perform this action!');
            return redirect()->back();
        }
        return $next($request);
    }
}

// After defining a middleware, register them to kernel.php, and then assign the middleware to the controller in __construct() method.