<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile;
use Session;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.users.profile', compact('user'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'twitter' => 'required|url',
            'about' => 'required',
        ]);
        $user = Auth::user();
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $image_file_name = time() . '.' . $avatar->getClientOriginalExtension();
            $image_file_location = public_path('images/avatars/' . $image_file_name);
            Image::make($avatar)->save($image_file_location);
            $user->profile->avatar = $image_file_name; // Tell the database the filename
            $user->profile->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->twitter = $request->twitter;
        if ($request->has('password')) {
            $this->validate($request, [
                'password' => 'confirmed'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $user->profile->save();
        Session::flash('success', 'Profile updated successfully');
        return redirect()->route('home');
    }
}
