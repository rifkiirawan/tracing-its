<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class LaporanHarianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/laporanharian.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('laporanharian')->insert([
                'id' => $record['id'],
                'tanggal' => $record['tanggal'],
                'kasus_id' => $record['kasus_id'],
                'kriteria_id' => $record['kriteria_id'],
                'suhu' => $record['suhu'] == 'NULL' ? null : $record['suhu'],
                'catatan_its' => $record['catatan_its'],
                'catatan_eksternal' => $record['catatan_eksternal'],
                'gejala' => $record['gejala'],
                'keterangan' => $record['keterangan'],
                'pemantau_id' => $record['pemantau_id'],
            ]);
        }
    }
}
