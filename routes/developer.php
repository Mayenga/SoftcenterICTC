<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\PageController;
  use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','developer']], function (){
      Route::get('developer', [PageController::class,'developer']);
      Route::post('save_data', [DeveloperController::class,'create']);
  });

