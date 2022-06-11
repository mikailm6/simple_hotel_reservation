@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Edit Ruangan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ruangan.update', $ruangan->id_ruangan) }}">
                        @csrf
                        @method("PATCH")

                        <div class="form-group row">
                            <label for="id_jenis_ruangan" class="col-md-2 col-form-label text-md-right">{{ __('Jenis Ruangan') }}</label>

                            <div class="col-md-10">
                                <select id="id_jenis_ruangan" class="form-control{{ $errors->has('id_jenis_ruangan') ? ' is-invalid' : '' }}" name="id_jenis_ruangan" required>
                                    @foreach ($jruangan as $j)
                                    <option value="{{ $j->id_jenis_ruangan }}" {{ $j->id_jenis_ruangan == $ruangan->id_jenis_ruangan ? 'selected' : '' }}>{{ $j->nama_ruangan }}</option>
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
                                <input id="no_ruangan" type="text" class="form-control{{ $errors->has('tipe_ruangan') ? ' is-invalid' : '' }}" name="no_ruangan" required placeholder="Format : Lantai-Nomor Ruangan. Contoh : 3-10" value="{{ $ruangan->no_ruangan }}">

                                @if ($errors->has('no_ruangan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_ruangan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-10">
                                <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required>
                                    <option value="Kosong" {{ $ruangan->status == "Kosong" ? 'selected' : '' }}>Kosong</option>
                                    <option value="Terpakai" {{ $ruangan->status == "Terpakai" ? 'selected' : '' }}>Terpakai</option>
                                </select>

                                @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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