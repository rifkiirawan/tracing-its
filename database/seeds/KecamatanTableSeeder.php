<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class KecamatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/kecamatan.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('kecamatan')->insert([
                'id' => $record['id'],
                'nama' => $record['nama'],
                'kota_id' => $record['kota_id'],
                'latitude' => $record['latitude'] == 'NULL' ? null : $record['latitude'],
                'longitude' => $record['longitude'] == 'NULL' ? null : $record['longitude'],
            ]);
        }
    }
}
