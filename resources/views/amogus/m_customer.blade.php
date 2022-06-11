@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Tabel Customer</div>

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
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th colspan="2">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $c)
                            <tr>
                                <td>{{ $c-> id_customer }}</td>
                                <td>{{ $c-> nik }}</td>
                                <td>{{ $c-> nama_customer }}</td>
                                <td>{{ $c-> email_customer }}</td>
                                <td>{{ $c-> telp_customer }}</td>
                                <td>{{ $c-> alamat_customer }}</td>
                                <td><a href="{{ route('customer.edit', $c->id_customer) }}"><button class="btn btn-primary" type="submit">Edit</button></a></td>
                                <td>
                                    <form action="{{ route('customer.destroy', $c->id_customer)}}" method="post">
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
                <div class="card-header">Form Costumer</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('customer.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nim" class="col-md-2 col-form-label text-md-right">{{ __('NIK') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" required autofocus>

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
                                <input id="nama_customer" type="text" class="form-control{{ $errors->has('nama_customer') ? ' is-invalid' : '' }}" name="nama_customer" required>

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
                                <input id="email_customer" type="text" class="form-control{{ $errors->has('email_customer') ? ' is-invalid' : '' }}" name="email_customer" required>

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
                                <input id="telp_customer" type="text" class="form-control{{ $errors->has('telp_customer') ? ' is-invalid' : '' }}" name="telp_customer" required>

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
                                <input id="alamat_customer" type="text" class="form-control{{ $errors->has('alamat_customer') ? ' is-invalid' : '' }}" name="alamat_customer" required>

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
                                    {{ __('Tambah') }}
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