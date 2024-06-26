<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class BankUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::id();
        $data = Question::select('id','question','correct_answer')->where('created_by',$user)->get();
        return view('admin.BankUjian.index',compact('data'));
    }

    public function create()
    {
        return view('admin.BankUjian.create');
    }

    public function store(Request $request){
        $user = Auth::user()->id;

        $rules = [];
        $questionCount = 1;

        // Loop through each question to set the validation rules
        while ($request->has("question-$questionCount")) {
            $rules["question-$questionCount"] = 'required';
            $rules["option1-$questionCount"] = 'required';
            $rules["option2-$questionCount"] = 'required';
            $rules["option3-$questionCount"] = 'required';
            $rules["option4-$questionCount"] = 'required';
            $rules["option5-$questionCount"] = 'required';
            $rules["correct_answer-$questionCount"] = 'required';
            $questionCount++;
        }
        $validated = $request->validate($rules);

        // Reset the question count
        $questionCount = 1;
        // Loop through each question and save to the database
        while ($request->has("question-$questionCount")) {
            Question::create([
                'question' => $request->input("question-$questionCount"),
                'option1' => $request->input("option1-$questionCount"),
                'option2' => $request->input("option2-$questionCount"),
                'option3' => $request->input("option3-$questionCount"),
                'option4' => $request->input("option4-$questionCount"),
                'option5' => $request->input("option5-$questionCount"),
                'correct_answer' => $request->input("correct_answer-$questionCount"),
                'created_by' => $user,
            ]);
            $questionCount++;
        }
        return redirect('admin/banks')->with('sukses', 'Soal berhasil disimpan');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/question_images');
            $url = Storage::url($path);

            return response()->json(['url' => $url]);
        }
        return response()->json(['error' => 'No image uploaded'], 400);
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
    public function destroy(string $id)
    {
        Question::find($id)->delete();
        return redirect(route('banks.index'))->with('success', 'Data berhasil dihapus !');
    }
}
