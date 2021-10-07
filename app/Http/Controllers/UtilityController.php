<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    static function product_stage(){
        $data_set = [
            [
                'name' => "Ideation Stage",
                'id' => 1,
                'cat' => "1",
            ],
            [
                'name' => "Prototype Stage",
                'id' => 2,
                'cat' => "1",
            ],
            [
                'name' => "Growth Stage",
                'id' => 3,
                'cat' => "2",
            ],
            [
                'name' => "Scaling Stage",
                'id' => 4,
                'cat' => "2",
            ],

        ];
        return $data_set;
    }
    static function product_stage_mode($id){
        $cat = "";
       if ($id == 1 && $id == 2) {
           $cat = "Pre Mature";
       }
       if ($id == 3 && $id == 4) {
           $cat = "Matured";
       }
        return $cat;
    }
}
