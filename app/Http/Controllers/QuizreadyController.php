<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuizReadyResource;
use App\Models\Quizready;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizreadyController extends Controller
{
    public function view()
    {
        $data = Quizready::get();
        return view('admin.QuizReady.index', compact('data'));
    }


    public function create(){

    }


    public function store(){

    }


}
