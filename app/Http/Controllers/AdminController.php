<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    //Unverified user
    public function unv(){
        $user_list = DB::table('users')->where('status', 0)->get();
        return view('admin/unv-user', compact('user_list'));
    }

    //Verified user
    public function ver(){
        $user_list = DB::table('users')->where('status', 1)->get();
        return view('admin/ver-user', compact('user_list'));
    }

    public function approved($id){
            $user = User::find($id);
            dd($user->status);
    }
}
