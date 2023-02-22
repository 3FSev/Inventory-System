<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemsController;
use App\Models\Items;
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

Route::middleware(['auth','unverified'])->group(function(){
    Route::get('home', function() {
        return view('home');
    });
});

Route::middleware(['auth','admin-user','status'])->group(function(){
    Route::get('admin', function () {
        return view('admin/admin-index');
    });
    Route::get('ver', [AdminController::class, 'ver']);
    Route::get('unv', [AdminController::class, 'unv']);
});

Route::middleware(['auth','warehouse-user'])->group(function(){
    //Items Route
    Route::get('/', function () {
        return view('warehouse/index');
    });
    Route::get('items', [ItemsController::class, 'index']);
    Route::get('employee', [ItemsController::class, 'users']);
    Route::post('items', [ItemsController::class, 'store']);
    Route::delete('items/{item_id}', [ItemsController::class, 'destroy'])->name('destroy');
    Route::get('show/{item_id}', [ItemsController::class, 'show'])->name('show');
    Route::get('item_edit/{item_id}', [ItemsController::class, 'edit'])->name('edit');
    Route::post('item_edit/{item_id}', [ItemsController::class, 'update']);
});


Route::middleware(['auth','employee-user'])->group(function(){
    Route::get('employee-index', function(){
        return view('employee/employee-index');
    });
});

Auth::routes();
