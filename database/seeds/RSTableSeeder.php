<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class RSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/RS.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('RS')->insert([
                'id' => $record['id'],
                'tipe' => $record['tipe'],
                'nama' => $record['nama'],
                'kota_id' => $record['kota_id'],
                'status_rujukan' => $record['status_rujukan'] == 'NULL' ? null : $record['status_rujukan'],
                'alamat' => $record['alamat'],
            ]);
        }
    }
}
