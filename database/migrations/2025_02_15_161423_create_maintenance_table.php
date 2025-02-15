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
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspeksi_id')->constrained('inspeksi')->cascadeOnDelete(); //yang membuat inspeksi
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); //yang melakukan maintenance
            $table->date('tanggal_jadwal_perbaikan');
            $table->date('tanggal_perbaikan')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['dijadwalkan', 'selesai', 'proses perbaikan', 'dibatalkan'])->default('dijadwalkan');
            $table->text('keterangan_dibatalkan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance');
    }
};
