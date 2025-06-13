<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware extends Authenticate
{

    public function __invoke(Middleware $middleware)
    {
        // $middleware->redirectGuestsTo(fn(Request $request) => route('login'));
        $middleware->redirectUsersTo(fn(Request $request) => route('user.settings'));
    }

    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
}
