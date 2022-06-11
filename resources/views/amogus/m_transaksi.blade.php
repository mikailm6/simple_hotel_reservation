@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Tabel Transaksi</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>No Ruangan</th>
                                <th>Tgl Masuk</th>
                                <th>Tgl Keluar</th>
                                <th>Bayar</th>
                                <th colspan="2">Options</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($transaksi as $t)
                            <tr>
                                <td>{{ $t->id_transaksi }}</td>
                                <td>{{ $t->customer->nama_customer }}</td>
                                <td>{{ $t->customer->telp_customer }}</td>
                                <td>{{ $t->ruangan->no_ruangan }}</td>
                                <td>{{ $t->tgl_masuk }}</td>
                                <td>{{ $t->tgl_keluar }}</td>
                                <td>{{ $t->bayar }}</td>
                                <td><a href="{{ route('transaksi.edit', $t->id_transaksi) }}"><button class="btn btn-primary" type="submit">Edit</button></a></td>
                                <td>
                                    <form action="{{ route('transaksi.destroy', $t->id_transaksi)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                                <td>{{ $t->anjays }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Transaksi</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('transaksi.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id_customer" class="col-md-2 col-form-label text-md-right">{{ __('Nama Customer') }}</label>

                            <div class="col-md-10">
                                <select id="id_customer" class="form-control{{ $errors->has('id_customer') ? ' is-invalid' : '' }}" name="id_customer" required>
                                    <option disabled selected>
                                        <-- SELECT -->
                                    </option>
                                    @foreach ($customer as $c)
                                    <option value="{{ $c->id_customer }}">{{ $c->nama_customer }}</option>
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
                                    <option disabled selected>
                                        <-- SELECT -->
                                    </option>
                                    @foreach ($ruangan as $r)
                                    <option value="{{ $r->id_ruangan }}">{{ $r->no_ruangan }}</option>
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
                                <input id="tgl_masuk" type="date" class="form-control{{ $errors->has('tgl_masuk') ? ' is-invalid' : '' }}" name="tgl_masuk" required>

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
                                <input id="tgl_keluar" type="date" class="form-control{{ $errors->has('tgl_keluar') ? ' is-invalid' : '' }}" name="tgl_keluar" required>

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