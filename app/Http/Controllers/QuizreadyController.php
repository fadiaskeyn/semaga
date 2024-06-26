<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuizReadyResource;
use App\Models\Mapel;
use App\Models\Question;
use App\Models\Quizready;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizreadyController extends Controller
{
    public function view($quiz_id)
    {
        $mapel = Mapel::all();
        $questions = Question::select('id', 'question', 'correct_answer')->get();
        $selectedQuestions = Quizready::where('quiz_id', $quiz_id)->pluck('question_id')->toArray();
        return view('admin.QuizReady.index', compact('questions', 'selectedQuestions', 'mapel', 'quiz_id'));
    }

    
    public function update(Request $request, $quiz_id)
    {
        $quizId = $quiz_id;
        $questionIds = $request->input('questions', []);
        Quizready::where('quiz_id', $quizId)->whereNotIn('question_id', $questionIds)->delete();

        foreach ($questionIds as $questionId) {
            Quizready::firstOrCreate([
                'quiz_id' => $quizId,
                'question_id' => $questionId,
            ]);
        }

        return redirect('admin/ujian/'.$quizId.'/setquestion')->with('success', 'Quiz updated successfully.');
    }


    public function create(){

    }


    public function store(){

    }


}
