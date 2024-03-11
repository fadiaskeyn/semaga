<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.admin_dashboard');
    }//End Method Dashboard Admin
}
