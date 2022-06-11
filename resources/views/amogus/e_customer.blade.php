@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Edit Costumer</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('customer.update', $customer->id_customer) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="nim" class="col-md-2 col-form-label text-md-right">{{ __('NIK') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" required value="{{ $customer->nik }}">

                                @if ($errors->has('nik'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nik') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_customer" class="col-md-2 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-10">
                                <input id="nama_customer" type="text" class="form-control{{ $errors->has('nama_customer') ? ' is-invalid' : '' }}" name="nama_customer" required value="{{ $customer->nama_customer }}">

                                @if ($errors->has('nama_customer'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_customer') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_customer" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-10">
                                <input id="email_customer" type="text" class="form-control{{ $errors->has('email_customer') ? ' is-invalid' : '' }}" name="email_customer" required value="{{ $customer->email_customer }}">

                                @if ($errors->has('email_customer'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email_customer') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telp_customer" class="col-md-2 col-form-label text-md-right">{{ __('No Telp') }}</label>

                            <div class="col-md-10">
                                <input id="telp_customer" type="text" class="form-control{{ $errors->has('telp_customer') ? ' is-invalid' : '' }}" name="telp_customer" required value="{{ $customer->telp_customer }}">

                                @if ($errors->has('telp_customer'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telp_customer') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat_customer" class="col-md-2 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-10">
                                <input id="alamat_customer" type="text" class="form-control{{ $errors->has('alamat_customer') ? ' is-invalid' : '' }}" name="alamat_customer" required value="{{ $customer->alamat_customer }}">

                                @if ($errors->has('alamat_customer'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('alamat_customer') }}</strong>
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