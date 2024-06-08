<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{


        public function index(){
            $result = Result::all();
        return view('admin.Result.index',compact('result'));
        }
}
