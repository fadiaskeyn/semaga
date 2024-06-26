<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Carbon\Carbon;
use App\Models\Quiz;
use App\Models\Quizready;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $ready = Quiz::leftJoin('quizreadies', 'quizzes.id', '=', 'quizreadies.quiz_id')
    ->select('quizzes.id', 'quizzes.title', DB::raw('COALESCE(COUNT(quizreadies.quiz_id), 0) AS count_quizreadies'))
    ->groupBy('quizzes.id', 'quizzes.title')
    ->get();

        $data = Quiz::all();
        $edit = Quiz::where('id')->get();
        $durasis = [];

        foreach ($data as $quiz) {
            $start = $quiz->start;
            $end = $quiz->end;
            $start_time = Carbon::createFromFormat('H:i:s', $start);
            $end_time = Carbon::createFromFormat('H:i:s', $end);
            $duration = $end_time->diff($start_time);
            $hours = $duration->h;
            $minutes = $duration->i;
            $durasis[] = $hours.' jam '.$minutes.' menit';
            $setActive = Carbon::now('Asia/Jakarta');
            if ($quiz->start == $setActive->format('H:i:s')) {
                $quiz->status = 'active';
                $quiz->save(); // Simpan perubahan status
            }
        }
        return view('admin.ManageQuiz.index', compact('data', 'durasis', 'edit','ready'));
    }


    public function create(Request $request)
    {
        $user = Auth::user();
        $status = 'off';
        try {
            $request->validate([
                'tanggal' => 'required',
                'course' => 'required',
                'jam_ujian' => 'required',
            ]);
            $code = str_pad(rand(0, pow(10, 10) - 1), 10, '0', STR_PAD_LEFT);
            $quiz = Quiz::create([
                'title' => $request->title,
                'created_by' => $user->id,
                'code_quiz' => $code,
                'quiz_date' => $request->tanggal,
                'course' => $request->course,
                'start' => $request->jam_ujian,
                'status' => $status,
                'end' => Carbon::parse($request->jam_ujian)->addMinutes($request->duration),
            ]);

            return redirect('/'.$user->role.'/ujian')->with('sukses', 'Berhasil Membuat Ujian');
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }

    public function edit()
    {
    }

    public function setOn(string $id)
    {
        $set = Quiz::findorFail($id);
        $set->status = 'on';
        $set->save();
    }

    public function addquestion()
    {

    }

    public function destroy(string $id)
    {
        try {
            $quiz = Quiz::findOrFail($id);
            $user = Auth::user();
            $quiz->delete();
            return redirect('/'.$user->role.'/ujian')->with('sukses', 'Kuis berhasil dihapus');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

//     public function show_quest_set_on_quiz(string $id){
//         try {
//             $quiz = Quiz::select('id','question','correct_answer',);
// return view('admin.QuizReady.select_quiz', compact('quiz'));
//         } catch (\Exception $e) {
//             dd($e->getMessage());
//         }
//     }


    public function savequestionforquizsousercansetwhereverquestioncansetonquiz(Request $request){
        $quest =  Question::select('question')->where('id',$request)->get();
        dd($quest);
    }
}

