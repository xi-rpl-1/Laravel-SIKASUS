<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        $nisn = $request->input('nisn');
        $tanggal_lahir = $request->input('tanggal_lahir');

        $siswa = Siswa::with('kasus')
            ->where('nisn', $nisn)
            ->where('tanggal_lahir', $tanggal_lahir)
            ->get();

        if (!$siswa) {
            return back()->withErrors(['message' => 'Data siswa tidak ditemukan.'])->withInput();
        }

        return view('home', [
            'siswa' => $siswa,
            'success_message' => 'Data ditemukan!',
        ]);
    }

}
