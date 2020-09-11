<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontakErat extends Model
{
    protected $table = "kontakerat";

    protected $fillable = [
        'kasus_id', 'kontak_id', 'hubungan', 'tanggal', 'lokasi'
    ];
}
