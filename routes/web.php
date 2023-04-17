<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\IssuanceController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\ReturnedItemCotroller;
use App\Http\Controllers\AccountabilityController;

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
    Route::get('ver', [UserController::class, 'verified'])->name('admin.users.verified');
    Route::post('ver', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('user/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('user/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('unv', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('unv/{user_id}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
    Route::delete('unv/{user_id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('deleted-users', [RecoveryController::class, 'deletedUsers'])->name('admin.deletedUsers');
    Route::get('deleted-users/{id}/restore', [RecoveryController::class, 'recoverDeletedUsers'])->name('admin.deletedUsers.recover');
    Route::get('deleted-items', [RecoveryController::class, 'deletedItems'])->name('admin.deletedItems');
    Route::get('deleted-items/{id}/restore', [RecoveryController::class, 'recoverDeletedItems'])->name('admin.deletedItems.recover');
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
    Route::get('wivList', [IssuanceController::class, 'showWiv'])->name('issuance.showWiv');
    Route::get('returned', [AccountabilityController::class, 'showMrt'])->name('returned.show');
    Route::get('mrt-ticket', [AccountabilityController::class, 'mrtTicket'])->name('returned.mrt-ticket');
    Route::get('get-items/{id}', [AccountabilityController::class, 'getItems']);
    Route::post('returned', [AccountabilityController::class, 'storeMrt'])->name('returned.store');
    Route::get('mrtForm/{id}', [AccountabilityController::class, 'mrtForm'])->name('returned.mrtForm');
    Route::post('mrtForm/{id}', [AccountabilityController::class, 'confirmMrt']);
    Route::get('article-export',[ArticleController::class, 'exportArticles'])->name('export.excel'); 
});

//----Employee Module----//
Route::middleware(['auth','employee-user','approved'])->group(function(){
    Route::get('accountability', [AccountabilityController::class, 'show'])->name('accountability.show');
    Route::get('pending-wiv', [AccountabilityController::class, 'pending'])->name('pending.accountability.show');
    Route::get('pending-wiv/{wiv_id}/approve', [AccountabilityController::class, 'approve'])->name('wiv.approve');
    Route::get('mrt-list', [ReturnedItemCotroller::class, 'showList'])->name('accountability.showList');
    Route::get('request-mrt', [ReturnedItemCotroller::class, 'requestMrt'])->name('accountability.requestMrt');
    Route::post('request-mrt', [ReturnedItemCotroller::class, 'storeMrt'])->name('request-mrt.store');
    Route::get('change-password', [UserController::class, 'changePassword']);
    Route::post('change-password', [UserController::class, 'updatePassword'])->name('update.password');
});

Auth::routes();
