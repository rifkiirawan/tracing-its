<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class KotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/kota.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('kota')->insert([
                'id' => $record['id'],
                'nama' => $record['nama'],
                'provinsi_id' => $record['provinsi_id'],
                'longitude' => $record['longitude'] == 'NULL' ? null : $record['longitude'],
                'latitude' => $record['latitude'] == 'NULL' ? null : $record['latitude'],
            ]);
        }
    }
}
