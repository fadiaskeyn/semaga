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
        return view('admin.ManageStudents.create-student');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'grade' => 'required|in:X,XI,XII',
            'gender' => 'required|in:L,P',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $existingStudent = Student::where('nis', $request->input('nis'))->first();

        if ($existingStudent) {
            return redirect()->back()->withInput()->with('error', 'NIS tidak digunakan!');
        }
        $student = new Student([
            'nis' => $request->input('nis'),
            'name' => $request->input('name'),
            'grade' => $request->input('grade'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $student->save();

        return redirect(route('student.index'))->with('success', 'Akun murid berhasil dibuat!');
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
