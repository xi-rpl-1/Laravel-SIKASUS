<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::with('kelas')->get(); // Mengambil semua siswa beserta informasi kelasnya
        return view('siswa.index', compact('siswa')); // Mengirim data siswa ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all(); // Mengambil semua data kelas untuk dropdown
        return view('siswa.create', compact('kelas')); // Mengirim data kelas ke form create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nisn' => 'required|unique:siswa,nisn|max:20',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'kelas_id' => 'required|exists:kelas,id_kelas', // Pastikan kelas_id ada di tabel kelas
        ]);

        Siswa::create($request->all()); // Menyimpan data siswa baru
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::with('kelas')->findOrFail($id); // Menampilkan data siswa dengan relasi kelas
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // Mencari siswa berdasarkan ID
        $kelas = Kelas::all(); // Mengambil semua data kelas
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nisn' => 'required|unique:siswa,nisn,' . $id . '|max:20',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'kelas_id' => 'required|exists:kelas,id_kelas',
        ]);

        $siswa = Siswa::findOrFail($id); // Menemukan siswa berdasarkan ID
        $siswa->update($request->all()); // Memperbarui data siswa
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id); // Menemukan siswa berdasarkan ID
        $siswa->delete(); // Menghapus data siswa
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }
}
