<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Quizready;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Http\Resources\QuizReadyResource;
use App\Models\Result;

class ApiUjianController extends Controller
{
    public function getUjian(Request $request){
        $data =  Quiz::all();
        $authen = Auth::guard()->user('student');
        if($authen){
        return response()->json([
            'message'=> 'Succes',
            'data'=> $data
        ]);
    }{
        return response()->json([
            'message' => 'Silahkan Login terlebih Dahulu!!',
            'error' => 401,
        ]);
    }
    }

    public function getsoal(Request $request){
        $question = Question::where('quiz_id',$request->quiz_id)->get();
        $authen = Auth::guard()->user('students');
        if($authen){
            return response()->json([
                'message'=> 'succes',
                'data' => $question
            ]);
        }{
            return response()->json([
                'message' => 'Silahkan Login Dulu',
                'error' => 401
            ]);
        }
    }

    public function getreadyquiz(Request $request)
{
    $quizzes = Quiz::with('questions')->where('id', $request->input('quiz_id'))->get();
    return response()->json([
        'message' => 'success',
        'data' => QuizResource::collection($quizzes),
    ]);
}

public function sendresult(Request $request){
    $result = Result::create([
        'quiz_id' => $request->quiz_id,
        'student_id' => $request->nis,
        'final_score' => $request->score
    ]);
    return response()->json([
        'message' => 'kwontol',
        'data' => $result
    ]);
}


}
