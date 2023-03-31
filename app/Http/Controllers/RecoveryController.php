<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;

class RecoveryController extends Controller
{
    public function deletedUsers()
    {
        $users  = User::onlyTrashed()->get();

        return view('admin/recover-user', compact('users'));
    }

    public function recoverDeletedUsers($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();

        return redirect()->back()->with('success','User restored successfully');
    }

    public function deletedItems()
    {
        $items = Items::onlyTrashed()->get();

        return view('admin/recover-item', compact('items'));
    }
    
    public function recoverDeletedItems($id)
    {
        $item = Items::withTrashed()->where('id', $id)->first();
        $item->restore();

        return redirect()->back()->with('success','Item restored successfully');
    }
}
