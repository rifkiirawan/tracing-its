<?php

namespace App\Http\Controllers;

use App\Kasus;
use App\LaporanHarian;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasus = Kasus::select('kasus.*','departemen.nama as unit','fungsional.nama as posisi','kriteria.nama as kriteria','pengguna.nama as tracing', 'md.maxDate as tanggal')
        ->join('departemen','kasus.departemen_id', '=', 'departemen.id')
        ->join('fungsional','kasus.fungsional_id', '=', 'fungsional.id')
        ->join('pengguna','kasus.timTracing_id', '=', 'pengguna.id')
        ->join('kriteria','kasus.kriteria_akhir_id', '=', 'kriteria.id')
        ->leftJoin( \DB::raw("(select kasus_id, MAX(tanggal) maxDate from laporanharian lh group by kasus_id) as md"), 'kasus.id', '=', 'md.kasus_id')
        ->orderBy('kasus.status_selesai', 'DESC')
        ->orderBy('md.maxdate', 'DESC')
        ->get();

        return view('kasus.index', compact('kasus'));
    }

    public function timeline($id)
    {
        $nama = Kasus::select('nama_lengkap')->Where('id', '=', $id)->get();

        $laporan = LaporanHarian::select('laporanharian.*', 'pengguna.nama as nama_pmt', 'kriteria.nama as kondisi')
        ->join('pengguna', 'laporanharian.pemantau_id', '=', 'pengguna.id')
        ->join('kriteria', 'laporanharian.kriteria_id', '=', 'kriteria.id')
        ->where('laporanharian.kasus_id', '=', $id)
        ->orderBy('laporanharian.tanggal', 'DESC')
        ->paginate(10);

        return view('kasus.timeline', compact('nama', 'laporan'));
    }
}
