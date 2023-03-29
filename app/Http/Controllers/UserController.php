<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        $verCount = User::whereNotNull('approved_at')->count();
        $unvCount = User::whereNull('approved_at')->count();
        return view('admin/admin-index', compact('verCount','unvCount'));
    }

    public function index()
    {
        $users = User::whereNull('approved_at')->get();
        return view('admin/unv-user', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);
        return redirect()->back()->with('success','User approved successfully');
    }

    public function destroy($id)
    {
        User::where('id','=',$id)->delete();
        return redirect()->back()->with('warning','User deleted successfully');
    }

    public function verified()
    {
        $user_list = User::whereNotNull('approved_at')->get();
        $department = Department::all();
        return view('admin/ver-user', compact('user_list','department'));
    }

    public function store(Request $request)
    {

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->dept_id = $request->input('department');
        $user->password = bcrypt('ormeco');
        $user->approved_at = now();
        $user->save();

        return redirect()->back()->with('success','User created successfully');
    }
}
