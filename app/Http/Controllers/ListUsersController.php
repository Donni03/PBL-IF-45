<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class ListUsersController extends Controller
{
    public function showUser()
    {
        $users = User::simplePaginate(10);
        return view('admin.list_users', compact('users'));
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'last_education' => $request->last_education,
            'position' => $request->position,
            'email' => $request->email,
        ]);

        return redirect()->route('list_users')->with('success', 'User updated successfully');
    }
}
