<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Anouncement;
use App\Models\Developer;
use App\Models\stakeHoldersDetail;
use App\Models\StartupProduct;
use App\Models\User;
use App\Models\userRole;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Illuminate\Support\Facades\DB;

class SuperController extends Controller
{

    public $profile_imagePath;
    public $image_filePath;
    public $attached_filePath;

    public function __construct()
    {
        $this->profile_imagePath = 'public/uploaded/users/';
        $this->image_filePath = 'public/uploaded/ads/image/';
        $this->attached_filePath = 'public/uploaded/ads/attachment/';
    }

    public function send_password(Request $request){
        // Password::sendResetLink($request->email);

        // return $this->respondWithMessage(msg: "Reset Password Link sent on your email");
        $user = User::whereEmail($request->email)->first();
        if($user == null){
            return redirect()->back()->with(['error' => 'Email does not exast']);
        }else{
            return $request->email;
        }
        
        // $user = Sentinel::findById($user_id);
        
        // $reminder = Reminder::exists($user) ? : Reminder::create($user);
        
        // $this->sendEmail($user, $reminder->code);
        // return "went here";
        // return redirect()->back()->with(['success' => 'Reset code sent to your email.']);  
    }

    // public function sendEmail($user, $code){
    //     Mail::send(
    //         'mail.forgot',
    //         ['user' => $user, 'code' => $code],
    //         function($message) use ($user){
    //             $message->to($user->email);
    //             $message->subject("$user->name, resert your passoword.");
    //         }
    //     );
    // }

    public function forgot_password(){
        return view('user.forgot');
    }
    public function forgot_password_function(Request $request){
        $user = User::whereEmail($request->email)->first();

        if($user == null){
            return redirect()->back()->with(['error' => 'Email not exists']);
        }
        $email = $request->email;
        $user = DB::select('SELECT * FROM users WHERE email = ?', [$email]);
        $code = $user[0]->id;
        $this->sendEmail($user, $code);

        return redirect()->back()->with(['success' => 'Reset code sent to your email']);
    }

    public function sendEmail($user, $code){
        Mail::send(
            'mail.forgot',
            ['user' => $user, 'code' => $code],
            function($message) use ($user){
                $message->to($user[0]->email);
                $name = $user[0]->name;
                $message->subject("$name, reset your password");
            }
        );
    }

    public function forgot_password_newpasswordlink(){
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $new_password = generateRandomString();
        $id = request()->id;
        $password = Hash::make($new_password);
        DB::table('users')->where('id',$id)->update(array('password'=>$password));
        // User::find(auth()->user()->id)->update(['password'=> Hash::make($new_password)]);
        return view('user.pass', ['password' => $new_password]);
    }

    protected function delete_users(Request $request){
        try {
            User::find($request->id)->delete();
            $output = array(
                'success' => 'User deleted successfully !!',
            );
        } catch (Exception $err) {
            $output = array(
                'errors' => 'Something went wrong user not deleted !!',
            );
        }
        return response()->json($output, 200);
    }

    protected function changepassword(Request $request)
    {
        // Hash::make($data['password'])  'password' => ['required', 'string', 'min:8', 'confirmed'],

        $rules = array(
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            $output = ['errors' => $error->errors()->all()];
        } else {

            if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->oldpassword])) {

                User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->password)]);

                $output = array(
                    'success' => 'Password changed successfully',
                );
            } else {

                $output = array(
                    'errors' => 'Password not changed please enter correct old password',
                );
            }
        }

        return response()->json($output, 200);
    }

    protected function chaangesystemuserinfo(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'file_name' => 'nullable|file|mimes:jpg,png,jpeg|max:3024',
            'phone' => 'required|string|unique:users,phone,' . $request->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            $output = ['errors' => $error->errors()->all()];
        } else {
            $file_name = User::find($request->id)->profile_image ?? "default.png";
            if ($request->hasFile('profile_image') && $request->profile_image != "") {
                if ($file_name != "default.png") {
                    Storage::delete($this->profile_imagePath . $file_name);
                }
                $file = $request->profile_image;
                $file_name = time() . User::find($request->id)->username . "." . $file->getClientOriginalExtension();
                Storage::putFileAs($this->profile_imagePath, $file, $file_name);
            }

            User::where('id', $request->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'profile_image' => $file_name,
            ]);
            $output = ['success' => "Details updated successfully !!"];
        }
        return response()->json($output, 200);
    }

    protected function add_announcement(Request $request)
    {
        $rules = array(
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:30000',
            'expr_date' => 'required|string|max:20',
            'target_to' => 'required|string|max:255',
            'image_file' => 'nullable|file|mimes:jpg,png,jpeg|max:6024',
            'attachment' => 'nullable|file|mimes:pdf|max:6024',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            $output = ['errors' => $error->errors()->all()];
        } else {
            $attachment = null;
            $image_file = null;
            if ($request->hasFile('image_file') && $request->image_file != "") {
                $file = $request->image_file;
                $image_file = time() . "." . $file->getClientOriginalExtension();
                Storage::putFileAs($this->image_filePath, $file, $image_file);
            }
            if ($request->hasFile('attachment') && $request->attachment != "") {
                $file = $request->attachment;
                $attachment = time() . "." . $file->getClientOriginalExtension();
                Storage::putFileAs($this->attached_filePath, $file, $attachment);
            }

            Anouncement::create([
                'title' => $request->title,
                'expr_date' => $request->expr_date,
                'target_to' => $request->target_to,
                'content' => $request->content,
                'attachment' => $attachment,
                'image_file' => $image_file,
            ]);
            $output = ['success' => "Anouncement Posted successfully !!"];
        }
        return response()->json($output, 200);
    }

    protected function delete_announcement(Request $request){
        $delete = Anouncement::find($request->id);
        if ($delete->image_file != null || $request->image_file != "") {
            Storage::delete($this->image_filePath . $delete->image_file);
        }
        if ($delete->attachment != null && $delete->attachment != "") {
            Storage::delete($this->image_filePath . $delete->image_file);
        }
        $delete->delete();
        return response()->json(["success" => "Announcement deleted successfully !!", 200]);
    }

    protected function chaangeuserinfo(Request $request)
    {

        $rules = array(
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|file|mimes:jpg,png,jpeg|max:3024',
            'phone' => 'required|string|unique:users,phone,' . Auth::user()->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            $output = ['errors' => $error->errors()->all()];
        } else {
            $file_name = User::find(Auth::user()->id)->profile_image ?? "default.png";
            if ($request->hasFile('profile_image') && $request->profile_image != "") {
                if ($file_name != "default.png") {
                    Storage::delete($this->profile_imagePath . $file_name);
                }
                $file = $request->profile_image;
                $file_name = time() . "." . $file->getClientOriginalExtension();
                Storage::putFileAs($this->profile_imagePath, $file, $file_name);
            }

            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'profile_image' => $file_name,
            ]);
            $output = ['success' => "Details updated successfully !!"];
        }

        return response()->json($output, 200);
    }

    protected function add_system_user(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'role' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'profile_image' => 'nullable|file|mimes:jpg,png,jpeg|max:3024',
            // 'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()
            //     ->letters()
            //     ->numbers()
            //     ->symbols()
            //     ->uncompromised(),],
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        } else {
            $file_name = "default.png";

            $password = Str::random(8);
            if (MailController::sendEmailUserpassword($request->name, $request->email, $password)) {
                if ($request->hasFile('profile_image') && $request->profile_image != "") {
                    $file = $request->profile_image;
                    $file_name = time() . "." . $file->getClientOriginalExtension();
                    Storage::putFileAs($this->profile_imagePath, $file, $file_name);
                }
                $user = User::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'profile_image' => $file_name,
                    'verification_code' => sha1(rand(0, 100000)),
                    'password' => Hash::make($password),
                ]);

               userRole::create([
                    'users_id' => $user->id,
                    'roles_id' => $request->role,
                ]);
                $output = array(
                    'success' => "New user added succesfully",
                );
            }else {
                $output = array(
                    'errors' => "Email not sent user account not created !!",
                );
            }


            return response()->json($output);
        }
    }

    protected function contact_form(Request $request){
        $rules = array(
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        } else {
            $data = [
                'email' => $request->email,
                'message' => $request->message,
                'subject' => $request->subject,
                'name' => $request->name
            ];
            try {
                Mail::to('mukhusinsiraji@gmail.com')->send(new ContactMail($data));
                $output = array(
                    'success' => "Email sent successfully !!",
                );
            } catch (Exception $err) {
                $output = array(
                    'errors' => "Email not sent ".$err->getMessage(),
                );
            }
            return response()->json($output);
        }
    }

    public function listData(Request $request){
       try {
        if ($request->has('mode')) {
            if ($request->mode == "listData") {
               if ($request->type == "Developer") {
                   $listData = Developer::all();
                   return view('partials.list_data')
                           ->with('listData',$listData)
                           ->with('mode',$request->mode)
                           ->with('type',$request->type);
               }

               if ($request->type == "Startups") {
                   $usersIds = userRole::where('roles_id',2)->pluck('users_id');
                   $listData = User::whereIn('id',$usersIds)->get();
                   return view('partials.list_data')
                           ->with('listData',$listData)
                           ->with('mode',$request->mode)
                           ->with('type',$request->type);
               }

               if ($request->type == "Incubators") {
                   $usersIds = userRole::where('roles_id',3)->pluck('users_id');
                   $listData = stakeHoldersDetail::whereIn('users_id',$usersIds)->get();
                   return view('partials.list_data')
                           ->with('listData',$listData)
                           ->with('mode',$request->mode)
                           ->with('type',$request->type);
               }
               if ($request->type == "Accelerators") {
                   $usersIds = userRole::where('roles_id',4)->pluck('users_id');
                   $listData = stakeHoldersDetail::whereIn('users_id',$usersIds)->get();
                   return view('partials.list_data')
                           ->with('listData',$listData)
                           ->with('mode',$request->mode)
                           ->with('type',$request->type);
               }
            }
        }
       } catch (Exception $err) {
          return "Sorry something went wrong !!" .$err;
       }
    }

}
