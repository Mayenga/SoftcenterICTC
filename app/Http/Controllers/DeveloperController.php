<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeveloperController extends Controller
{
    public function create(Request $request){
        $output = ['errors' => "Ooops something went wrong !!"];
        $rules = array(
            'position' => 'required|array|max:255',
            'position.*' => 'required|string|max:255',
            'stack' => 'required|array|max:255',
            'stack.*' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
        );



        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            $output = ['errors' => $error->errors()->all()];
        } else {
                $output = ['success' => "Details saved successfully !!"];
                if (Developer::where('users_id',Auth::user()->id)->first() == null) {
                    Developer::create([
                        'users_id' => Auth::user()->id,
                        'position' => implode(",", $request->position),
                        'stack' => implode(",", $request->stack),
                        'level' => $request->level,
                        'experience' => $request->experience,
                    ]);
                    $output = ['success' => "Details saved successfully !!"];

                }
        }
        return response()->json($output);
    }
}
