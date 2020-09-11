<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kasus extends Model
{
    use SoftDeletes;

    protected $table = "kasus";

    protected $fillable = [
        'nama_lengkap','nama_inisial','kode_kasus','alamat_ktp','kelurahan_id','kecamatan_id','alamat_domisili','kelurahanDomisili_id',
        'kecamatanDomisili_id','NIK','nomor_telp','jenis_kelamin','usia','tanggal_id','tempat_lahir','tempat_lahir','fungsional_id','departemen_id',
        'timTracing_id','long_ktp','lat_ktp','long_domisili','lat_domisili','status_selesai','kriteria_akhir_id','email','status_kasus','updated_at'
    ];

    protected $hidden = [
        'password'
    ];

    protected $dates = ['deleted_at'];
}
