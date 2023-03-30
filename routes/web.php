<?php

use App\Http\Controllers\AccountabilityController;
use App\Http\Controllers\IssuanceController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ReturnedItemCotroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//----Waiting Page----//
Route::middleware(['auth','ver'])->group(function(){
    Route::get('approval', function() {
        return view('approval');
    });
});

//----Admin Module----//
Route::middleware(['auth','admin-user'])->group(function(){
    Route::get('admin', [UserController::class, 'dashboard']);
    Route::get('ver', [UserController::class, 'verified']);
    Route::post('ver', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('unv', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('unv/{user_id}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
    Route::delete('unv/{user_id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

//----Warehouse Module----//
Route::middleware(['auth','warehouse-user'])->group(function(){
    Route::get('warehouse', [ItemsController::class, 'dashboard']);
    Route::get('items', [ItemsController::class, 'index']);
    Route::get('employee', [ItemsController::class, 'users']);
    Route::get('wiv/{id}', [ItemsController::class, 'showEmployee'])->name('showEmployee');;
    Route::post('items', [ItemsController::class, 'store'])->name('items.store');
    Route::delete('items/{id}', [ItemsController::class, 'destroy'])->name('destroy');
    Route::get('show/{id}', [ItemsController::class, 'show'])->name('show');
    Route::get('item_edit/{id}', [ItemsController::class, 'edit'])->name('edit');
    Route::post('item_edit/{id}', [ItemsController::class, 'update']);
    Route::get('issuance', [IssuanceController::class, 'show'])->name('issuance.show');
    Route::post('issuance', [IssuanceController::class, 'store'])->name('issuance.store');
    Route::get('returned', [AccountabilityController::class, 'showMrt'])->name('returned.show');
    Route::get('get-items/{id}', [AccountabilityController::class, 'getItems']);
    Route::post('returned', [AccountabilityController::class, 'storeMrt'])->name('returned.store');
    Route::get('mrtForm/{id}', [AccountabilityController::class, 'mrtForm'])->name('returned.mrtForm');
    Route::post('mrtForm/{id}', [AccountabilityController::class, 'confirmMrt']);
});

//----Employee Module----//
Route::middleware(['auth','employee-user','approved'])->group(function(){
    Route::get('accountability', [AccountabilityController::class, 'show'])->name('accountability.show');
    Route::get('accountability/{wiv_id}/approve', [AccountabilityController::class, 'approve'])->name('wiv.approve');
    Route::get('mrt', [AccountabilityController::class, 'showMrt'])->name('accountability.showMrt');
    Route::post('mrt', [AccountabilityController::class, 'storeMrt'])->name('mrt.store');
});

Auth::routes();
