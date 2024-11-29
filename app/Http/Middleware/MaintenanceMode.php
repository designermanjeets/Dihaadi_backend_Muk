<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MaintenanceMode
{
    public function handle($request, Closure $next)
    {
        // Check if the application is in maintenance mode
        if (app()->isDownForMaintenance()) {
            // Check if the user is an admin
            if (Auth::check() && Auth::user()->isAdmin()) {
                // Allow admin to access the application
                return $next($request);
            }

            // Redirect others to the maintenance page or return a response
            return response()->view('errors.maintenance');
        }

        return $next($request);
    }
}