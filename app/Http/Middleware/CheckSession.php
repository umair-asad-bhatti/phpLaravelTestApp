<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CheckSession
{

    public function handle(Request $request, Closure $next)
    {
        if(!session('user'))
        {
            return redirect("/login");
        }   
        return $next($request);
    }
}
