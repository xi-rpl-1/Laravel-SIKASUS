<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class WalikelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('walikelas')->insert([
            [
                'nama_walikelas' => 'Ibrahim Mallombassang',
                'nip' => '1234567890',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Ince Nurdin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_walikelas' => 'Saleh Burhan',
                'nip' => '111222333',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Ince Nurdin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_walikelas' => 'Andi Tenri',
                'nip' => '123456789',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Ince Nurdin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
