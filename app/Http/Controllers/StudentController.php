<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index(){
      return view('pages.students.index');
    }

    public function create(){
        // function create data, contoh men ampilkan form
    }


    public function store(Request $request){
        //function isinya eksekusi data dari form
    }


    public function update(Request $request, $id){
        //function update data
    }

    public function destroy($id){

        // function delete data
    }

}

