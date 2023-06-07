@extends('layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="/pasien" style="color: inherit;text-decoration:none;"> Data Pasien </a>/ Tambah</h1>
    </div>
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
        </div>
@endif
<div class="card">
    <div class="card-header">
        Tambah Data Pasien
    </div>
        <div class="card-body">
            <form action="/pasien/create" method="post">
                @csrf
                <div class="form-group row">
                <label for="nama" class="col-sm-1 col-form-label">
                    Nama 
                </label>
                <div class="col-sm-11">
                    <input type="text" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama">
                                @error('nama_pasien')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-1 col-form-label">
                        Alamat 
                    </label>
                    <div class="col-sm-11">
                        <input type="text" name="alamat_pasien" class="form-control  @error('alamat_pasien') is-invalid @enderror" id="alamat">
                                @error('alamat_pasien')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="umur" class="col-sm-1 col-form-label">
                        Umur 
                    </label>
                    <div class="col-sm-11">
                        <input type="number" name="umur" class="form-control  @error('umur') is-invalid @enderror" id="umur">
                                @error('umur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
        </div>




@endsection