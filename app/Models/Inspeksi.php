<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspeksi extends Model
{
    //
    protected $table = 'inspeksi';
    protected $fillable = [
        'user_id',
        'aset_id',
        'tanggal_jadwal_inspeksi',
        'tanggal_inspeksi',
        'resiko',
        'rekomendasi',
        'status',
        'keterangan_dibatalkan',
        'ketebalan_pipa',
        'kondisi_coating',
        'kondisi_penyangga',
        'korosi_external',
        'korosi_internal',
        'tekanan_operasi',
        'temperatur_operasi',
        'lokasi_pipa',
        'kondisi_lingkungan',
        'history_perbaikan',
        'usia_instalasi',
        'usia_peralatan',
        'laju_korosi',
        'kondisi_coating_rbi',
        'korosi_bagian_dasar',
        'kondisi_lingkungan_rbi',
        'volume_tangki',
        'jenis_produk',
        'dampak_lingkungan',
        'dampak_bisnis',
        'kodeinspeksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }

    public function maintenance()
    {
        return $this->hasOne(Maintenance::class);
    }
}
