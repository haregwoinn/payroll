<?php

namespace App\Http\Middleware;
use App\Models\Salary;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Userchack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::guard('web')->check()){
            return $next($request);
        } else{
            return redirect('userloginpage');
        }      
            
            
        
        
        
    }
}
