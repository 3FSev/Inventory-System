<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(){
        $item_list = items::all();
        $category = Category::pluck('name', 'id');
        return view('warehouse/items', compact('item_list'), ['category' => $category]);
    }

    public function users(){
        $users = User::with('role', 'department')->get();
        return view('warehouse/employee', compact('users'));
    }

    public function store(Request $request){
        $formField = $request->validate([
            'item_name' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        Items::create($formField);

        return redirect('items');
    }

    public function destroy($item_id){
        Items::where('item_id','=',$item_id)->delete();
        return redirect('items');
    }

    public function show($item_id){
        return view('warehouse/item', [
            'item' => Items::find($item_id)
        ]);
    }

    public function edit($item_id){
        $category = Category::pluck('name', 'id');
        return view('warehouse/item_edit', [
            'item' => Items::find($item_id),
            'category' => $category
        ]);
    }

    public function update(Request $request, $item_id){
        $item = Items::find($item_id);
        $input = $request->all();
        $item->update($input);
        return redirect('items')->with('flash_message', 'Item updated;');
    }

    public function issuance(){
        return view('warehouse/issuance');
    }

}