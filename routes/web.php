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

Route::get('/', function () {
    return view('index');
});

Route::get('admin', function () {
    return view('admin-index');
});

Route::get('reg-user', function () {
    return view('reg-user');
});

Route::get('unreg-user', function () {
    return view('unreg-user');
});

Route::get('items', [ItemsController::class, 'index']);

Route::post('items', [ItemsController::class, 'store']);

Route::delete('items', [ItemsController::class, 'destroy'])->name('items.destroy');;

Route::get('employee', function () {
    return view('employee');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
