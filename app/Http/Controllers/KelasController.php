<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Walikelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with('walikelas')->get(); // Load classes with walikelas relationship
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $walikelas = Walikelas::all(); // Get all walikelas for the dropdown
        return view('kelas.create', compact('walikelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'id_walikelas' => 'required|exists:walikelas,id_walikelas',
            'deskripsi' => 'nullable|string',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $walikelas = Walikelas::all(); // Get all walikelas for dropdown
        return view('kelas.edit', compact('kelas', 'walikelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'id_walikelas' => 'required|exists:walikelas,id_walikelas',
            'deskripsi' => 'nullable|string',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
