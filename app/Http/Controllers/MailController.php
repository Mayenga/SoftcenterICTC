<?php

namespace App\Http\Controllers;

use App\Mail\EmailUserPassword;
use App\Mail\EmailVerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendEmailVerificationCode($name, $email,$code){
        $data = [
            'email' => $email,
            'code' => Crypt::decrypt($code),
            'name' => $name
        ];
        // Log::channel('dev')->info('MailController::sendSingupEmail ');
        // Log::channel('dev')->info($data);
        Mail::to($email)->send(new EmailVerificationCode($data));
        // if( count(Mail::failures()) > 0 ) {
        //     return false;
        // }

        // return true;
    }
    public static function sendEmailUserpassword($name, $email,$password){
        $data = [
            'email' => $email,
            'password' => $password,
            'name' => $name
        ];
        // Log::channel('dev')->info('MailController::sendSingupEmail ');
        // Log::channel('dev')->info($data);
        Mail::to($email)->send(new EmailUserPassword($data));
        // if( count(Mail::failures()) > 0 ) {
        //     return false;
        // }

        // return true;
    }
}
