<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Salary;
use Illuminate\Support\Facades\Auth;


class SallaryDetector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('web')->check()){

            $user = Auth::guard('web')->id();
            $salary = Salary::where('user_id',$user)->first();

            if(!$salary){
                return redirect('salarypage');
            }
            return $next($request);
        }else{
            return redirect('userloginpage');
        }

        
        
        
        
    }
}
