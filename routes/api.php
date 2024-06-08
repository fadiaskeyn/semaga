<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApimuridController;
use App\Http\Controllers\Api\ApiUjianController;
use App\Http\Controllers\QuizreadyController;
use App\Models\Quizready;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Ini route autentikasi kek login dll
Route::post('register', [ApimuridController::class,'register'])->name('api_regis');
Route::post('login', [ApimuridController::class,'login'])->name('api_login');
Route::post('logout', [ApimuridController::class,'logout'])->name('api_logout')->middleware('auth:sanctum');


//ini route buat ujian dan lainnya, jangan di campur ajgggg
Route::middleware('auth:sanctum')->group(function () {
Route::get('student/{$id}', [ApimuridController::class,'student']);
Route::get('quiz',[ApiUjianController::class,'getUjian']); //api untuk di dashboard
Route::post('quiz/send', [ApiUjianController::class,'sendresult'])->name('user');
Route::get('/quiz/quizready', [ApiUjianController::class,'getreadyquiz'])->name('quizready.get');
Route::post('/question', [ApiUjianController::class,'getSoal'])->name('getsoal');

});



