<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{


        public function index(){
            $result = Result::get();
        return view('admin.Result.index',compact('result'));
        }

        public function create(){

        }
}
