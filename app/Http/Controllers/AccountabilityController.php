<?php

namespace App\Http\Controllers;

use console;
use Carbon\Carbon;
use App\Models\Mrt;
use App\Models\Wiv;
use App\Models\User;
use App\Models\Items;
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
        $mrt = Mrt::whereNotNull('approved_at')->get();
        $users = User::whereNotNull('approved_at')->where('role_id', 1)->get();

        return view('warehouse/mrt-request', compact('mrt','users'));
    }

    public function getItems($id)
    {
        $items = Items::where('id', 2)->first();
        return response()->json($items);
    }



    public function storeMrt(Request $request)
    {
        $user_id = Auth::id();
        $items = $request->input('item');
        $quantities = $request->input('quantity');

        $mrt = new Mrt;
        $mrt->user_id = $user_id;
        $mrt->mrt_date = Carbon::now();
        $mrt->save();

        for ($i = 0; $i < count($items); $i++) {
            $item_id = $items[$i];
            $item = Items::find($item_id);
            $price = $item->price;
            $quantity_to_return = $quantities[$i];
            $amount = $price * $quantity_to_return;

            // Get the related WIVs in ascending order of creation time
            $wivs = $item->wivs()->where('user_id', $user_id)->orderBy('created_at')->get();

            foreach ($wivs as $wiv) {
                // Check if the quantity to be returned is greater than the quantity assigned in this WIV
                if ($quantity_to_return > $wiv->quantity) {
                    // Deduct the quantity assigned in this WIV from the quantity to be returned
                    $quantity_to_return -= $wiv->quantity;
                    $wiv->delete(); // Delete this WIV since it has no more quantity left
                } else {
                    // Deduct the remaining quantity to be returned from this WIV and save it
                    $wiv->quantity -= $quantity_to_return;
                    $wiv->save();
                    break;
                }
            }

            // Update the item quantity in the database
            $item->quantity += $quantity_to_return;
            $item->save();

            // Insert into pivot table
            $mrt->items()->attach($item_id, [
                'quantity' => $quantity_to_return,
                'amount' => $amount
            ]);
        }
    }
}
