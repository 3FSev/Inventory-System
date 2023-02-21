<?php

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

Route::middleware(['auth','admin-user'])->group(function(){
    Route::get('admin', function () {
        return view('admin/admin-index');
    });
    
    Route::get('reg-user', function () {
        return view('admin/reg-user');
    });
    
    Route::get('unreg-user', function () {
        return view('admin/unreg-user');
    });
});

Route::middleware(['auth','warehouse-user'])->group(function(){
    //Items Route
    Route::get('/', function () {
        return view('warehouse/index');
    });
    Route::get('items', [ItemsController::class, 'index']);
    Route::get('employee', [ItemsController::class, 'users']);
    Route::post('items', [ItemsController::class, 'store']);
});


Route::middleware('auth')->group(function(){
    Route::get('employee-index', function(){
        return view('employee/employee-index');
    });
});

Auth::routes();
