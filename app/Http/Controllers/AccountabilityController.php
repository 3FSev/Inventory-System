<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mrt;
use App\Models\Wiv;
use App\Models\Itemwiv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountabilityController extends Controller
{
    public function show(){
        $user_id = Auth::id();
        $pending = Wiv::whereNull('received_at')->where('user_id',$user_id)->get();
        $wiv = Wiv::with(['items' => function($query){
            $query->wherePivot('quantity','>=',1);
        }])->whereNotNull('received_at')->where('user_id',$user_id)->get();

        return view('employee/accountability', compact('pending','wiv'));
    }

    public function approve($wiv_id)
    {
        $wiv = Wiv::findOrFail($wiv_id);
        $wiv->update(['received_at' => now()]);
        return redirect()->back()->with('success','Accountability accepted');
    }

    public function showMrt(){
        $user_id = Auth::id();
        $mrtRequest = Mrt::whereNull('approved_at')->where('user_id',$user_id)->get();
        $wiv = Wiv::whereNotNull('received_at')->where('user_id',$user_id)->get();
        $mrt = Mrt::whereNotNull('approved_at')->where('user_id',$user_id)->get();

        return view('employee/mrt', compact('mrt','mrtRequest','wiv'));
    }

    public function storeMrt(Request $request)
    {
        $user_id = Auth::id();
        $items = $request->input('item');
        $quantity = $request->input('quantity');

        $mrt = new Mrt;
        $mrt->user_id = $user_id;
        $mrt->date = Carbon::now();
        $mrt->save();

        for ($i = 0; $i < count($items); $i++) {
            $item_id = $items[$i];
            $item = Itemwiv::where('item_id', $item_id)->first();
            $quantityInput = $quantity[$i];

            if ($quantityInput > $item->quantity) {
                return redirect()->back()->with('error', 'The input quantity is greater than the available quantity.');
            }

            $item->mrt_id = $mrt->id;
            $item->returned_qty = $quantityInput;
            $item->save();
        }
    }
}
