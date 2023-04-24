<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $department = Department::all();
        $roles = Role::all();

        return view('admin/update-employee', compact('user','department','roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->dept_id = $request->input('department');
        $user->role_id = $request->input('role');
        $password = $request->input('password');
        if (!empty($password)) {
            $user->password = bcrypt($password);
        }
        $user->save();

        return redirect('../ver')->with('info','User information updated');
    }

    public function changePassword()
    {
        return view('theme/change-password');
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => ['required', 'current_password'],
            'new_password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->route('accountability.show')->with('success', 'Password changed successfully.');
    }
}
