<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = "provinsis";
    protected $fillable = [
        "kode",
        "name",
        "status",
    ];
    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class, 'id_provinsi');
    }
}
