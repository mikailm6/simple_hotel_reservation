@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Edit Jenis Ruangan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jruangan.update', $jruangan->id_jenis_ruangan) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="nama_ruangan" class="col-md-2 col-form-label text-md-right">{{ __('Nama Ruangan') }}</label>

                            <div class="col-md-10">
                                <input id="nama_ruangan" type="text" class="form-control{{ $errors->has('nama_ruangan') ? ' is-invalid' : '' }}" name="nama_ruangan" required value="{{ $jruangan->nama_ruangan }}">

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
                                    <option value="Rooms" {{ $jruangan->tipe_ruangan == "Rooms" ? 'selected' : '' }}>Rooms</option>
                                    <option value="Suites" {{ $jruangan->tipe_ruangan == "Suites" ? 'selected' : '' }}>Suites</option>
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
                                <input id="tarif_ruangan" type="text" class="form-control{{ $errors->has('tarif_ruangan') ? ' is-invalid' : '' }}" name="tarif_ruangan" required value="{{ $jruangan->tarif_ruangan }}">

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