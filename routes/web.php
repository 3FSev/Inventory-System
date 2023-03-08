<?php

use App\Http\Controllers\IssuanceController;
use App\Http\Controllers\ItemsController;
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
    Route::get('dashboard', [UserController::class, 'dashboard']);
    Route::get('ver', [UserController::class, 'verified']);
    Route::get('unv', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('unv/{user_id}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
    Route::delete('unv/{user_id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

//----Warehouse Module----//
Route::middleware(['auth','warehouse-user'])->group(function(){
    Route::get('dashboard', [ItemsController::class, 'dashboard']);
    Route::get('items', [ItemsController::class, 'index']);
    Route::get('employee', [ItemsController::class, 'users']);
    Route::post('items', [ItemsController::class, 'store']);
    Route::delete('items/{id}', [ItemsController::class, 'destroy'])->name('destroy');
    Route::get('show/{id}', [ItemsController::class, 'show'])->name('show');
    Route::get('item_edit/{id}', [ItemsController::class, 'edit'])->name('edit');
    Route::post('item_edit/{id}', [ItemsController::class, 'update']);
    Route::get('issuance', [IssuanceController::class, 'show'])->name('issuance.show');
    Route::post('issuance', [IssuanceController::class, 'store'])->name('issuance.store');
});

//----Employee Module----//
Route::middleware(['auth','employee-user','approved'])->group(function(){
    Route::get('employee-index', function(){
        return view('employee/employee-index');
    });
});

Auth::routes();
