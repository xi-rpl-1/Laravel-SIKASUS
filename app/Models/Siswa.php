<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory, Authenticatable;

    protected $table = 'siswa';
    protected $fillable = [
        'nama_lengkap', 'nisn', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'kelas_id'
    ];

    // Relasi dengan kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }

    public function kasus(){
        return $this->belongsTo(Kasus::class,'id_kasus');
    }
}
