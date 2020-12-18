<?php

namespace App\Http\Middleware;

use Closure;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Facades\App\Contracts\Repositories\CartRepositoryInterface;

class HandleInertiaRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Inertia::share('data', function() {
                return[
                    'auth_check' => Auth::check(),
                    'cart' =>  CartRepositoryInterface::get_shopping_cart(Auth::id()),
                ];
            });
        return $next($request);
    }
}
