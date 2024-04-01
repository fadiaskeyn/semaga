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
            'nis' => 'required|max:15',
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
        $students = new Student([
            'nis' => $request->input('nis'),
            'name' => $request->input('name'),
            'grade' => $request->input('grade'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $students->save();

        return redirect(route('students.index'))->with('success', 'Akun murid berhasil dibuat!');
    }

    public function edit(string $id)
    {
        $students = Student::find($id);
        // dd($students);

        return view('admin.ManageStudents.edit-student', compact(['students']));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'grade' => 'required|in:X,XI,XII',
            'gender' => 'required|in:L,P',
            'email' => 'required|email',
        ]);

        $students = Student::find($id);

        $students->update([
            'name' => $request->name,
            'grade' => $request->grade,
            'gender' => $request->gender,
            'email' => $request->email,
        ]);

        return redirect(route('students.index'))->with('success', 'Akun berhasil diperbaharui!');       //
    }

    public function destroy(string $id)
    {
        $students = Student::find($id);
        if (! $students) {
            return redirect()->route('students.index')->with('error', 'Gagal menghapus murid!');
        }

        $students->delete();

        return redirect(route('students.index'))->with('success', 'Akun berhasil dihapus!');
    }
}
