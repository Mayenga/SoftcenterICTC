<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\StakeholderController;
use App\Http\Controllers\SuperController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','admin']], function (){
    Route::get('Admin', [PageController::class,'admin']);
    Route::get('registered_users', [PageController::class,'registered_users']);
    Route::get('startups', [PageController::class,'startups']);
    Route::get('developers', [PageController::class,'developers']);
    Route::get('incubators', [PageController::class,'incubators']);
    Route::get('accelerators', [PageController::class,'accelerators']);
    Route::get('announcements', [PageController::class,'announcements']);
    Route::get('approvals', [PageController::class,'approvals']);
    Route::get('roles', [PageController::class,'roles']);
    Route::get('users', [PageController::class,'users']);
    Route::get('settings', [PageController::class,'settings']);
    Route::post('Approve_stakeholder', [StakeholderController::class,'startup_manage']);
    Route::post('Approve_startup', [StakeholderController::class,'startup_manage']);
    Route::post('chaangesystemuserinfo', [SuperController::class,'chaangesystemuserinfo']);
    Route::post('add_system_user', [SuperController::class,'add_system_user']);
    Route::post('add_announcement', [SuperController::class,'add_announcement']);
    Route::post('delete_announcement', [SuperController::class,'delete_announcement']);
    Route::post('delete_users', [SuperController::class,'delete_users']);
});
