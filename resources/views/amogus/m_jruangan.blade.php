@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Tabel Jenis Ruangan</div>

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
                                <th>Nama Ruangan</th>
                                <th>Tipe Ruangan</th>
                                <th>Tarif Per Malam</th>
                                <th colspan="2">Optioin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jruangan as $j)
                            <tr>
                                <td>{{ $j-> id_jenis_ruangan }}</td>
                                <td>{{ $j-> nama_ruangan }}</td>
                                <td>{{ $j-> tipe_ruangan }}</td>
                                <td>{{ $j-> tarif_ruangan }}</td>
                                <td><a href="{{ route('jruangan.edit', $j->id_jenis_ruangan) }}"><button class="btn btn-primary" type="submit">Edit</button></a></td>
                                <td>
                                    <form action="{{ route('jruangan.destroy', $j->id_jenis_ruangan)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
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
                <div class="card-header">Form Jenis Ruangan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jruangan.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_ruangan" class="col-md-2 col-form-label text-md-right">{{ __('Nama Ruangan') }}</label>

                            <div class="col-md-10">
                                <input id="nama_ruangan" type="text" class="form-control{{ $errors->has('nama_ruangan') ? ' is-invalid' : '' }}" name="nama_ruangan" required autofocus>

                                @if ($errors->has('nama_ruangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_ruangan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipe_ruangan" class="col-md-2 col-form-label text-md-right">{{ __('Tipe Ruangan') }}</label>

                            <div class="col-md-10">
                                <select id="tipe_ruangan" class="form-control{{ $errors->has('tipe_ruangan') ? ' is-invalid' : '' }}" name="tipe_ruangan" required>
                                    <option value="Rooms" disabled selected><-- SELECT --></option>
                                    <option value="Rooms">Rooms</option>
                                    <option value="Suites">Suites</option>
                                </select>

                                @if ($errors->has('tipe_ruangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipe_ruangan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tarif_ruangan" class="col-md-2 col-form-label text-md-right">{{ __('Tarif Per Hari') }}</label>

                            <div class="col-md-10">
                                <input id="tarif_ruangan" type="text" class="form-control{{ $errors->has('tarif_ruangan') ? ' is-invalid' : '' }}" name="tarif_ruangan" required>

                                @if ($errors->has('tarif_ruangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tarif_ruangan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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