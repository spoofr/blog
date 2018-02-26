<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'email' => 'required|email'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);
        $profile = Profile::create([ // Create new Profile for user. only pass user_id for relay
            'user_id' => $user->id,
            'avatar' => 'images/avatars/avatar.jpg'
        ]);
        Session::flash('success', 'User added successfully');
        return redirect()->route('user.index');
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        Session::flash('success', 'Successfully changed user roles');
        return redirect()->route('user.index');
    }

    public function revokeAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        Session::flash('success', 'Successfully changed user roles');
        return redirect()->route('user.index');
    }
}
