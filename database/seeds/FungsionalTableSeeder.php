<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class FungsionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/fungsional.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('fungsional')->insert([
                'id' => $record['id'],
                'nama' => $record['nama'],
            ]);
        }
    }
}
