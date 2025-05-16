<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Driver;

class EnsureUserIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // If not logged in
        if (!$user) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        if ($user->role === 'driver') {
            // Check if driver's `verified` field is true
            $driver = Driver::where('user_id', $user->id)->first();

            if (!$driver || !$driver->verified) {
                return redirect('/login')->with('error', 'Your driver profile is not verified yet.');
            }
        } else {
            // Check if general user is verified
            if (!$user->is_verified) {
                return redirect('/login')->with('error', 'Please verify your email before accessing this page.');
            }
        }

        return $next($request);
    }
}
