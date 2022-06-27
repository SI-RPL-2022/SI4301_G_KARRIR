<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if (session()->has('Verification')) {
            return redirect('/daftar/verifikasi')->with('pesan', 'Anda harus menyelesaikan proses verifikasi perusahaan anda');
        }
        
        return $next($request);
    }
}
