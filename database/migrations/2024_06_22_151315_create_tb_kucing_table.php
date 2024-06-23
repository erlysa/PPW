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
        Schema::create('tb_kucing', function (Blueprint $table) {
            $table->id('kode_kucing');
            $table->string('id_kucing');
            $table->string('nama_kucing');
            $table->string('jenis_kelamin');
            $table->string('ras_kucing');
            $table->float('berat_badan');
            $table->string('status_kesehatan');
            $table->string('foto_kucing')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kucing');
    }
};
