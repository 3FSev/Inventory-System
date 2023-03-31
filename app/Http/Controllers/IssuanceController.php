<?php

namespace App\Http\Controllers;

use App\Models\Wiv;
use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;

class IssuanceController extends Controller
{
    public function show(){
        $users = User::where('role_id', 1)->whereNotNull('approved_at')->get();
        $items = Items::where('quantity', '>=', 1)->get();
        $wiv = Wiv::whereNull('received_at')->get();
        $approvedWiv = Wiv::whereNotNull('received_at')->get();

        return view('warehouse/issuance', compact('items', 'users','wiv','approvedWiv'));
    }

    public function test(){
        $users = User::where('role_id', 1)->whereNotNull('approved_at')->get();
        $items = Items::where('quantity', '>=', 1)->get();
        $wiv = Wiv::whereNull('received_at')->get();
        $approvedWiv = Wiv::whereNotNull('received_at')->get();

        return view('test-page', compact('items', 'users','wiv','approvedWiv'));
    }

    public function store(Request $request)
    {
        $user = $request->input('user');
        $wivNumber = $request->input('wiv');
        $wivDate = $request->input('wivDate');
        $rivNumber = $request->input('riv');
        $rivDate = $request->input('rivDate');
        $poNumber = $request->input('po');
        $poDate = $request->input('poDate');
        $rrNumber = $request->input('rr');
        $rrDate = $request->input('rrDate');
        $items = $request->input('item');
        $quantities = $request->input('quantity');

        // Check if the Wiv object is unique
        $wiv = Wiv::find($wivNumber);
        if (!$wiv) {
            // Validate input quantity against item quantity
            $validQuantities = true;
            for ($i = 0; $i < count($items); $i++) {
                $item = Items::findOrFail($items[$i]);
                if ($quantities[$i] > $item->quantity) {
                    $validQuantities = false;
                    break;
                }
            }
            if (!$validQuantities) {
                return redirect()->back()->with('error',' The input quantity is greater than the available quantity in the inventory.');
            }

            $wiv = new Wiv();
            $wiv->user_id = $user;
            $wiv->id = $wivNumber;
            $wiv->wiv_date = $wivDate;
            $wiv->riv = $rivNumber;
            $wiv->riv_date = $rivDate;
            $wiv->po = $poNumber;
            $wiv->po_date = $poDate;
            $wiv->rr = $rrNumber;
            $wiv->rr_date = $rrDate;
            $wiv->save();

            for ($i = 0; $i < count($items); $i++) {
                $item = Items::findOrFail($items[$i]);
                $price = $item->price; // Get the price from the inventory table
                $quantity = $quantities[$i]; // Get the quantity input
                $amount = $price * $quantity; // Calculate the amount

                // Insert into pivot table
                $wiv->items()->attach($wiv->id, [
                    'item_id' => $item->id,
                    'quantity' => $quantity,
                    'amount' => $amount // Add the amount to the pivot table
                ]);

                // Reduce the quantity from the inventory table
                $item->quantity -= $quantity;
                $item->save();
            }

            return redirect()->back();
        }

        return redirect()->back()->with('error', 'The WIV number is already in use.');
    }

    public function removeItem(Request $request)
    {
        $wiv = Wiv::findOrFail($request->user_id);
        $wiv->items()->detach($request->role_id);
        return redirect()->back()->with('success', 'Role removed successfully');
    }
}
