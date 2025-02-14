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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained('area')->onDelete('cascade');
            $table->foreignId('cluster_id')->constrained('cluster')->onDelete('cascade');

            $table->text('lokasi')->nullable();
            $table->enum('jenis_aset', ['pipeline', 'vessel', 'tangki timbun']);
            $table->string('tahun_dibuat')->nullable();
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');

            //pipeline
            $table->string('distrik')->nullable();
            $table->string('dimensi')->nullable();
            $table->string('lokasi_bentang')->nullable();

            //Lainnya
            $table->string('jenis_peralatan')->nullable();
            $table->string('tag_number')->nullable();
            $table->string('serial_number')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
