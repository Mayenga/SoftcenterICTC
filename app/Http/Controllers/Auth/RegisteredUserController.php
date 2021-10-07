<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Role;
use App\Models\User;
use App\Models\userRole;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $role = Role::where('name','!=', 'Admin')->get();
        return view('auth.register')->with('roles', $role);
    }

    protected function sendVerificationCode(Request $request){
        $rules = array(
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255'
        );

        $error = Validator::make($request->all(), $rules);
        $code = Crypt::encrypt(rand(100000, 999999));
        if ($error->fails()) {
            $output = response()->json(['errors' => $error->errors()->all()]);
        } else {


                try {
                    MailController::sendEmailVerificationCode($request->name, $request->email, $code);
                    $output =  response()->json([
                        'success' => "verification code sent successfully !!",
                        'code' => $code,
                        ]);
                } catch (Exception $error) {
                    $output =  response()->json(['errors' => $error->getMessage() ]);
                }
        }
        return  $output;
    }

    public function email_verification(Request $request)
    {
        if ($request->has('user_path')) {
            $id = Crypt::decrypt($request->user_path);
            $user = User::find($id) ?? null;
            if ($user != null) {
                return view('auth.email_verification')
                    ->with('user_path', $request->user_path)
                    ->with('email', $user->email);
            }
        }
        return redirect()->back();
    }
    public function resend_code(Request $request)
    {
        $output = response()->json(['errors' => "Sorry something went wrong !!"]);
        $id = Crypt::decrypt($request->user_path);
        $rules = array(
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        );

        $error = Validator::make($request->all(), $rules);
        $code = Crypt::encrypt(rand(100000, 999999));
        if ($error->fails()) {
            $output = response()->json(['errors' => $error->errors()->all()]);
        } else {
            $user = User::find($id) ?? null;
            if ($user != null) {
                $user->email = $request->email;
                $user->verification_code = $code;
                $user->save();
                MailController::sendEmailVerificationCode($user->name, $user->email, $code);
                $output =  response()->json(['success' => "verification code sent successfully !!"]);
            }
        }

        return  $output;
    }
    public function verify_email(Request $request)
    {
        $output = ['errors' => "Unauthorized role !!"];
        $id = Crypt::decrypt($request->user_path);
        $user = User::find($id) ?? null;
        if ($user != null) {
            if (Crypt::decrypt($user->verification_code) == $request->verification_code) {
                $user->isEmailVerified = true;
                $user->save();
                $userRole = userRole::where('users_id', $id)->first();
                $role = Role::find($userRole->roles_id)->name ?? null;
                switch ($role) {
                    case 'Admin':
                        // $output = array('success' => RouteServiceProvider::ADMIN);

                        return redirect(RouteServiceProvider::ADMIN);
                        break;
                    case 'Incubator':
                        // $output = array('success' => RouteServiceProvider::INCUBATOR);
                        return redirect(RouteServiceProvider::INCUBATOR);
                        break;
                    case 'Accelerator':
                        // $output = array('success' => RouteServiceProvider::ACCELERATOR);
                        return redirect(RouteServiceProvider::ACCELERATOR);
                        break;
                    case 'Startup':
                        // $output = array('success' => RouteServiceProvider::STARTUP,  );
                        return redirect(RouteServiceProvider::STARTUP);
                        break;

                    default:
                        Auth::logout();
                        Alert::error('message', 'Unauthorized role !!');
                        return redirect()->back();
                        break;
                }
            }else {
                Alert::error('message', 'invalid verification code !!');
                return redirect()->back();
            }
        }
        Alert::error('message', 'Something went wrong !!');
        return redirect()->back();
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'terms' => 'required|string|max:255',
        //     'role' => 'required|numeric',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Rules\Password::min(8)],
        // ]);
        $output = ['errors' => "Unauthorized role !!"];
        $rules = array(
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'terms' => 'required|string|max:255',
            'role' => 'required|numeric',
            'verification_code' => 'required|numeric',
            'your_email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),],
        );

        try {
            $code = Crypt::decrypt($request->code);
        } catch (Exception $err) {
            return response()->json(['errors' => 'Invalid code, '.$err->getMessage()]);
        }

        $error = Validator::make($request->all(), $rules);
        if ($request->verification_code == $code) {
            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            } else {
                $user = User::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->your_email,
                    'verification_code' => sha1(rand(0,100000)),
                    'password' => Hash::make($request->password),
                ]);

                $userRole = userRole::create([
                    'users_id' => $user->id,
                    'roles_id' => $request->role,
                ]);

                $role = Role::find($userRole->roles_id)->name ?? null;
                if ($role != null) {
                    event(new Registered($user));
                    // Auth::login($user);
                    $code = Crypt::encrypt(rand(100000, 999999));
                    $user->verification_code = $code;
                    $user->save();
                    // MailController::sendEmailVerificationCode($user->name, $user->email, $code);
                    // $output = array(
                    //     'success' => RouteServiceProvider::EMAIL_VERIFICATION . '?user_path=' . Crypt::encrypt($user->id),
                    // );
                    $role = Role::find($userRole->roles_id)->name ?? null;
                    switch ($role) {
                        case 'Admin':
                            $output = array('success' => RouteServiceProvider::ADMIN);
                            // return redirect(RouteServiceProvider::ADMIN);
                            break;
                        case 'Incubator':
                            $output = array('success' => RouteServiceProvider::INCUBATOR);
                            // return redirect(RouteServiceProvider::INCUBATOR);
                            break;
                        case 'Accelerator':
                        $output = array('success' => RouteServiceProvider::ACCELERATOR);
                            // return redirect(RouteServiceProvider::ACCELERATOR);
                            break;
                        case 'Startup':
                            $output = array('success' => RouteServiceProvider::STARTUP,  );
                            // return redirect(RouteServiceProvider::STARTUP);
                            break;

                        case 'Developer':
                            $output = array('success' => RouteServiceProvider::DEVELOPER,  );
                            // return redirect(RouteServiceProvider::STARTUP);
                            break;


                        default:
                            Auth::logout();
                            // Alert::error('message', 'Unauthorized role !!');
                            // return redirect()->back();
                            $output = array('errors' => "Unauthorized role" );
                            break;
                    }
                    return response()->json($output);
                }
            }
        }else{
            return response()->json(['errors' => "Email verification code !!"]);
        }

    }
}
