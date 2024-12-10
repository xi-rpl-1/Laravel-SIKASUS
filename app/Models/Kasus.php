<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{

    protected $table = 'kasus';
    protected $fillable = ['judul', 'deskripsi', 'tanggal'];


    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }

}
