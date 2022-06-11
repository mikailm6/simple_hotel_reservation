@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Edit Transaksi</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('transaksi.update', $transaksi->id_transaksi) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="id_customer" class="col-md-2 col-form-label text-md-right">{{ __('Nama Customer') }}</label>

                            <div class="col-md-10">
                                <select id="id_customer" class="form-control{{ $errors->has('id_customer') ? ' is-invalid' : '' }}" name="id_customer" required>
                                    @foreach ($customer as $c)
                                    <option value="{{ $c->id_customer }}" {{ $c->id_customer == $transaksi->id_customer ? 'selected' : '' }}>{{ $c->nama_customer }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('id_customer'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_customer') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_ruangan" class="col-md-2 col-form-label text-md-right">{{ __('No Ruangan') }}</label>

                            <div class="col-md-10">
                                <select id="id_ruangan" class="form-control{{ $errors->has('id_ruangan') ? ' is-invalid' : '' }}" name="id_ruangan" required>
                                    @foreach ($ruangan as $r)
                                    <option value="{{ $r->id_ruangan }}" {{ $r->id_ruangan == $transaksi->id_ruangan ? 'selected' : '' }}>{{ $r->no_ruangan }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('id_ruangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_ruangan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_masuk" class="col-md-2 col-form-label text-md-right">{{ __('Tanggal Masuk') }}</label>

                            <div class="col-md-10">
                                <input id="tgl_masuk" type="date" class="form-control{{ $errors->has('tgl_masuk') ? ' is-invalid' : '' }}" name="tgl_masuk" required value="{{ $transaksi->tgl_masuk }}">

                                @if ($errors->has('tgl_masuk'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tgl_masuk') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_keluar" class="col-md-2 col-form-label text-md-right">{{ __('Tanggal Keluar') }}</label>

                            <div class="col-md-10">
                                <input id="tgl_keluar" type="date" class="form-control{{ $errors->has('tgl_keluar') ? ' is-invalid' : '' }}" name="tgl_keluar" required value="{{ $transaksi->tgl_keluar }}">

                                @if ($errors->has('tgl_keluar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tgl_keluar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Transaksi') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection