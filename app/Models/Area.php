<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = 'area';
    protected $fillable = ['nama_area', 'kode_area'];

    public function aset()
    {
        return $this->hasMany(Aset::class);
    }
}
