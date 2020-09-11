<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;

class PenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Reader::createFromPath(database_path('seeds/csv/pengguna.csv'), 'r');
        $records->setDelimiter(',');
        $records->setHeaderOffset(0);

        foreach ($records as $record) {
            DB::table('pengguna')->insert([
                'id' => $record['id'],
                'nama' => $record['nama'],
                'email' => $record['email'],
                'password' => $record['password'] == '1' ? Hash::make('1') : $record['password'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('pengguna')->insert([
            'nama' => 'admin',
            'peran' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pengguna')->insert([
            'nama' => 'user',
            'peran' => 'Tim Tracing',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
