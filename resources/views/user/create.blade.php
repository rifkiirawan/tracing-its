
@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1>User Management</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header bg-white">
                        <div class="row align-items-center">
                            <div class="mx-2">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-default">Back</a>
                            </div>
                            <h4 class="col-4 mb-0">Tambah Pengguna Baru</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div>
                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nama">{{ __('Nama') }}</label>
                                    <input type="text" name="nama" id="input-nama" class="form-control form-control-alternative{{ $errors->has('nama') ? ' is-invalid' : '' }}" value="{{ old('nama') }}" placeholder="{{ __('Nama') }}" required autofocus>

                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('peran') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-peran">{{ __('Peran') }}</label>
                                    <select type="peran" name="peran" id="input-peran" class="form-control form-control-alternative{{ $errors->has('peran') ? ' is-invalid' : '' }}" required>
                                        <option {{ old('peran') == 'Tim Tracing' ? 'selected' : '' }}>Tim Tracing</option>
                                        <option {{ old('peran') == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                        <option {{ old('peran') == 'Rektorat' ? 'selected' : '' }}>Rektorat</option>
                                        <option {{ old('peran') == 'Pasien' ? 'selected' : '' }}>Pasien</option>
                                    </select>
                                    @if ($errors->has('peran'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('peran') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                    </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop
