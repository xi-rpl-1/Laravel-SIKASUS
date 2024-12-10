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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas'); // ID unik untuk setiap kelas
            $table->string('nama_kelas', 50); // Nama kelas (contoh: X-A, XI-B)
            $table->unsignedBigInteger('walikelas_id')->nullable(); // ID wali kelas yang terhubung
            $table->timestamps(); // Waktu pembuatan dan pembaruan data
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
