<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserMangeController extends Controller
{
    //

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.user.manage_user', compact('users'));
    }

    public function manageRole($id)
    {
        $user = User::find($id);
        return view('admin.user.manage_role', compact('user'));
    }

    //update role
    public function updateRole(Request $request)
    {
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.manage.user')->with('message', 'User role updated successfully');
    } //end method

    public function deleteUser($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('admin.manage.user')->with('message', 'User Deleted successfully');
    }
}
