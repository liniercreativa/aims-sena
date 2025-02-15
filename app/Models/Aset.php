<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    //
    protected $table = 'aset'; // Explicitly set the table name

    protected $fillable = [
        'area_id',
        'cluster_id',
        'lokasi',
        'jenis_aset',
        'tahun_dibuat',
        'status',
        'distrik',
        'dimensi',
        'lokasi_bentang',
        'jenis_peralatan',
        'tag_number',
        'serial_number',
        'kodeaset',

    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function inspeksi()
    {
        return $this->hasMany(Inspeksi::class);
    }
}
