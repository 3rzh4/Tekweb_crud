@extends('layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="/obat" style="color: inherit;text-decoration:none;"> Data Stok Barang </a>/ Tambah</h1>
    </div>
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
@endif
<div class="card">
    <div class="card-header">
        Tambah Data Barang
    </div>
        <div class="card-body">
            <form action="/obat/create" method="post">
                @csrf
                <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">
                    Nama Barang
                </label>
                <div class="col-sm-10">
                    <input type="text" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" id="nama">
                                @error('nama_obat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">
                        Deskripsi
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="Desc" class="form-control @error('Desc') is-invalid @enderror" id="desc">
                                @error('Desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">
                        Harga
                    </label>
                    <div class="col-sm-10">
                        <input type="number" name="harga" class="form-control  @error('harga') is-invalid @enderror" id="harga">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-2 col-form-label">
                        Stok
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="stok" class="form-control  @error('stok') is-invalid @enderror" id="stok">
                                @error('stok')
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
