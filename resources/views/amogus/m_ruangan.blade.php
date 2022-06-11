@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Tabel Ruangan</div>

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
                                <th>No Ruangan</th>
                                <th>Jenis Ruangan</th>
                                <th>Status</th>
                                <th colspan="2">Options</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($ruangan as $r)
                            <tr>
                                <td>{{ $r->id_ruangan }}</td>
                                <td>{{ $r->no_ruangan }}</td>
                                <td>{{ $r->jruangan->nama_ruangan }}</td>
                                <td>{{ $r->status }}</td>
                                <td><a href="{{ route('ruangan.edit', $r->id_ruangan) }}"><button class="btn btn-primary" type="submit">Edit</button></a></td>
                                <td>
                                    <form action="{{ route('ruangan.destroy', $r->id_ruangan)}}" method="post">
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
                <div class="card-header">Form Ruangan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ruangan.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id_jenis_ruangan" class="col-md-2 col-form-label text-md-right">{{ __('Jenis Ruangan') }}</label>

                            <div class="col-md-10">
                                <select id="id_jenis_ruangan" class="form-control{{ $errors->has('id_jenis_ruangan') ? ' is-invalid' : '' }}" name="id_jenis_ruangan" required>
                                    <option disabled selected><-- SELECT --></option>
                                    @foreach ($jruangan as $j)
                                    <option value="{{ $j->id_jenis_ruangan }}">{{ $j->nama_ruangan }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('nik'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nik') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_ruangan" class="col-md-2 col-form-label text-md-right">{{ __('No Ruangan') }}</label>

                            <div class="col-md-10">
                                <input id="no_ruangan" type="text" class="form-control{{ $errors->has('tipe_ruangan') ? ' is-invalid' : '' }}" name="no_ruangan" required placeholder="Format : Lantai-Nomor Ruangan. Contoh : 3-10">

                                @if ($errors->has('no_ruangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_ruangan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Ruangan') }}
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