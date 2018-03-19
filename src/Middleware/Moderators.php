<?php

namespace Adam\Superauth\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Moderators
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
        if (!Auth::check()) {
            return redirect()->route('admin.login')
                ->with('danger', trans('Superauth::auth.youNeedToLoginToAccessThisPage'));
        }
        if (!Auth::user()->isModerator()){
            Auth::logout();
            return redirect()->route('admin.login')
                ->with('danger', trans('Superauth::auth.youHaveNoAccessPermissionToThisPage'));
        }
        return $next($request);
    }
}
