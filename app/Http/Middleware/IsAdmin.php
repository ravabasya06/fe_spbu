<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
         if (!Auth::user()->isAdmin) {
            return redirect('/')->with('message', 'You dont have access to this page...');;
        }
        return $next($request);
    }
    
}
