<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function unreg(){
        $user_list = User::all();
        return view('admin/unreg-user', compact('user_list'));
    }
}
