<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('walikelas', function (Blueprint $table) {
            $table->id('id_walikelas'); // ID unik untuk setiap wali kelas
            $table->string('nama_walikelas', 100); // Nama wali kelas
            $table->string('nip', 20)->unique()->nullable(); // NIP (opsional dan harus unik)
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Jenis kelamin
            $table->text('alamat')->nullable(); // Alamat (opsional)
            $table->timestamps(); // Waktu pembuatan dan pembaruan data
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walikelas');
    }
};
