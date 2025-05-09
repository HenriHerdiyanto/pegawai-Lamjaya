<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = "kecamatans";
    protected $fillable = [
        "kode",
        "name",
        "status",
    ];
}
