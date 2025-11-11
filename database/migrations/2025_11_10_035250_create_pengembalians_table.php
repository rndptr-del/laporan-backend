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
        Schema::create('pengembalian', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal_timbang')->nullable();
        $table->date('tanggal_pengembalian')->nullable();
        $table->date('tanggal_transfer')->nullable();
        $table->float('qty_kg')->nullable();
        $table->integer('qty_kantong')->nullable();
        $table->string('pic')->nullable();
        $table->string('shif')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
