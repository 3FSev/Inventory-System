<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Items;
use App\Models\Category;
use App\Models\Wiv;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function dashboard(){
        $itemCount = Items::count();
        $userCount = User::whereNotNull('approved_at')->count();
        return view('warehouse/index', compact('itemCount','userCount'));
    }

    public function index(){
        $item_list = items::all();
        $category = Category::pluck('name', 'id');
        return view('warehouse/items', compact('item_list'), ['category' => $category]);
    }

    public function users(){
        $users = User::whereNotNull('approved_at')->with(['department'])->get();
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

        return redirect()->back()->with('succes','Item created successfully');
    }

    public function destroy($id){
        Items::where('id','=',$id)->delete();
        return redirect()->back()->with('warning','Item deleted successfully');
    }

    public function show($id){
        return view('warehouse/item', [
            'item' => Items::find($id)
        ]);
    }

    public function edit($id){
        $category = Category::pluck('name', 'id');
        return view('warehouse/item_edit', [
            'item' => Items::find($id),
            'category' => $category
        ]);
    }

    public function update(Request $request, $id){
        $item = Items::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->category_id = $request->input('category_id');
        $item->price = $request->input('price');
        $item->quantity = $request->input('quantity');
        $item->save();
        return redirect('items')->with('success', 'Item updated successfully');
    }

}