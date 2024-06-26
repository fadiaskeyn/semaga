<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::all();
        return view('admin.ManageMapel.index', compact('mapels'));
    }

    public function create()
    {
        return view('admin.ManageMapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel' => 'required',
        ]);

        Mapel::create([
            'mapel' => $request->mapel
        ]);

        $mapels = new Mapel([
            'mapel' => $request->input('mapel'),
        ]);

        $mapels->save();

        return redirect(route('mapels.index'))->with('success', 'Berhasil menambahkan data mapel');
    }

    public function edit(string $id)
    {
        $mapels = Mapel::find($id);
        // dd($mapels);

        return view('admin.ManageMapel.edit', compact(['mapels']));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'mapel' => 'required',
        ]);

        $mapels = Mapel::find($id);

        $mapels->update([
            'mapel' => $request->mapel,
        ]);

        return redirect(route('mapels.index'))->with('success', 'Mapel berhasil diperbarui');       //
    }

    public function destroy(string $id)
    {
        $mapels = Mapel::find($id);
        if (! $mapels) {
            return redirect()->route('mapels.index')->with('error', 'Gagal menghapus mapel');
        }

        $mapels->delete();

        return redirect(route('mapels.index'))->with('success', 'Mapel berhasil dihapus!');
    }
}
