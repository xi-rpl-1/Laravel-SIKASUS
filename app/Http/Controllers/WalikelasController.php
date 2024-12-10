<?php

namespace App\Http\Controllers;

use App\Models\Walikelas;
use Illuminate\Http\Request;

class WalikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walikelas = Walikelas::all();
        return view('walikelas.index', compact('walikelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('walikelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_walikelas' => 'required|string|max:100',
            'nip' => 'nullable|string|max:20|unique:walikelas,nip',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
        ]);

        Walikelas::create($validatedData);

        return redirect()->route('walikelas.index')->with('success', 'Wali kelas berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Walikelas $walikelas)
    {
        return view('walikelas.edit', compact('walikelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Walikelas $walikelas)
    {
        $validatedData = $request->validate([
            'nama_walikelas' => 'required|string|max:100',
            'nip' => 'nullable|string|max:20|unique:walikelas,nip,' . $walikelas->id_walikelas . ',id_walikelas',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
        ]);

        $walikelas->update($validatedData);

        return redirect()->route('walikelas.index')->with('success', 'Data wali kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Walikelas $walikelas)
    {
        $walikelas->delete();

        return redirect()->route('walikelas.index')->with('success', 'Wali kelas berhasil dihapus.');
    }
}
