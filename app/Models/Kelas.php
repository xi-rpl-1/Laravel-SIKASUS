<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'id_walikelas',
        'deskripsi',
    ];

    public function walikelas()
    {
        return $this->belongsTo(Walikelas::class, 'walikelas_id');
    }

}
