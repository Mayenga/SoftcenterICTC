<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\stakeHoldersDetail;
use App\Models\StartupDetail;
use App\Models\StartupProduct;
use App\Models\userRole;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PDFController extends Controller
{
    public function generateStakeholderPDF()
    {
        $data = stakeHoldersDetail::where('users_id',Auth::user()->id)->first() ?? null;

        if ($data == null) {
            Alert::info('Message', 'No any information to print !!');
            return redirect()->back();
        }
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $pdf  = PDF::loadView('user.stakeholder.pdf_information', $data);
        return $pdf->download(date('Y-m-d').rand(0,100).$role.'.pdf');
    }
    public function generateStartupPDF()
    {
        $data = StartupProduct::where('users_id',Auth::user()->id)->first() ?? null;

        if ($data == null) {
            Alert::info('Message', 'No any information to print !!');
            return redirect()->back();
        }
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $pdf  = PDF::loadView('user.startup.pdf_information', $data);
        return $pdf->download(date('Y-m-d').rand(0,100).$role.'.pdf');
    }

    public function startup_download(Request $request){
        $id = Crypt::decrypt($request->file_path);
        $file_name = StartupProduct::find($id)->file_name;
        return Storage::download('public/uploaded/startupdoc/'.$file_name);
    }
}
