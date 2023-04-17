<?php

namespace App\Http\Controllers;

use App\Models\Itemwiv;
use App\Models\Mrt;
use App\Models\Wiv;
use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountabilityController extends Controller
{
    public function show(){
        $user_id = Auth::id();
        $wiv = Wiv::with(['items' => function($query){
            $query->wherePivot('quantity','>=',1);
        }])->whereNotNull('received_at')->where('user_id',$user_id)->get();

        return view('employee/accountability', compact('wiv'));
    }

    public function pending(){
        $user_id = Auth::id();
        $pending = Wiv::whereNull('received_at')->where('user_id',$user_id)->get();

        return view('employee/pending-accountability', compact('pending'));
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

        return view('warehouse/mrt-list', compact('mrt','users'));
    }

    public function mrtTicket(){
        $mrt = Mrt::whereNull('approved_at')->get();
        $users = User::whereNotNull('approved_at')->where('role_id', 1)->get();

        return view('warehouse/mrt-request', compact('mrt','users'));
    }

    public function getItems($id)
    {
        $wivs = Wiv::where('user_id', $id)->pluck('id');
        $items = Items::whereHas('wivs', function ($query) use ($wivs) {
            $query->whereIn('id', $wivs);
        })->get();
        return response()->json($items);
    }

    public function mrtForm($id){
        return view('warehouse/mrt-form', [
            'mrt' => Mrt::find($id)
        ]);
    }

    public function confirmMrt(Request $request){
        $user_id = request('user_id');
        $mrtId = request('mrt_id');
        $usable = $request->input('usable');
        $unusable = $request->input('unusable');
        $mrtNumber = $request->input('mrtNumber');
        $mrtDate = $request->input('mrtDate');
        $items = $request->input('items');

        $mrt = Mrt::findOrFail($mrtId);
        $mrt->mrt_number = $mrtNumber;
        $mrt->mrt_date = $mrtDate;
        $mrt->approved_at = now();
        $mrt->save();

        foreach ($usable as $count => $value) {
            $item_id =  $items[$count];
            $item = Items::find($item_id);
            $itemMrtQuantity = $item->mrt->first()->pivot->quantity;

            // Update the ItemMrt pivot record
            $pivotData = [
                'usable' => $value,
                'unusable' => $unusable[$count]
            ];
            $item->mrt()->updateExistingPivot($mrtId, $pivotData);

             // Add quantity in items
            $item = Items::find($item_id);
            if ($item) {
                $item->quantity += $value;
                $item->save();
            }

            // Get the item_id wiv record based on quantity and date
            $wivs = Wiv::whereHas('items', function($query) use ($item_id) {
                $query->where('item_wiv.item_id', $item_id)->where('item_wiv.quantity', '>', 0);
            })
                ->where('user_id', $user_id)
                ->orderBy('wiv_date', 'asc')
                ->get();

            // Deduct the quantity in item_wiv
            $itemMrtQuantityRemaining = $itemMrtQuantity;
            foreach($wivs as $wiv){
                foreach($wiv->items as $wivItem){
                    if ($wivItem->mrt->contains('id', $mrtId)) {
                        $quantityToDeduct = min($wivItem->pivot->quantity, $itemMrtQuantityRemaining);
                        $wivItem->pivot->update(['quantity' => $wivItem->pivot->quantity - $quantityToDeduct]);
                        $itemMrtQuantityRemaining -= $quantityToDeduct;

                        if ($itemMrtQuantityRemaining <= 0) {
                            break 2;
                        }
                    }
                }
            }
        }
        return redirect()->route('returned.show')->with('success','Materials returned succesfully');

    }



    public function storeMrt(Request $request)
    {
        $user_id = $request->input('user');
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
