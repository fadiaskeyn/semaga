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

        return view('admin.TransgressionRegistry.edit', compact(['data']));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'point' => 'required',
        ]);

        $data = Transgression::find($id);

        $data->update([
            'name' => $request->name,
            'point' => $request->point,
        ]);

        return redirect(route('transgressions.index'))->with('success', 'Pelanggaran berhasil dibuat!');
    }

    public function destroy(string $id)
    {

        $data = Transgression::find($id);
        if (! $data) {
            return redirect()->route('transgressions.index')->with('error', 'Gagal menghapus pelanggaran!');
        }

        $data->delete();

        return redirect(route('transgressions.index'))->with('success', 'Pelanggaran berhasil dihapus!');
    }
}
