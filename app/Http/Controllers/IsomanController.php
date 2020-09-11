<?php

namespace App\Http\Controllers;

use App\Kasus;
use App\LaporanHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsomanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = LaporanHarian::select('laporanharian.*', 'pengguna.nama as nama_pmt', 'kriteria.nama as kondisi')
        ->join('pengguna', 'laporanharian.pemantau_id', '=', 'pengguna.id')
        ->join('kriteria', 'laporanharian.kriteria_id', '=', 'kriteria.id')
        ->where('laporanharian.kasus_id', '=', Auth::user()->id)
        ->orderBy('laporanharian.tanggal', 'DESC')
        ->paginate(10);

        return view('isoman.index', compact('laporan'));
    }
}
