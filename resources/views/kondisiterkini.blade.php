@extends('adminlte::page')

@section('title', 'Kondisi Terkini')

@section('content_header')
<h1>Kondisi Terkini COVID-19 ITS</h1>
@stop

@section('content')
    <div class="container-fluid">
        <p><i>Pembaruan Data Terakhir : {{ date("d M Y h:i", strtotime($terakhir)) }}</i></p>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $otg1 }}</h3>

                        <h5><strong>OTG/Kontak Erat</strong></h5>
                        <p>
                            Aktif: {{ $otg1 }}<br>
                            Selesai: {{ $otg2 }}<br>
                            <br>
                            <br>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $odp1+$odp2 }}</h3>

                        <h5><strong>ODP</strong></h5>
                        <p>
                            Mandiri: {{ $odp1 }}<br>
                            Dirawat: {{ $odp2 }}<br>
                            Sembuh: {{ $odp3 }}<br>
                            Meninggal: {{ $odp4 }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-universal-access"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>{{ $pdp1 }}</h3>

                        <h5><strong>PDP</strong></h5>
                        <p>
                            Dirawat: {{ $pdp1 }}<br>
                            Sembuh: {{ $pdp2 }}<br>
                            Meninggal: {{ $pdp3 }}<br>
                            <br>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $pos1+$pos2 }}</h3>

                        <h5><strong>Terkonfirmasi</strong></h5>
                        <p>
                            Mandiri: {{ $pos1 }}<br>
                            Dirawat: {{ $pos2 }}<br>
                            Sembuh: {{ $pos3 }}<br>
                            Meninggal: {{ $pos4 }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-virus"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row ml-1 mb-3">
                            <h4>Peta Sebaran Kasus Aktif</h4>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div id="mapid"></div>
                            </div>
                        </div>
                        <div class="row ml-1 mb-3">
                            <h4>Daftar Rincian Kasus pada Peta</h4>
                        </div>
                        <table id="daftar" class="table table-bordered table-striped">
                            <thead>
                                <th>Nama Inisial</th>
                                <th>Usia</th>
                                <th>Kondisi COVID-19</th>
                                <th>Alamat</th>
                                <th>Lintang</th>
                                <th>Bujur</th>
                                <th>Status di ITS</th>
                                <th>Unit Kerja</th>
                            </thead>
                            <tbody>
                                @foreach ($rinci as $r)
                                    <tr>
                                        <td>{{ $r->inisial }}</td>
                                        <td>{{ $r->usia }}</td>
                                        <td>{{ $r->status }}</td>
                                        <td>{{ $r->alamat }}</td>
                                        <td>{{ $r->lat_ktp }}</td>
                                        <td>{{ $r->long_ktp }}</td>
                                        <td>{{ $r->posisi }}</td>
                                        <td>{{ $r->unit }}</td>
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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
<style>
    #mapid {
        height: 70vh;
        width: 100%;
        position: relative;
        top: 0;
        left: 0;
    }
    img.huechange { filter: hue-rotate(120deg); }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
@stop

@section('js')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
<script type="text/javascript">
    var map = L.map('mapid').setView([-7.2693137, 112.7130242], 12);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    @foreach ($rinci as $r)
        @if(!is_null($r->lat_ktp) AND !is_null($r->long_ktp))
            L.marker([{{ $r->lat_ktp }}, {{ $r->long_ktp }}]).addTo(map)
                .bindPopup("Popup");
        @endif
    @endforeach
</script>
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
