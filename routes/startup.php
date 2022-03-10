<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\StartupController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','startup']], function (){
    Route::get('startup-add-product', [PageController::class,'startupAddProduct']);
    Route::get('available_stakeholder', [PageController::class,'available_stakeholder']);
    Route::get('view_product', [PageController::class,'view_product']);
    Route::get('Startup', [PageController::class,'startup']);
    Route::get('startup-products', [PageController::class,'startupInformation']);
    Route::get('available-accelerator', [PageController::class,'availableAccelerator']);
    Route::get('available-incubators', [PageController::class,'availableIncubator']);
    Route::get('startup_pdf', [PDFController::class,'generateStartupPDF']);
    Route::post('save_startup_details', [StartupController::class,'storeDetails'])->name('save_startup_details');
    Route::post('update_startup_details', [StartupController::class,'updateDetails'])->name('save_startup_details');
    Route::post('getExtraData', [StartupController::class,'getExtraData'])->name('getExtraData');
    Route::post('startup_manage', [StartupController::class,'startup_manage'])->name('startup_manage');
});
