<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        if(Auth::check() && Auth::user()->status){
            $active = Auth::user()->status == "1";
            Auth::logout();

            if($active == 1){
                $message = 'Akun anda akan segera dapat digunakan ketika mendapatkan email dari kami';
            }
            return redirect()->route('login')
                ->with('failed', 'Kami akan menghubungi')
                ->with('status', $message)
                ->withErrors(['email' => 'Akun anda akan segera dapat digunakan ketika mendapatkan email dari kami']);
        }

        return $next($request);
    }
}
