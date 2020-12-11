<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        if( in_array(Auth::user()->role, $roles) ) {

            return $next($request);
                
        }elseif( Auth::user()->role == 'admin' ) {

            Alert::success('Success', 'Login Berhasil');
            return redirect()->route('dashboard');

        }
    }
}
