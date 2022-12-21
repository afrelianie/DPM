<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;

class Cek_login
{
    
    // public function handle(Request $request, Closure $next, $role)
    // {
    //     if (!Auth::check()) {
    //         return redirect('login');
    //     }

    //     $user = Auth::user();

    //     if ($user->name == $role) {
    //         return $next ($request);
    //     }

    //     return redirect('login')->with('error', "kamu tidak punya Akses...");
    // }


    public function handle(Request $request, Closure $next,...$role)
    {
        if(in_array($request->user()->name,$role)){
            return $next($request);
        }
        return redirect('/');
    }
}
