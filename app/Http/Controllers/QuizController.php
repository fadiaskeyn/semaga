<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(Request $request){
        $data = Quiz::all();
        $edit = Quiz::where('id')->get();
        $durasis = [];

        foreach ($data as $quiz) {
            $start = $quiz->start;
            $end = $quiz->end;

            // Membuat objek Carbon dari waktu start dan end
            $start_time = Carbon::createFromFormat('H:i:s', $start);
            $end_time = Carbon::createFromFormat('H:i:s', $end);

            // Menghitung durasi
            $duration = $end_time->diff($start_time);
            $hours = $duration->h;
            $minutes = $duration->i;

            // Menyimpan durasi dalam format yang diinginkan
            $durasis[] = $hours.' jam '.$minutes.' menit';

            // Membuat objek Carbon untuk waktu saat ini dalam timezone Asia/Jakarta
            $setActive = Carbon::now('Asia/Jakarta');

            // Memeriksa apakah waktu mulai ujian sudah sama dengan waktu saat ini
            if ($quiz->start == $setActive->format('H:i:s')) {
                $quiz->status = 'active';
                $quiz->save(); // Simpan perubahan status
            }
        }

        return view('admin.ManageQuiz.index', compact('data', 'durasis', 'edit'));
    }


    public function create(Request $request){
        $user = Auth::user();
        $status = "off";

        try {
            $request->validate([
                // "title" => "required",
                "tanggal" => "required",
                "course" => "required",
                "jam_ujian" => "required"
            ]);
            $code = str_pad(rand(0, pow(10, 10) - 1), 10, '0', STR_PAD_LEFT);
            $quiz = Quiz::create([
                'title' => $request->title,
                'create_by' => $user->id,
                'code_quiz' => $code,
                'quiz_date' => $request->tanggal,
                'course' => $request->course,
                'start' => $request->jam_ujian,
                'status' => $status,
                'end' => Carbon::parse($request->jam_ujian)->addMinutes($request->duration)
            ]);
            return redirect('/' .$user->role . '/ujian')->with('sukses', 'Berhasil Membuat Ujian');
        } catch(\Exception $e) {

            dd($e->getMessage());
}
    }


    public function edit(){
    }
    public function setOn(string $id){
       $set =  Quiz::findorFail($id);
    $set->status = 'on';
    $set->save();
    }

    public function addquestion(){
        
    }

    public function destroy(string $id){
        try {
            $quiz = Quiz::findOrFail($id);
            $user = Auth::user();
            $quiz->delete();
            return redirect('/' . $user->role . '/ujian')->with('sukses', 'Kuis berhasil dihapus');
        } catch (\Exception $e) {
           dd($e->getMessage());
        }
    }


}
