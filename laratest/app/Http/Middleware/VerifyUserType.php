<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class VerifyUserType
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

    	if(Session::get('type') == 2){
    		return $next($request);
    	}else{
    		return redirect('/home');
    	}
        
    }
}
