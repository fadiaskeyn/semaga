<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApiUjianController extends Controller
{
    public function getUjian(Request $request){
        $data =  Quiz::all();
        $authen = Auth::guard()->user('students');
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

}
