<?php

namespace App\Http\Controllers;

use App\Kasus;
use App\LaporanHarian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $terakhir = LaporanHarian::max('tanggal');

        $odp1 = Kasus::where('kriteria_akhir_id', 1)->count('id');
        $odp2 = Kasus::where('kriteria_akhir_id', 2)->count('id');
        $odp3 = Kasus::where('kriteria_akhir_id', 3)->count('id');
        $odp4 = Kasus::where('kriteria_akhir_id', 4)->count('id');

        $pdp1 = Kasus::where('kriteria_akhir_id', 5)->count('id');
        $pdp2 = Kasus::where('kriteria_akhir_id', 6)->count('id');
        $pdp3 = Kasus::where('kriteria_akhir_id', 7)->count('id');

        $pos1 = Kasus::where('kriteria_akhir_id', 8)->count('id');
        $pos2 = Kasus::where('kriteria_akhir_id', 9)->count('id');
        $pos3 = Kasus::where('kriteria_akhir_id', 10)->count('id');
        $pos4 = Kasus::where('kriteria_akhir_id', 11)->count('id');

        $otg1 = Kasus::where('kriteria_akhir_id', 12)->where('status_selesai', 1)->count('id');
        $otg2 = Kasus::where('kriteria_akhir_id', 12)->where('status_selesai', 0)->count('id');

        $rinci = Kasus::select('kasus.nama_inisial as inisial', 'kasus.alamat_ktp as alamat', 'kriteria.nama as status', 'departemen.nama as unit', 'fungsional.nama as posisi', 'kasus.usia as usia', 'kasus.long_ktp', 'kasus.lat_ktp')
        ->where('kasus.status_selesai', '=', 1)
        ->join('kelurahan', 'kasus.kelurahan_id', '=', 'kelurahan.id')
        // ->join('kecamatan', 'kasus.kecamatan_id', '=', 'kecamatan.id') -> kecamatan_id still null
        ->join('kriteria', 'kasus.kriteria_akhir_id', '=', 'kriteria.id')
        ->join('departemen', 'kasus.departemen_id', '=', 'departemen.id')
        ->join('fungsional', 'kasus.fungsional_id', '=', 'fungsional.id')
        ->get();

        return view('kondisiterkini', compact(
            'terakhir',
            'odp1', 'odp2', 'odp3', 'odp4',
            'pdp1', 'pdp2', 'pdp3',
            'pos1', 'pos2', 'pos3', 'pos4',
            'otg1', 'otg2',
            'rinci'
        ));
    }
}
