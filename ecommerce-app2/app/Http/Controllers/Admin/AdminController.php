<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // show dashboard 
    public function dashboard()
    {
        return view('admin/dashboard');
    } 
}