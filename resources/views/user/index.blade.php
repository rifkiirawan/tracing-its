@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1>User Management</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <a href="{{ route('user.create') }}" class="btn btn-success mr-auto">Add User</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->peran }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class='btn btn-warning mr-3'>Edit</a>
                                            <a href="{{ route('user.delete',  ['id' => $user->id]) }}" class='btn btn-danger delete-confirm'>Delete</a>
                                        </td>
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

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Apakah Anda yakin?',
            text: 'Record ini berserta detailnya akan dihapus',
            icon: 'warning',
            buttons: ["Batal", "Ya"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@stop
