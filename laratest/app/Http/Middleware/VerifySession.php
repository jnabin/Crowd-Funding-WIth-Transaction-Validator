<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class VerifySession
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

        if(Session::has('type') && Session::get('type') == 2){
           return $next($request);
        }else{
            Session::flash('msg', 'invalid request...');
            return back();
        } 
    }
}
