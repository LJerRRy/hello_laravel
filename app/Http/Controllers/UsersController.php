<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;

class UsersController extends Controller
{
    //
    public function create()
    {
        # code...
        return view('users.create');
    }
    public function show(User $user)
    {
        # code...
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        # code...
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');

        return redirect()->route('users.show', [$user]);
    }
}
