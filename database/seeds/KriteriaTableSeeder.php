<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/kriteria.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('kriteria')->insert([
                'id' => $record['id'],
                'nama' => $record['nama'],
                'deskripsi' => $record['deskripsi'],
            ]);
        }
    }
}
