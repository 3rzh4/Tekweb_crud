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
        Update Data Pasien
    </div>
        <div class="card-body">
            <form action="/pasien/update/{{$data->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                <label for="nama" class="col-sm-1 col-form-label">
                    Nama 
                </label>
                <div class="col-sm-11">
                    <input type="text" name="nama_pasien" class="form-control" id="nama" value="{{$data->nama_pasien}}">
                </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-1 col-form-label">
                        Alamat 
                    </label>
                    <div class="col-sm-11">
                        <input type="text" name="alamat_pasien" class="form-control" id="alamat" value="{{$data->alamat_pasien}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="umur" class="col-sm-1 col-form-label">
                        Umur 
                    </label>
                    <div class="col-sm-11">
                        <input type="number" name="umur" class="form-control" id="umur" value="{{$data->umur}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
        </div>
@endsection