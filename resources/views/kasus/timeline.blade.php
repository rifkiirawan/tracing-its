@extends('adminlte::page')

@section('title', 'Laporan Harian')

@section('content_header')
<h1>Laporan Harian: {{ $nama->first()->nama_lengkap }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row mt-3 mb-5">
                    <div class="col">
                        <a href="/kasus" class="btn btn-primary mx-1">Kembali</a>
                    </div>
                </div>
                <div class="timeline">
                    @if($laporan)
                        @foreach ($laporan as $l)
                            <div>
                                <i class="fas fa-virus
                                    @if($l->kriteria_id == 1 || $l->kriteria_id == 2) {{ __('bg-primary') }}
                                    @elseif($l->kriteria_id == 3) {{ __('bg-success') }}
                                    @elseif($l->kriteria_id == 4) {{ __('bg-secondary') }}
                                    @elseif($l->kriteria_id == 5) {{ __('bg-warning') }}
                                    @elseif($l->kriteria_id == 6) {{ __('bg-success') }}
                                    @elseif($l->kriteria_id == 7) {{ __('bg-secondary') }}
                                    @elseif($l->kriteria_id == 8 || $l->kriteria_id == 9) {{ __('bg-danger') }}
                                    @elseif($l->kriteria_id == 10) {{ __('bg-success') }}
                                    @elseif($l->kriteria_id == 11) {{ __('bg-secondary') }}
                                    @elseif($l->kriteria_id == 12) {{ __('bg-info') }}
                                    @else {{ __('bg-dark') }}
                                    @endif
                                    ">
                                </i>
                                <div class="timeline-item">
                                    <span class="time">
                                        <i class="fas fa-user-circle"></i>
                                        {{ $l->nama_pmt }}
                                    </span>
                                    <h3 class="timeline-header">
                                        <a href="#">{{ date("d/M/Y h:i", strtotime($l->tanggal)) }}</a>
                                        <i>{{ $l->kondisi }}</i>
                                    </h3>

                                    <div class="timeline-body">
                                        <p>
                                            @if($l->suhu)
                                                <b>Suhu Tubuh : </b>{{ $l->suhu }}<br>
                                            @endif
                                            <b>Gejala : </b>{{ $l->gejala }}<br>
                                            <b>Catatan untuk Satgas ITS : </b>{{ $l->catatan_its }}<br>
                                            <b>Catatan untuk Satgas Surabaya atau Jatim : </b>{{ $l->catatan_eksternal }}<br>
                                            <b>Catatan Tambahan/Keterangan Detil :</b> {{ $l->keterangan }}<br>
                                        </p>
                                    </div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-primary btn-sm">Ubah</a>
                                        <a class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="lead"><em>No records were found.</em></p>
                    @endif
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        {{ $laporan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
.vl {
    border-left: 6px solid grey;
    height: 80%;
    position: relative;
    left: 50%;
}
</style>
@stop
