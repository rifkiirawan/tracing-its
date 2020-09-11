<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class KelurahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/kelurahan.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('kelurahan')->insert([
                'id' => $record['id'],
                'nama' => $record['nama'],
                'kecamatan_id' => $record['kecamatan_id'] == 'NULL' ? null : $record['kecamatan_id'],
                'latitude' => $record['latitude'] == 'NULL' ? null : $record['latitude'],
                'longitude' => $record['longitude'] == 'NULL' ? null : $record['longitude'],
            ]);
        }
    }
}
