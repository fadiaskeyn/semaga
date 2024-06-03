<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApiUjianController extends Controller
{
    public function getUjian(Request $request){
        $data =  Quiz::where('status','active')->get();
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
        $question = Question::where('quiz_id',$request);
        $authen = Auth::guard()->user('students');
        if($authen){
            return response()->json([
                'message'=> 'Sukses',
                'data' => $question
            ]);
        }{
            return response()->json([
                'message' => 'Silahkan Login Dulu',
                'error' => 401
            ]);
        }
    }

}
