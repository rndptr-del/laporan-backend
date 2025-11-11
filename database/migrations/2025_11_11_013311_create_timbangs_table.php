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
        Schema::create('timbang', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_benang_masuk')->nullable();
            $table->date('tanggal_timbang')->nullable();
            $table->float('qty_kg')->nullable();
            $table->float('sudah_ditimbang')->nullable();
            $table->float('sisa')->nullable();
            $table->string('ttl_bng_wrn')->nullable();
            $table->string('pic_timbang');
            $table->string('shif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timbang');
    }
};
