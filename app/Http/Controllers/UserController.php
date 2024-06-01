<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('admin.ManageUsers.index', compact('users'));
    }

    public function create()
    {
        return view('admin.ManageUsers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required',
            'role' => 'required|in:user,admin',
            'status' => 'required|in:active,inactive',
        ]);

        $users = new User([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);
        $users->save();

        return redirect(route('users.index'))->with('success', 'User berhasil dibuat!');
    }


    public function edit(string $id)
    {
        $users = User::find($id);

        return view('admin.ManageUsers.edit', compact(['users']));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        $users = User::find($id);

        $users->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect(route('users.index'))->with('success', 'User berhasil diperbaharui!');       //
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();

        return redirect(route('users.index'))->with('success', 'User berhasil dihapus !');       //
    }
}
