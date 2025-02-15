<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    //
    protected $table = 'maintenance';
    protected $fillable = ['inspeksi_id', 'user_id', 'tanggal_jadwal_perbaikan', 'tanggal_perbaikan', 'tanggal_selesai', 'status', 'keterangan_dibatalkan'];

    public function inspeksi()
    {
        return $this->belongsTo(Inspeksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
