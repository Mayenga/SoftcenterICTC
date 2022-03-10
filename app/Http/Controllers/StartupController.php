<?php

namespace App\Http\Controllers;

use App\Models\foundersDetail;
use App\Models\Role;
use App\Models\stakeHoldersDetail;
use App\Models\StartupDetail;
use App\Models\StartupProduct;
use App\Models\userRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StartupController extends Controller
{
    public $filePath;

    public function __construct()
    {
        $this->filePath = 'public/uploaded/startupdoc/';
    }

    protected function startup_manage(Request $request){
         $lastDAta = StartupProduct::find($request->id);
        if ($lastDAta->file_name != null) {
            Storage::delete($this->filePath.$lastDAta->file_name);
        }
          $lastDAta->delete();
        return response()->json(['success' => "Product removed successfully !!"]);
    }

    public function storeDetails(Request $request)
    {
        $output = ['errors' => "Ooops something went wrong !!"];
        $rules = array(
            'founder_name' => 'nullable|array|max:255',
            'founder_name.*' => 'nullable|string|max:255',
            'founder_gender' => 'nullable|array|max:255',
            'founder_gender.*' => 'nullable|string|max:255',
            'founder_phone' => 'nullable|array|max:255',
            'founder_phone.*' => 'nullable|string|max:255',
            'isRegistered' => 'required|string|max:255',
            'hasStakeholder' => 'required|string|max:255',
            'ownership' => 'required|string|max:255',
            'file_name' => 'nullable|file|mimes:pdf',
            'product_name' => 'required|string|max:255',
            'description' => 'required|min:255|max:10000',
            'number_of_staffs' => 'nullable|numeric|min:1',
            'est_year' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'product_stage' => 'required|string|max:255',
            'business_model' => 'required|string|max:255',
            'business_model_desc' => 'required|string|max:10000',
            'finacial_stage' => 'required|string|max:255',
            'web_url' => 'nullable|string|max:255',
            'focus_sectors_id' => 'required|numeric',
        );



        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        } else {
            if ($request->mode == "update" && $request->has('id')) {
                $stakeholder_name = null;
                $file_name = null;
                if ($request->file_name != "") {
                    $lastDAta = StartupProduct::find($request->id);
                    if ($lastDAta->file_name != null) {
                        Storage::delete($this->filePath.$lastDAta->file_name);
                    }
                    $file = $request->file_name;
                    $file_name = time() . rand(1,200000) . "." . $file->getClientOriginalExtension();
                    Storage::putFileAs($this->filePath, $file, $file_name);
                }
                if ($request->stake_holders_details_id == "Not listed") {
                    $stakeholder_name = $request->stakeholder_name;
                    $shdid = null;
                }
                $startup = StartupProduct::where('id',$request->id)->update([
                    'users_id' => Auth::user()->id,
                    'product_name' => $request->product_name,
                    'description' => $request->description,
                    'description' => $request->description,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code,
                    'web_url' => $request->web_url,
                    'business_model' => $request->business_model,
                    'business_model_desc' => $request->business_model_desc,
                    'finacial_stage' => $request->finacial_stage, 
                    'product_stage' => $request->product_stage,
                    'product_cat' => $request->product_cat,
                    'hasStakeholder' => $request->hasStakeholder,
                    'stakeholder_name' => $request->stakeholder_name,
                    'stake_holders_details_id' => $shdid,
                    'ownership' => $request->ownership,
                    'isRegistered' => $request->isRegistered,
                    'est_year' => $request->est_year,
                    'focus_sectors_id' => $request->focus_sectors_id,
                    'file_name' => $file_name,
                    'number_of_staffs' => $request->number_of_staffs,
                ]);

                if ($request->ownership == "Organization") {
                    $foundersLast = foundersDetail::where('startup_products_id',$request->id)->get();
                    foreach ($foundersLast as  $lastData) {
                        foundersDetail::find($lastData->id)->delete();
                    }
                    for ($i=0; $i < count($request->founder_name); $i++) {
                        foundersDetail::create([
                             'name' => $request->founder_name[$i],
                             'phone' => $request->founder_phone[$i],
                             'gender' => $request->founder_gender[$i],
                             'startup_products_id' => $startup->id,
                         ]);
                     }
                }
                return response()->json(['success' => "Details updated successfully !!"]);
            }
            if ($request->mode == "submit") {

                $stakeholder_name = null;
                if ($request->stake_holders_details_id == "Not listed") {
                    $stakeholder_name = $request->stakeholder_name;
                    $shdid = null;
                }
                $file_name = null;
                if ($request->file_name != "") {
                    $file = $request->file_name;
                    $file_name = time() . rand(1,200000) . "." . $file->getClientOriginalExtension();
                    Storage::putFileAs($this->filePath, $file, $file_name);
                }

                $startup = StartupProduct::create([
                    'users_id' => Auth::user()->id,
                    'product_name' => $request->product_name,
                    'description' => $request->description,
                    'description' => $request->description,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code,
                    'web_url' => $request->web_url,
                    'business_model' => $request->business_model,
                    'business_model_desc' => $request->business_model_desc,
                    'finacial_stage' => $request->finacial_stage,
                    'product_stage' => $request->product_stage,
                    'product_cat' => $request->product_cat,
                    'hasStakeholder' => $request->hasStakeholder,
                    'stakeholder_name' => $stakeholder_name,
                    'stake_holders_details_id' => $shdid,
                    'ownership' => $request->ownership,
                    'isRegistered' => $request->isRegistered,
                    'focus_sectors_id' => $request->focus_sectors_id,
                    'est_year' => $request->est_year,
                    'file_name' => $file_name,
                    'number_of_staffs' => $request->number_of_staffs,
                ]);
                if ($startup) {
                    if ($request->ownership == "Organization") {
                        for ($i=0; $i < count($request->founder_name); $i++) {
                            foundersDetail::create([
                                 'name' => $request->founder_name[$i],
                                 'phone' => $request->founder_phone[$i],
                                 'gender' => $request->founder_gender[$i],
                                 'startup_products_id' => $startup->id,
                             ]);
                         }
                    }

                }
                return response()->json(['success' => "Form submitted successfully !!"]);
            }

        }
        return response()->json($output);
    }

    public function getExtraData(Request $request){
         if ($request->has('mode')) {
            if ($request->mode == "startupRegister" && $request->ownership != "") {
                if ($request->ownership == "Individual") {
                    return view('user.startup.partials.individual');
                }
                if ($request->ownership == "Organization") {
                    return view('user.startup.partials.organization');
                }

            }
            if ($request->mode == "productStage" || $request->mode == "checkStakeHolder" ) {

                    $needIncubation = false;
                    $needAccelerator = false;
                    $stakeHolderAvailable = false;
                    $hasStakeholder = false;
                    $stage = "";
                    $data = array();
                    if ($request->id == "Ideation Stage" || $request->id == "Prototype Stage") {
                        $needIncubation = true;
                        $role_id = Role::where('name','Incubator')->first()->id ?? 0;
                        $users_id = userRole::where('roles_id',$role_id)->pluck('users_id');
                        $data = stakeHoldersDetail::whereIn('users_id',$users_id)->get();
                        if (count($data) > 0) {
                            $stakeHolderAvailable = true;
                        }
                        $stage = "Incubator";
                    }
                    if ($request->id == "Growth Stage" || $request->id == "Scaling Stage") {
                        $needAccelerator = true;
                        $role_id = Role::where('name','Accelerator')->first()->id ?? 0;
                        $users_id = userRole::where('roles_id',$role_id)->pluck('users_id');
                        $data = stakeHoldersDetail::whereIn('users_id',$users_id)->get();
                        if (count($data) > 0) {
                            $stakeHolderAvailable = true;
                        }
                        $stage = "Accelerator";
                    }
                    if ($request->mode == "checkStakeHolder") {
                        $hasStakeholder = $request->hasStakeholder;
                    }
                    return view('user.startup.partials.product_stage')
                               ->with('id',$request->id)
                               ->with('mode',$request->mode)
                               ->with('stage',$stage)
                               ->with('hasStakeholder',$hasStakeholder)
                               ->with('needIncubation',$needIncubation)
                               ->with('needAccelerator',$needAccelerator)
                               ->with('stakeHolderAvailable',$stakeHolderAvailable)
                               ->with('data',$data);
            }
         }
    }
}
