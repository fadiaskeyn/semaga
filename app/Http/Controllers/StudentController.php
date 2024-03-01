<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Database\Seeders\students;
use App\models\student;

class StudentController extends Controller
{
    public function index(){
      return view('pages.students.index');
    }

    public function create(){
        return view('pages.students.create');
    }


    public function store(Request $request){
        // Validasi data formulir
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'NIS' => 'required|numeric|unique:students,NIS',
            'nomer_hp' => 'required|numeric',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);
    
        // Jika validasi berhasil, simpan data ke database
        student::create([
            'nama' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
            'NIS' => $request->input('NIS'),
            'nomer_hp' => $request->input('nomer_hp'),
            // Tambahkan kolom lainnya sesuai kebutuhan
        ]);
    
        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('students.index')->with('success', 'Data mahasiswa berhasil disimpan.');
    }


    public function update(Request $request, $id){
        //function update data
    }

    public function destroy($id){

        // function delete data
    }

}