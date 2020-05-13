<?php


namespace PiloteFramework\Administrators\Middlewares;


use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdministrator
{
    /**
     * @param $request
     * @param Closure $next
     * @param string $guard
     * @return RedirectResponse|mixed
     */
    public function handle($request, Closure $next, $guard = "administrator")
    {
        if(Auth::guard($guard)->check()) {
            return redirect()->route('administrators.home');
        }

        return $next($request);
    }
}
