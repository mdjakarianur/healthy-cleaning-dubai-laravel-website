<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        {
            if (!Auth::guard('customer')->check()) {
                return redirect(route('customer.login'));
            }
            if (Auth::guard('customer')->user()->status == '0') {
                // Auth::guard('customer')->logout();
                // Toastr::warning('You are inactive user by Admin', 'Warning');
                return redirect(route('pending.customer'));
            }
            return $next($request);
        }
    }
}
