<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class KasusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/kasus.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('kasus')->insert([
                'id' => $record['id'],
                'nama_lengkap' => $record['nama_lengkap'],
                'nama_inisial' => $record['nama_inisial'],
                'kode_kasus' => $record['kode_kasus'] == 'NULL' ? null : $record['kode_kasus'],
                'alamat_ktp' => $record['alamat_ktp'],
                'kelurahan_id' => $record['kelurahan_id'],
                'kecamatan_id' => $record['kecamatan_id'] == 'NULL' ? null : $record['kecamatan_id'],
                'alamat_domisili' => $record['alamat_domisili'],
                'kelurahanDomisili_id' => $record['kelurahanDomisili_id'] == 'NULL' ? null : $record['kelurahanDomisili_id'],
                'kecamatanDomisili_id' => $record['kecamatanDomisili_id'] == 'NULL' ? null : $record['kecamatanDomisili_id'],
                'NIK' => $record['NIK'] == 'NULL' ? null : $record['NIK'],
                'nomor_telp' => $record['nomor_telp'] == 'NULL' ? null : $record['nomor_telp'],
                'jenis_kelamin' => $record['jenis_kelamin'],
                'usia' => $record['usia'] == 'NULL' ? null : $record['usia'],
                'tanggal_lahir' => $record['tanggal_lahir'] == 'NULL' ? null : $record['tanggal_lahir'],
                'tempat_lahir' => $record['tempat_lahir'],
                'fungsional_id' => $record['fungsional_id'],
                'departemen_id' => $record['departemen_id'],
                'timTracing_id' => $record['timTracing_id'],
                'long_ktp' => $record['long_ktp'] == 'NULL' ? null : $record['long_ktp'],
                'lat_ktp' => $record['lat_ktp'] == 'NULL' ? null : $record['lat_ktp'],
                'long_domisili' => $record['long_domisili'] == 'NULL' ? null : $record['long_domisili'],
                'lat_domisili' => $record['lat_domisili'] == 'NULL' ? null : $record['lat_domisili'],
                'status_selesai' => $record['status_selesai'],
                'kriteria_akhir_id' => $record['kriteria_akhir_id'],
                'email' => $record['email'],
                'password' => $record['password'],
                'status_kasus' => $record['status_kasus'] == 'NULL' ? null : $record['status_kasus'],
                'created_at' => $record['created_at'],
                'updated_at' => $record['updated_at'],
            ]);
        }
    }
}
