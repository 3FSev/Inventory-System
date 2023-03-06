<?php

namespace App\Http\Controllers;

use App\Models\Itemwiv;
use App\Models\Wiv;
use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;

class IssuanceController extends Controller
{
    public function show(){
        $users = User::where('role_id', 3)->get();
        $items = Items::all();
        $wiv = Wiv::all();

        return view('warehouse/issuance', compact('items', 'users','wiv'));
    }

    public function store(Request $request)
    {
        $wivNumber = $request->input('wiv');
        $user = $request->input('user');
        $items = $request->input('item');
        $quantities = $request->input('quantity');

        // Find or create the Wiv object
        $wiv = Wiv::find($wivNumber);
        if (!$wiv) {
            $wiv = new Wiv();
            $wiv->id = $wivNumber;
        }
        $wiv->user_id = $user;
        $wiv->save();

        for ($i = 0; $i < count($items); $i++) {
            $item = Items::findOrFail($items[$i]);
            // Insert into pivot table
            $wiv->items()->attach($wiv->id, ['item_id' => $item->id, 'quantity' => $quantities[$i]]);
        }

        return redirect('issuance');
    }
}
