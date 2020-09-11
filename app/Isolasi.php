<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isolasi extends Model
{
    protected $table = "isolasi";

    protected $fillable = [
        'kasus_id', 'tempat', 'RS_id', 'alamat', 'kota_id', 'long', 'lat', 'tanggal_mulai', 'tanggal_selesai'
    ];
}
