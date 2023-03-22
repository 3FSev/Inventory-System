<?php

namespace App\Http\Controllers;

use App\Models\Mrt;
use App\Models\Status;
use Illuminate\Http\Request;

class ReturnedItemCotroller extends Controller
{
    public function  show(){
        $mrt = Mrt::all();

        return view('warehouse/mrt-request', compact('mrt'));
    }
}
