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
            return [
                'admin_user' => Auth::guard('admin')->user(),
                'auth_check' => Auth::guard('web')->check(),
                'cart' =>  CartRepositoryInterface::get_cart(Auth::guard('web')->id(), 'cart'),
            ];
        });

        return $next($request);
    }
}
