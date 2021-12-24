<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = \Auth::user()->getRoleNames()->first();
        
                switch ($role) {
                    case 'ADMIN':
                        // return 'localhost:8000/admin/pengguna/';
                        return redirect()->route('admin.pengguna.index');
                    break;
                    
                    case 'CUSTOMER':
                        // return 'localhos:8000/';
                        return redirect()->route('dashboard');
                        break;
                }

                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
