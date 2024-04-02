<?php

namespace App\Http\Controllers;

use App\Models\Transgression;
use Illuminate\Http\Request;

class TransgressionController extends Controller
{
    public function index()
    {
        $data = Transgression::all();

        return view('admin.TransgressionRegistry.index', compact(['data']));
    }

    public function create()
    {

        return view('admin.TransgressionRegistry.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'point' => 'required',
        ]);

        $transgressions = new Transgression([
            'name' => $request->input('name'),
            'point' => $request->input('point'),
        ]);

        $transgressions->save();

        return redirect(route('transgressions.index'))->with('success', 'Pelanggaran berhasil dibuat!');
    }

    public function edit(string $id)
    {
        $data = Transgression::find($id);
        dd($data);

        return 'edit';
    }

    public function update(Request $request, string $id)
    {

        return 'update';
    }

    public function destroy(string $id)
    {

        return 'destroy';
    }
}
