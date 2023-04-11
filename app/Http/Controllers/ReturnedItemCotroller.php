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
    public function  showList(){
        $user = Auth::id();
        $mrt = Mrt::where('user_id', $user)->whereNotNull('approved_at')->get();
        return view('employee/employee-mrt', compact('mrt'));
    }

    public function  requestMrt(){
        $user_id = Auth::id();
        $mrt = Mrt::where('user_id', $user_id)->whereNull('approved_at')->get();
        $items = Items::whereHas('wivs', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })
        ->distinct()
        ->get();
        return view('employee/mrt', compact('mrt','items'));
    }

    public function storeMrt(Request $request)
    {
        $user_id = Auth::id();
        $items = $request->input('item');
        $quantities = $request->input('quantity');

        $mrt = new Mrt;
        $mrt->user_id = $user_id;
        $mrt->save();

        for ($i = 0; $i < count($items); $i++) {
            $item_id = $items[$i];
            $item = Items::find($item_id);

            $price = $item->price;
            $quantity_to_return = $quantities[$i];
            $amount = $price * $quantity_to_return;

            // Insert into pivot table
            $mrt->items()->attach($item_id, [
                'quantity' => $quantity_to_return,
                'amount' => $amount
            ]);
        }

        return redirect()->back()->with('success', 'MRT Ticket Created');
    }
}
