<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walikelas extends Model
{
    /** @use HasFactory<\Database\Factories\WalikelasFactory> */
    use HasFactory,Authenticatable;
    protected $table = 'walikelas'; // Table name

    protected $primaryKey = 'id_walikelas'; // Custom primary key

    protected $fillable = [
        'nama_walikelas',
        'nip',
        'jenis_kelamin',
        'alamat',
    ];
}
