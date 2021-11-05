<?php

namespace App\Http\Middleware;

use Closure;
use App\UserRole;

class isAdmin
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
        if(\Auth::check() && \Auth::user()->userRole[0]->role_id == 1){
            return $next($request);
        }
        return redirect('login');
        
    }
}
