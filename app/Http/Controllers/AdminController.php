<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()
                ->withErrors(['email' => 'Email not found'])
                ->withInput();
        }
        if($request->password != $admin->password){
            return back()
                ->withErrors(['password' => 'Incorrect password'])
                ->withInput();
        }
        Session::put('admin', $admin->id);
        Session::put('admin_name', $admin->name);


        return redirect()->route('dashboard');
    }
    
}
