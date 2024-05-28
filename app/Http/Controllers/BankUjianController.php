<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.BankUjian.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.BankUjian.createBank');

        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'nama' => 'required',
        //     'deskripsi' => 'required',
        //     // tambahkan validasi lainnya sesuai kebutuhan
        // ]);

        // BankUjian::create($request->all());

        // return redirect()->route('bank_ujian.index')
        //     ->with('success', 'Bank ujian berhasil dibuat.');

        //

    }

    /**
     * Display the specified resource.
     */
    public function show(BankUjianController $bankUjianController)
    {

        return view('admin.BankUjian.show', compact('bankUjian'));

        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankUjianController $bankUjianController)
    {

        return view('admin.BankUjian.edit', compact('bankUjian'));

        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankUjianController $bankUjianController)
    {

        // $request->validate([
        //     'nama' => 'required',
        //     'deskripsi' => 'required',
        //     // tambahkan validasi lainnya sesuai kebutuhan
        // ]);

        // $bankUjian->update($request->all());

        // return redirect()->route('bank_ujian.index')
        //     ->with('success', 'Bank ujian berhasil diperbarui.');

        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankUjianController $bankUjianController)
    {

        // $bankUjian->delete();

        // return redirect()->route('bank_ujian.index')
        //     ->with('success', 'Bank ujian berhasil dihapus.');
    }
}


