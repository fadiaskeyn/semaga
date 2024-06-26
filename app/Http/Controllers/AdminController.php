<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalMurid = Student::count();
        return view('admin.admin_dashboard', compact('totalUsers', 'totalMurid'));
    }//End Method Dashboard Admin
}
