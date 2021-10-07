<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use App\Models\userRole;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $userRole = userRole::where('users_id',Auth::user()->id)->first() ?? null;
                if ($userRole != null) {
                    $role = Role::find($userRole->roles_id)->name;
                }
                switch ($role) {
                    case 'Admin':
                        return redirect(RouteServiceProvider::ADMIN);
                        break;
                    case 'Incubator':
                        return redirect(RouteServiceProvider::INCUBATOR);
                        break;
                    case 'Accelerator':
                        return redirect(RouteServiceProvider::ACCELERATOR);
                        break;
                    case 'Startup':
                        return redirect(RouteServiceProvider::STARTUP);
                        break;

                    case 'Developer':
                        return redirect(RouteServiceProvider::DEVELOPER);
                        break;

                    default:
                        Auth::logout();
                        redirect()->to('/login');
                        break;
                }
            }
        }

        return $next($request);
    }
}
