<?php

namespace App\Http\Controllers;

use App\Models\Mrt;
use App\Models\Wiv;
use App\Models\Items;
use App\Models\Status;
use App\Models\Itemwiv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnedItemCotroller extends Controller
{
    public function  show(){
        $mrt = Mrt::all();

        return view('warehouse/mrt-request', compact('mrt'));
    }

    public function  showMrt(){
        $user = Auth::id();
        $mrt = Mrt::where('user_id', $user);
        $wiv = Wiv::where('user_id', $user);
        return view('employee/mrt', compact('mrt','wiv'));
    }
}
