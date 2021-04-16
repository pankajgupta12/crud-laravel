<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Session;

class loginauth
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
        //echo 'hello pankaj';
        $sessionval =   $request->session()->get('name');
        $sessioid =   $request->session()->get('id');

           
        if(!isset($sessionval) && ($sessionval == '' && $sessioid == '')) {
           // return redirect('/userlogin');  
           return redirect()->route('userlogin');
        }else{
           // return redirect()->route('dashboard');
           //return redirect('dashboard');  
        }

        return $next($request);
        
    }
}
