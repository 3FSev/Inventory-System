<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    //Unverified user
    public function unv(){
        $user_list = User::all();
        $role = Role::all();
        return view('admin/unv-user', compact('user_list'))->with('role');
    }

    //Verified user
    public function ver(){
        $user_list = User::all();
        return view('ver');
    }
}
