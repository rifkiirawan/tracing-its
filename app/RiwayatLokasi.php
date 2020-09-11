<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatLokasi extends Model
{
    protected $table = "riwayatlokasi";
    protected $fillable = [
        'tanggal', 'tempat', 'kecamatan_id', 'kelurahan_id', 'keperluan', 'longitude', 'lat', 'luarnegeri', 'kasus_id'
    ];
}
