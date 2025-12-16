<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        if (! Auth::user()-> is_admin != 1) {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses sebagai Admin!');


        }
         return $next($request);

    }
}


