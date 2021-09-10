<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
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
        if(Auth::check()) 
        {
            $user = Auth::user();
            if ($user->idGroup == 1){
                return $next($request);
            }
            else{
                return redirect('admin/login');
            }

        } else {
            return redirect('admin/login');

        }
    }
}
