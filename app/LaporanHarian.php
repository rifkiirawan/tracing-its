<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanHarian extends Model
{
    protected $table = "laporanharian";

    protected $fillable = [
        'tanggal', 'kasus_id', 'kriteria_id', 'suhu', 'catatan_its', 'catatan_eksternal', 'gejala', 'keterangan', 'pemantau_id'
    ];
}
