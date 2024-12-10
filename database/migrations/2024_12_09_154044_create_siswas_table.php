<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap siswa
            $table->string('nama_lengkap', 100); // Nama lengkap siswa
            $table->string('nisn', 20)->unique(); // (NISN) siswa, harus unik
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']); // Jenis kelamin
            $table->date('tanggal_lahir'); // Tanggal lahir siswa
            $table->text('alamat'); // Alamat lengkap siswa
            $table->foreignId('kelas_id')->constrained('kelas','id_kelas'); // ID kelas siswa (relasi ke tabel kelas)
            $table->timestamps(); // Waktu pembuatan dan pembaruan data
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
