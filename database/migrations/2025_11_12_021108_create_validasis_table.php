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
        Schema::create('validasi', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('batch_number');
            $table->decimal('qty', 10, 2);
            $table->string('bin_location_sap')->nullable();
            $table->string('cones')->nullable();
            $table->string('bin_location')->nullable();
            $table->string('remarks')->nullable();
            $table->enum('status', ['saved', 'pending',])->default('pending');
            $table->date('waktu_kembali')->nullable();
            $table->string('Pic')->nullable();
            $table->string('pictimbang')->nullable();
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validasi');
    }
};
