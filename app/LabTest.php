<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    protected $table = "labtest";

    protected $fillable = [
        'tipe', 'kasus_id', 'tanggal_tes', 'tanggal_hasil', 'hasil', 'tempat'
    ];
}
