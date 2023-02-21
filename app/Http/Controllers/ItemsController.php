<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(){
        $item_list = items::all();
        return view('warehouse/items', compact('item_list'));
    }

    public function users(){
        $users = User::all();
        return view('warehouse/employee', compact('users'));
    }

    public function employee(){
        return view('warehouse/employee');
    }

    public function store(Request $request){
        $formField = $request->validate([
            'item_name' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        Items::create($formField);

        return redirect('items');
    }

}