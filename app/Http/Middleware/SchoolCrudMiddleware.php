<?php

namespace App\Http\Middleware;

use Closure, Auth;

class SchoolCrudMiddleware
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
      if (!Auth::user()->is_admin) {
        if ($request->ajax() || $request->wantsJson()) {
          return response('Unauthorized.', 401);
        } else {
          return back()->withErrors('Tämä toiminto on estetty!');
        }
      }
      return $next($request);
    }
}
