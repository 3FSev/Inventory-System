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
        $users = User::whereNotNull('approved_at')->where('role_id', 1)->get();
        return view('warehouse/employee', compact('users'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:items'
    ], [
        'name.unique' => 'Item name is already in use.',
    ]);

    $item = new Items;
    $item->name = $request->input('name');
    $item->unit = $request->input('unit');
    $item->description = $request->input('description');
    $item->category_id = $request->input('category_id');
    $item->price = $request->input('price');
    $item->quantity = $request->input('quantity');
    $item->save();

    return redirect()->back()->with('success', 'Item created successfully');
}


    public function destroy($id){
        Items::where('id','=',$id)->delete();
        return redirect()->back()->with('warning','Item deleted successfully');
    }

    public function show($id){
        $wiv = Wiv::whereHas('items', function ($query) use ($id) {
            $query->where('item_id', $id);
        })->get();

        $item = Items::find($id);

        return view('warehouse/item', [
            'item' => $item,
            'wivs' => $wiv,
        ]);
    }

    public function showEmployee($id){
        $wivs = Wiv::where('user_id', $id)->whereNotNull('received_at')->get();
        $user = User::find($id);

        return view('warehouse/wiv', compact('wivs','user'));
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
        $item->unit = $request->input('unit');
        $item->save();
        return redirect('items')->with('success', 'Item updated successfully');
    }

}