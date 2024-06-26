<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApimuridController extends Controller
{

    public function getData(){
$data = Student::all();
return response()->json($data);
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255|',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = Student::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }


    public function login(Request $request)
    {
        $user = Auth::guard('students')->user();

        if (!$user) {
            if (!Auth::guard('students')->attempt($request->only('nis', 'password'))) {
                return response()->json([
                    'message' => 'Data Tidak Ditemukan'
                ], 401);
            }
            $user = Auth::guard('students')->user();
        }

        // Mengecek apakah pengguna sudah memiliki token sebelumnya
        if ($user->tokens()->count() > 0) {
            $token = $user->tokens()->first()->token;
        } else {
            // Jika pengguna belum memiliki token sebelumnya, maka buat token baru
            $token = $user->createToken('auth_token')->plainTextToken;
        }

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user
        ]);
    }


    public function logout()
    {
        $user = Auth::guard('students')->user();
        if ($user) {
            $user->tokens()->delete();
            return response()->json([
                'message' => 'Logout success'
            ]);
        } else {
            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        }


    }

}
