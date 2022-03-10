<?php

namespace App\Http\Controllers;

use App\Models\foundersDetail;
use App\Models\Role;
use App\Models\stakeHoldersDetail;
use App\Models\StartupProduct;
use App\Models\userRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StakeholderController extends Controller
{
    public function save_stakeholder_details(Request $request){
        // Log::channel('devlogs')->info($request->all());
        // return   dd($request->all());
        $output = ['errors' => "Ooops something went wrong !!"];
        $rules = array(
            'founder_name' => 'required|array|max:255',
            'founder_name.*' => 'required|string|max:255',
            'founder_phone' => 'required|array|max:255',
            'founder_phone.*' => 'required|string|max:255',
            'founder_gender' => 'required|array|max:255',
            'founder_gender.*' => 'required|string|max:255',
            'isRegistered' => 'required|string|max:255',
            'org_name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'service_provided' => 'required|array|max:255',
            'service_provided.*' => 'required|string|max:255',
            'program_duration' => 'required|array|max:255',
            'program_duration.*' => 'required|string|max:255',
            'number_of_staffs' => 'required|numeric|min:1',
            'est_year' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'max_startup' => 'required|numeric|max:255',
            'source_funds' => 'required|string|max:30000',
            'pref_startup_stage' => 'required|array|max:255',
            'pref_startup_stage.*' => 'required|string|max:255',
            'business_model' => 'required|string|max:255',
            'business_model_desc' => 'required|string|max:30000',
            'focus_sectors_id' => 'required|array',
            'focus_sectors_id.*' => 'required|numeric',
        );



        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        } else {
            if ($request->has('mode') && $request->mode == "submit") {


                $stakeHolder = stakeHoldersDetail::create([
                    'users_id' => Auth::user()->id,
                    'program_duration' => implode(",", $request->program_duration),
                    'org_name' => $request->org_name,
                    'parent_name' => $request->parent_name,
                    'source_funds' => $request->source_funds,
                    'pref_startup_stage' => implode(",", $request->pref_startup_stage),
                    'number_of_staffs' => $request->number_of_staffs,
                    'isRegistered' => $request->isRegistered,
                    'est_year' => $request->est_year,
                    'address' => $request->address,
                    'service_provided' => implode(",", $request->service_provided),
                    'postal_code' => $request->postal_code,
                    'max_startup' => $request->max_startup,
                    'business_model_desc' => $request->business_model_desc,
                    'focus_sectors_id' => implode(",", $request->focus_sectors_id),
                    'business_model' => $request->business_model,
                    // 'financial_stage' => $request->financial_stage,
                    'status' => 'pending',
                ]);
                if ($stakeHolder) {
                    for ($i=0; $i < count($request->founder_name); $i++) {
                        foundersDetail::create([
                           'name' => $request->founder_name[$i],
                           'phone' => $request->founder_phone[$i],
                           'gender' => $request->founder_gender[$i],
                           'stake_holders_details_id' => $stakeHolder->id,
                       ]);
                    }
                }

                return response()->json(['success' => "Details submited successfully !!"]);
            }
            if ($request->has('id') && $request->mode == "update") {
                $stakeHolder = stakeHoldersDetail::where('id',$request->id)->update([
                    'program_duration' => implode(",", $request->program_duration),
                    'org_name' => $request->org_name,
                    'parent_name' => $request->parent_name,
                    'source_funds' => $request->source_funds,
                    'pref_startup_stage' => implode(",", $request->pref_startup_stage),
                    'number_of_staffs' => $request->number_of_staffs,
                    'isRegistered' => $request->isRegistered,
                    'est_year' => $request->est_year,
                    'address' => $request->address,
                    'service_provided' => implode(",", $request->service_provided),
                    'postal_code' => $request->postal_code,
                    'max_startup' => $request->max_startup,
                    'business_model_desc' => $request->business_model_desc,
                    'focus_sectors_id' => implode(",", $request->focus_sectors_id),
                    'business_model' => $request->business_model,
                    // 'financial_stage' => $request->financial_stage,
                ]);
                $foundersLast = foundersDetail::where('stake_holders_details_id',$request->id)->get();
                foreach ($foundersLast as  $lastData) {
                    foundersDetail::find($lastData->id)->delete();
                }
                for ($i=0; $i < count($request->founder_name); $i++) {
                        //     foundersDetail::where('stake_holders_details_id',$request->id)->update([
                        //        'name' => $request->founder_name[$i],
                        //        'phone' => $request->founder_phone[$i],
                        //        'gender' => $request->founder_gender[$i],
                        //    ]);
                        foundersDetail::create([
                            'name' => $request->founder_name[$i],
                            'phone' => $request->founder_phone[$i],
                            'gender' => $request->founder_gender[$i],
                            'stake_holders_details_id' => $request->id,
                        ]);
                }
                return response()->json(['success' => "Details updated successfully !!"]);
            }
        }
        return response()->json($output);
    }

    public function startup_manage(Request $request){
        $userRole = userRole::where('users_id',Auth::user()->id)->first();
        $role = Role::find($userRole->roles_id)->name;
        $output = ['errors' => "Ooops something went wrong !!"];
        if ($request->has('mode')) {
            if ($request->mode == "Accept") {
                StartupProduct::where('id',$request->id)
                                   ->where('isApproved',true)
                                   ->where('stake_holders_details_id',stakeHoldersDetail::where('users_id',Auth::user()->id)
                                   ->first()->id ?? 0)->update([
                                        'isStakeHolderApproved' => true,
                                        'status' => "accepted by ".$role
                                   ]);
                $output = ['success' => "Startup product accepted successfully !!"];
            }
            if ($request->mode == "Reject") {
                StartupProduct::where('id',$request->id)
                                   ->where('isApproved',true)
                                   ->update([
                                        'stake_holders_details_id' => null,
                                        'status' => "rejected by ".$role
                                   ]);
                $output = ['success' => "Startup product rejected successfully !!"];
            }
            if ($request->mode == "Approve_startup") {
                StartupProduct::where('id',$request->id)
                                   ->update([
                                        'isApproved' => true,
                                        'status' => "approved by SoftCenter"
                                   ]);
                $output = ['success' => "Startup product approved successfully !!"];
            }
            if ($request->mode == "Approve_stakeholder") {
                stakeHoldersDetail::where('id',$request->id)
                                   ->update([
                                        'isApproved' => true,
                                        'status' => "approved by SoftCenter"
                                   ]);
                $output = ['success' => "company or organization approved successfully !!"];
            }
        }
        return response()->json($output);
    }
}
