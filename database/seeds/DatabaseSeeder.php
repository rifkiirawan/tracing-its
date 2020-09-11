<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinsiTableSeeder::class);
        $this->call(KotaTableSeeder::class);
        $this->call(RSTableSeeder::class);
        $this->call(DepartemenTableSeeder::class);
        $this->call(FungsionalTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(KelurahanTableSeeder::class);
        $this->call(KasusTableSeeder::class);
        $this->call(KriteriaTableSeeder::class);
        // $this->call(LabTestTableSeeder::class);
        $this->call(PenggunaTableSeeder::class);
        $this->call(LaporanHarianTableSeeder::class);
    }
}
