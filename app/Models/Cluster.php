<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    //
    protected $table = 'cluster';
    protected $fillable = ['nama_cluster', 'kode_cluster'];

    public function aset()
    {
        return $this->hasMany(Aset::class);
    }
}
