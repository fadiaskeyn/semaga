<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DOMDocument;

class BankUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::id();
        $data = Question::select('id','question','correct_answer','score')->where('created_by',$user)->get();
        return view('admin.BankUjian.index',compact('data'));
    }

    public function create()
    {
        return view('admin.BankUjian.create');
    }

    public function store(Request $request){
        $user = Auth::user()->id;
        $validator = $request->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'option5' => 'required',
            'correct_answer' => 'required'
        ]);

        Question::create([
            'question' => $request->question,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'option5' => $request->option5,
            'correct_answer' => $request->{$request->correct_answer},
            'created_by' => $user,
            'quiz_id' => 8,
            'score' =>10,
            'score' => 10,
        ]);

        return redirect('admin/banks')->with('sukses', 'Soal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BankUjianController $bankUjianController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankUjianController $bankUjianController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankUjianController $bankUjianController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankUjianController $bankUjianController)
    {
        //
    }
}
