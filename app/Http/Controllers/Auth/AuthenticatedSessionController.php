<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Role;
use App\Models\userRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $output = ['errors' => "Invalid credentials !!"];
        // return redirect()->intended(RouteServiceProvider::HOME);

       if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
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
                // redirect()->to('/login');
                break;
        }
       }
       Alert::error('message',"Invalid credentials");
       return redirect()->back();
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
