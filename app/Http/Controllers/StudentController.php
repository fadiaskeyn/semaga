<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        // $students->dd(); -- debug atribute
        return view('admin.ManageStudents.index', compact('students'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {
        //function update data
    }

    public function destroy($id)
    {

        // function delete data
    }
}
