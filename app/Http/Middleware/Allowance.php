<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redirect;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Allowance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(true){

        return redirect('loginpage');
        
        }

        echo "<h1>hellow one</h1>";
        return $next($request);

    
    }
}
