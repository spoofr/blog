<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.settings', compact('setting'));
    }

    public function update(request $request) 
    {
        $this->validate($request, [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email',
            'address' => 'required',
        ]);
        $setting = Setting::first();
        $setting->site_name = request()->site_name; // Using the request() method instead of $request
        $setting->contact_email = request()->contact_email;
        $setting->contact_number = request()->contact_number;
        $setting->address = request()->address;
        $setting->save();
        Session::flash('success', 'Setting updated successfully');
        return redirect()->route('dashboard');
    }
}
