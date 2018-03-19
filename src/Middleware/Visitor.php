<?php

namespace Adam\Superauth\Middleware;
use Illuminate\Support\Facades\Auth;
use Adam\Superauth\Traits\AuthRedirect;
use Closure;

class Visitor
{


    use AuthRedirect;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect($this->loginRedirect());
        }

        return $next($request);
    }
}

