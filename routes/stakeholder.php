<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\StakeholderController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','stakeholder']], function (){
    Route::get('accepted-startup', [PageController::class,'accepted_startup']);
    Route::get('request-startup', [PageController::class,'request_startup']);
    Route::get('stakeholder-information', [PageController::class,'stakeholderInformation']);
    Route::get('Incubator', [PageController::class,'stakeholder']);
    Route::get('Accelerator', [PageController::class,'stakeholder']);
    Route::get('stakeholder_pdf', [PDFController::class,'generateStakeholderPDF']);
    Route::post('save_stakeholder_details', [StakeholderController::class,'save_stakeholder_details'])->name('save_stakeholder_details');
    Route::post('startup_manage', [StakeholderController::class,'startup_manage'])->name('startup_manage');
});
  