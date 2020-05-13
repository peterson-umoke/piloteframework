<?php


namespace PiloteFramework\Administrators\Middlewares;


use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdministrator
{
    /**
     * @param $request
     * @param Closure $next
     * @param string $guard
     * @return RedirectResponse|mixed
     */
    public function handle($request, Closure $next, $guard = "administrator")
    {
        if(!Auth::guard($guard)->check()) {
            return redirect()->route('administrator.login');
        }

        return $next($request);
    }

}
