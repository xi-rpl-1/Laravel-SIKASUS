<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'nama_lengkap' => 'Muhammad Arifin',
                'nisn' => '123456789',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2006-05-14',
                'alamat' => 'Jl. Anggrek No. 10',
                'kelas_id' => 1, // Mengacu ke id di tabel kelas
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Siti Rahmawati',
                'nisn' => '987654321',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2007-02-21',
                'alamat' => 'Jl. Melati No. 5',
                'kelas_id' => 2, // Mengacu ke id di tabel kelas
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Andi Muh. Raihan Alkawsar',
                'nisn' => '0077865020',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2007-08-01',
                'alamat' => 'Jl. Gunung Bulu Saraung LR 254/12 A',
                'kelas_id' => 3, // Mengacu ke id di tabel kelas
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
