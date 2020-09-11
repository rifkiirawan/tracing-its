@extends('adminlte::page')

@section('title', 'Daftar Kasus')

@section('content_header')
<h1>Daftar Kasus</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table id="daftar" class="table table-bordered table-striped">
                            <thead>
                                <th>Aksi</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat KTP</th>
                                <th>Kriteria Kasus</th>
                                <th>Nomor Telepon</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia</th>
                                <th>Status di ITS</th>
                                <th>Unit Kerja di ITS</th>
                                <th>Pemantau</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Tanggal Diperbarui</th>
                            </thead>
                            <tbody>
                                @foreach ($kasus as $k)
                                    <tr class="
                                        @if($k->status_selesai === 0)
                                            {{ __('table-dark') }}
                                        @endif
                                    ">
                                        <td>
                                            <a href="/kasus/timeline/{{ $k->id }}" class="btn btn-default btn-sm"><i class='fas fa-calendar-plus'></i> Laporan Harian</a>
                                        </td>
                                        <td>
                                            {{ $k->nama_lengkap }}<br>
                                            @if($k->status_selesai == 0)
                                                {{ __('[Kasus Selesai]') }}
                                            @else
                                                {{ __('[Kasus Aktif]') }}
                                            @endif
                                        </td>
                                        <td>{{ $k->alamat_ktp }}</td>
                                        <td>{{ $k->kriteria }}</td>
                                        <td>{{ $k->nomor_telp }}</td>
                                        <td>{{ $k->jenis_kelamin }}</td>
                                        <td>{{ $k->usia }}</td>
                                        <td>{{ $k->posisi }}</td>
                                        <td>{{ $k->unit }}</td>
                                        <td>{{ $k->tracing }}</td>
                                        <td>{{ $k->NIK }}</td>
                                        <td>{{ $k->email }}</td>
                                        <td>{{ $k->tanggal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#daftar').DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[ 0, "desc" ]]
        });
    });
</script>
@stop
