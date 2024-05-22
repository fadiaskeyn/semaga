<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data  = Question::all();
        // dd($data);
        return view('admin.ManageQuestion.index', compact('data'));
    }

    public function create(Request $request){
        Question::all();
        $options = [];
        try{
            $request->validate([
                "question" => "required",
                "option_id" => "required"
            ]);

            Question::create([
                'question' => $request->question,
                    'options' => $request->option[$options],
                    'quiz_id' => $request->quiz_id,
                    'correct_answer' => $request->correct_answer,
                    'score' => $request->score,
            ]);
            return redirect('/admin/soal')->with('sukses', 'Berhasil Menambahkan Soal');
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
