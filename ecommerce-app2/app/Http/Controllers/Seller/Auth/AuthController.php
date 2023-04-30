<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // get form login
    public function showLogin()
    {
        return view('seller/auth/login');
    }
    //  login
    public function login(Request $request)
    {
        //validation 
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validate)
        {
            $credentials = $request->only('email' ,'password');

            $login = auth('seller')->attempt($credentials);

            if ($login) {
                $user = Auth::guard('seller')->user();
                return redirect()
                    ->route('seller_dashboard')
                    // ->with('success','logged in successfully')
                    ->with(compact('user'));
            }else{
                return redirect()->back()->with('fail' , 'email and password  not matching');
            }
        }else{
            return redirect()->back()->with('fail' , 'email and password  not matching');
        }
        
    }

    // get register form 
    public function showRegister()
    {
        return view('seller/auth/register');
    }
    // registration
    public function register(Request $request)
    {
        //validation 
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        //store data to table seller

        $seller = Seller::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        if($seller)
        {
            return redirect('seller/login')->with('success' ,'registration successfully');
        }else{
            return redirect()->back()->with('fail', 'something error');
        }
    }

    // --- logout
    public function logout()
    {
        auth('seller')->logout();
        return redirect()->route('show_login');
    }

    
    public function dashboard()
    {
        return view('seller/dashboard');
    }

   
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
