<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(){
        $item_list = items::all();
        return view('items', compact('item_list'));
    }

    public function store(Request $request){
        $formField = $request->validate([
            'item_name' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        Items::create($formField);

        return redirect('items');
    }

    public function destroy(Items $items){
        return $items;
    }
}