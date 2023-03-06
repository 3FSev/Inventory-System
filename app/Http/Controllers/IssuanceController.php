<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use App\Models\Wiv;
use Illuminate\Http\Request;

class IssuanceController extends Controller
{
    public function show(){
        $users = User::where('role_id', 3)->get();
        $items = Items::all();

    return view('warehouse/issuance', compact('items', 'users'));
    }

    public function store(Request $request)
    {
        $wivNumber = $request->input('wiv');
        $user = $request->input('user');
        $items = $request->input('item');
        $quantity = $request->input('quantity');

        $wiv = new Wiv();
        $wiv->id = $wivNumber;
        $wiv->user_id = $user;
        $wiv->save();

        for ($i = 0; $i < count($items); $i++) {
            $item = Items::findOrFail($items[$i]);
            dd($items[$i]);
            // Insert into pivot table
            $wiv->items()->attach($item->id, ['quantity' => $quantity[$i]]);
        }
    }
}
