<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_dashboard');
    }//End Method Dashboard Admin
}
