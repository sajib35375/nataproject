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

            if ($guard=='admin'){
                if (Auth::guard($guard)->check()) {
                    return redirect(RouteServiceProvider::DASH);
                }
            }

            if ($guard=='web'){
                if (Auth::guard($guard)->check()) {
                    return redirect(RouteServiceProvider::PROFILE);
                }
            }


        }

//        if ($request->is('admin/*')){
//            if (Auth::guard('admin')->check()){
//                return RouteServiceProvider::DASH;
//            }
//        }elseif (Auth::guard('web')->check()){
//            return RouteServiceProvider::PROFILE;
//        }

        if (Auth::guard($guard)->check()) {
            return redirect('/user/profile');
        }

        return $next($request);
    }
}
