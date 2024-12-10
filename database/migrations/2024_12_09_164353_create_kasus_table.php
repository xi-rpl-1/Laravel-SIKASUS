<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kasus', function (Blueprint $table) {
            $table->id('id_kasus'); // ID unik untuk setiap kasus
            $table->foreignId('siswa_id')->constrained('siswa', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('deskripsi_kasus'); // Deskripsi kasus
            $table->date('tanggal_kasus'); // Tanggal terjadinya kasus
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasuses');
    }
};
