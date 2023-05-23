<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    // show login form 
    public function showLogin()
    {
        return view('admin/login');
    }
    // login 
    public function login(Request $request)
    {
        // validation 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // logging in
        $credentials = $request->only('email', 'password');
        
        $login = auth('admin')->attempt($credentials);

        if ($login) {
            // login successful
            return redirect(route('admin.dashboard'));
        }else {
            // login failed
            return back();
        }

    }
    // logout
    public function logout()
    {
        auth('admin')->logout();
        return redirect('admin/login');
    }
    
}
