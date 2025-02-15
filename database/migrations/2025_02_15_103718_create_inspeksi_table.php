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
        Schema::create('inspeksi', function (Blueprint $table) {
            $table->id();


            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); //yang membuat inspeksi
            $table->foreignId('aset_id')->constrained('aset')->cascadeOnDelete();
            $table->date('tanggal_jadwal_inspeksi');
            $table->date('tanggal_inspeksi');
            $table->enum('resiko', ['insignificant', 'minor', 'moderate', 'significant', 'catastrophic']);
            $table->longText('rekomendasi')->nullable();
            $table->enum('status', ['terjadwal', 'selesai', 'dibatalkan', 'dikerjakan'])->default('terjadwal');
            $table->longText('keterangan_dibatalkan')->nullable();


            //PIMS
            $table->integer('ketebalan_pipa')->nullable();
            $table->integer('kondisi_coating')->nullable();
            $table->integer('kondisi_penyangga')->nullable();
            $table->integer('korosi_external')->nullable();
            $table->integer('korosi_internal')->nullable();
            $table->integer('tekanan_operasi')->nullable();
            $table->integer('temperatur_operasi')->nullable();
            $table->integer('lokasi_pipa')->nullable();
            $table->integer('kondisi_lingkungan')->nullable();
            $table->integer('history_perbaikan')->nullable();
            $table->integer('usia_instalasi')->nullable();


            //RBI
            $table->integer('usia_peralatan')->nullable();
            $table->integer('laju_korosi')->nullable();
            $table->integer('kondisi_coating_rbi')->nullable();
            $table->integer('korosi_bagian_dasar')->nullable();
            $table->integer('kondisi_lingkungan_rbi')->nullable();
            $table->integer('volume_tangki')->nullable(); ///
            $table->integer('jenis_produk')->nullable();
            $table->integer('dampak_lingkungan')->nullable();
            $table->integer('dampak_bisnis')->nullable();




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspeksi');
    }
};
