<?php

namespace Database\Seeders;

use App\Models\Kasus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KasusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kasus::insert([
            [
                'siswa_id' => 1, // ID siswa (sesuaikan dengan data di tabel siswa)
                'deskripsi_kasus' => 'Deskripsi kasus pertama ini sangat penting.',
                'tanggal_kasus' => '2024-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'siswa_id' => 2, // ID siswa (sesuaikan dengan data di tabel siswa)
                'deskripsi_kasus' => 'Deskripsi kasus kedua mengenai hal menarik.',
                'tanggal_kasus' => '2024-02-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'siswa_id' => 2, // ID siswa (sesuaikan dengan data di tabel siswa)
                'deskripsi_kasus' => 'Deskripsi kasus ketiga yang cukup menantang.',
                'tanggal_kasus' => '2024-03-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
