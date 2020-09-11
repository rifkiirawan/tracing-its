<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class DepartemenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/departemen.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('departemen')->insert([
                'id' => $record['id'],
                'nama' => $record['nama'],
                'fakultas_id' => $record['fakultas_id'] == 'NULL' ? null : $record['fakultas_id'],
                'jenis' => $record['jenis']== 'NULL' ? null : $record['jenis'],
            ]);
        }
    }
}
