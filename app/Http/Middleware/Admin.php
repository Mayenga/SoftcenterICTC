<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\userRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check()) {
            $userRole = userRole::where('users_id', Auth::user()->id)->first() ?? null;
            if ($userRole != null) {
                $role = Role::find($userRole->roles_id)->name;
            }
            if ($role == "Admin") {
                return $next($request);
            }
        }
        abort(403);
    }
}
