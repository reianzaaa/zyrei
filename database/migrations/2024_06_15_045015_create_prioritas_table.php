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
        Schema::create('prioritas', function (Blueprint $table) {
            $table->id();
            
            $table->String('nama_paket');
            $table->String('hari_paket');
            $table->String('id_paket');
            $table->String('harga');
            $table->String('hari');
            $table->String('grup');
            $table->String('hasil');
            $table->String('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prioritas');
    }
};
