<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Stakeholder;
use App\Models\Anouncement;
use App\Models\Developer;
use App\Models\Role;
use App\Models\stakeHoldersDetail;
use App\Models\StartupDetail;
use App\Models\StartupProduct;
use App\Models\User;
use App\Models\userRole;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PageController extends Controller
{
    public $role;
    public function __construct()
    {

    }

    public function registered_users(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id);
        $users_id = userRole::where('roles_id','!=',$role->id)->pluck('users_id');
        $users = User::whereIn('id',$users_id)->get();
        $userRoles = Role::where('name','!=','Admin')->get();
        return view('pages.registered_users')
                    ->with('userRoles',$userRoles)
                    ->with('users',$users)
                    ->with('role',$role->name);
    }

    public function available_stakeholder(Request $request){
        try {
            $id = Crypt::decrypt($request->product_path);
            $product = StartupProduct::find($id);
            if ($product->product_cat == "Pre Mature") {
                return $this->availableIncubator();
            }
            if ($product->product_cat == "Matured") {
                return $this->availableAccelerator();
            }
        } catch (Exception $eeror) {
            return redirect()->back();
        }
    }

    public function view_product(Request $request){
        $id = Crypt::decrypt($request->product_path);
        $productData = StartupProduct::find($id);
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        return view('user.startup.view_product')
                   ->with('role',$role)
                   ->with('productData',$productData);
    }

    public function stakeholder(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $text = "text-danger";
        $status = "Incomplete";
        $messageNote = "Please Fill the form below correctly !!";
        $details = stakeHoldersDetail::where('users_id',Auth::user()->id)->first() ?? null;
        if ($details != null) {
            $text = "text-info";
            $messageNote = "You can edit your details !!";
            if ($details->isApproved) {
                $text = "text-success";
                $messageNote = "Congulatulation your details are approved !!";
            }
            $status = $details->status;

        }
            $startupData = array();
            $isApproved = stakeHoldersDetail::where('users_id',Auth::user()->id)->first()->isApproved ?? false;
            if ($isApproved) {
                $startupData = StartupProduct::where('isApproved',true)->where('stake_holders_details_id',stakeHoldersDetail::where('users_id',Auth::user()->id)->first()->id ?? 0)->where('isStakeHolderApproved',false)->get();
            }
        return view('user.stakeholder.dashboard')
                     ->with('startupData',$startupData)
                     ->with('details',$details)
                     ->with('text',$text)
                     ->with('status',$status)
                     ->with('messageNote',$messageNote)
                     ->with('role',$role);
    }

    public function stakeholderInformation(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $text = "text-danger";
        $status = "Incomplete";
        $messageNote = "Please Fill the form below correctly !!";
        $details = stakeHoldersDetail::where('users_id',Auth::user()->id)->first() ?? null;
        if ($details != null) {
            $text = "text-info";
            $messageNote = "You can edit your details !!";
            if ($details->isApproved) {
                $text = "text-success";
                $messageNote = "Congulatulation your details approved !!";
            }
            $status = $details->status;

        }
        return view('user.stakeholder.stakeholder-information')
                     ->with('details',$details)
                     ->with('text',$text)
                     ->with('status',$status)
                     ->with('messageNote',$messageNote)
                     ->with('role',$role);
    }

    public function startup(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $text = "";
        $status = "";
        $messageNote = "";
        $details = StartupProduct::where('users_id',Auth::user()->id)->get();
        $detailsData = StartupProduct::where('users_id',Auth::user()->id)->where('isApproved',false)->get();

        return view('user.startup.dashboard')
                     ->with('details',$details)
                     ->with('detailsData',$detailsData)
                     ->with('text',$text)
                     ->with('status',$status)
                     ->with('messageNote',$messageNote)
                     ->with('role',$role);
    }
   public function developer(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $text = "";
        $status = "";
        $messageNote = "";
        $details = array();
        $detailsData = array();

        return view('user.developer.dashboard')
                     ->with('details',$details)
                     ->with('detailsData',$detailsData)
                     ->with('text',$text)
                     ->with('status',$status)
                     ->with('messageNote',$messageNote)
                     ->with('role',$role);
    }

    public function availableAccelerator(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;

        $acceleratorID = Role::where('name','Accelerator')->first()->id ?? null;
        $users_id = userRole::where('roles_id',$acceleratorID)->pluck('users_id') ?? [];

        $details = stakeHoldersDetail::whereIn('users_id',$users_id)->where('isApproved',true)->get();

        return view('user.startup.available-accelerator')
                     ->with('details',$details)
                     ->with('role',$role);
    }

    public function availableIncubator(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;

        $acceleratorID = Role::where('name','Incubator')->first()->id ?? null;
        $users_id = userRole::where('roles_id',$acceleratorID)->pluck('users_id') ?? [];

        $details = stakeHoldersDetail::whereIn('users_id',$users_id)->where('isApproved',true)->get();

        return view('user.startup.available-incubator')
                     ->with('details',$details)
                     ->with('role',$role);
    }

    public function startupInformation(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $text = "";
        $status = "";
        $messageNote = "";
        $details = StartupProduct::where('users_id',Auth::user()->id)->get();
        return view('user.startup.startup-information')
                     ->with('details',$details)
                     ->with('text',$text)
                     ->with('status',$status)
                     ->with('messageNote',$messageNote)
                     ->with('role',$role);
    }

    public function admin(Request $request){
        $mode = "";
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $details = StartupProduct::where('isApproved',false)->get();
        if ($request->has('mode')) {
            $mode = $request->mode;
            if ($request->mode == "incubator") {
                $acceleratorID = Role::where('name','Incubator')->first()->id ?? null;
                $users_id = userRole::where('roles_id',$acceleratorID)->pluck('users_id') ?? [];
                $details = stakeHoldersDetail::whereIn('users_id',$users_id)->where('isApproved',false)->get();
            }
            if ($request->mode == "accelerator") {
                $acceleratorID = Role::where('name','Accelerator')->first()->id ?? null;
                $users_id = userRole::where('roles_id',$acceleratorID)->pluck('users_id') ?? [];
                $details = stakeHoldersDetail::whereIn('users_id',$users_id)->where('isApproved',false)->get();
            }
            if ($request->mode == "developer") {
                $details = Developer::all();
            }
        }
        return view('user.admin.dashboard')
                  ->with('mode',$mode)
                  ->with('details',$details)
                  ->with('role',$role);
    }

    public function startups(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $details = StartupProduct::all();
        return view('pages.startups')
                ->with('details',$details)
                ->with('role',$role);
    }

    public function incubators(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $incubatorsID = Role::where('name','Incubator')->first()->id ?? null;
        $users_id = userRole::where('roles_id',$incubatorsID)->pluck('users_id') ?? [];
        $data = stakeHoldersDetail::whereIn('users_id',$users_id)->get();
        return view('pages.incubators')
                ->with('details',$data)
                ->with('role',$role);
    }

    public function developers(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $data = Developer::all();
        return view('pages.developers')
                ->with('details',$data)
                ->with('role',$role);
    }

    public function accelerators(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $acceleratorsID = Role::where('name','Accelerator')->first()->id ?? null;
        $users_id = userRole::where('roles_id',$acceleratorsID)->pluck('users_id') ?? [];
        $data = stakeHoldersDetail::whereIn('users_id',$users_id)->get();
        return view('pages.accelerators')
                    ->with('details',$data)
                    ->with('role',$role);
    }

    public function announcements(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $anouncements = Anouncement::orderByDesc('id')->get();
        return view('pages.announcements')
                     ->with('anouncements',$anouncements)
                     ->with('role',$role);
    }

    function approvals(){
        return view('pages.approvals');
    }

    public function roles(){
        return view('pages.roles');
    }

    public function users(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id);
        $users_id = userRole::where('roles_id',$role->id)->pluck('users_id');
        $users = User::whereIn('id',$users_id)->get();
        $userRoles = Role::where('name','Admin')->get();
        return view('pages.users')
                    ->with('userRoles',$userRoles)
                    ->with('users',$users)
                    ->with('role',$role->name);
    }

    public function settings(){
        return view('user.settings');
    }

    public function startupAddProduct(){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        return view('user.startup.add_product')
                ->with('role',$role);
    }

    public function request_startup(){
        $details = array();
        $isApproved = stakeHoldersDetail::where('users_id',Auth::user()->id)->first()->isApproved ?? false;
        if ($isApproved) {
            $details = StartupProduct::where('isApproved',true)->where('stake_holders_details_id',stakeHoldersDetail::where('users_id',Auth::user()->id)->first()->id ?? 0)->where('isStakeHolderApproved',false)->get();
        }
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        return view('user.stakeholder.request-startup')
                   ->with('details',$details)
                   ->with('role',$role);

    }
    public function accepted_startup(){
        $details = array();
        $isApproved = stakeHoldersDetail::where('users_id',Auth::user()->id)->first()->isApproved ?? false;
        if ($isApproved) {
            $details = StartupProduct::where('isApproved',true)->where('stake_holders_details_id',stakeHoldersDetail::where('users_id',Auth::user()->id)->first()->id ?? 0)->where('isStakeHolderApproved',true)->get();
        }
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        return view('user.stakeholder.accepted-startup')
                   ->with('details',$details)
                   ->with('role',$role);

    }
}
