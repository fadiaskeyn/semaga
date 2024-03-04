<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::orderBy('created_at', 'DESC')->get();
        return view('pages.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi
            $validatedData = $request->validate([
                'nip' => 'required|unique:staffs',
                'name' => 'required',
                'role' => 'required',
                'email' => 'required|email|unique:staffs',
            ]);

            // Simpan data
            Staff::create($validatedData);

            return redirect()->route('pages.staffs.index')->with('success', 'Staff created successfully');
        } catch (\Exception $e) {
            // Tangani kesalahan

            return redirect()->back()->withInput()->withErrors(['error' => 'Error saving data. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $staff = Staff::findOrFail($id);
        return view('pages.staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $staff = Staff::findOrFail($id);
        return view('pages.staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->update($request->all());
        return redirect()->route('pages.staffs.index')->with('success', 'Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect()->route('pages.staffs.index')->with('success', 'Staff deleted successfully');
    }
}
