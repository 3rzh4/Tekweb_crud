@extends('layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Dokter</h1>
    </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
        @endif
        
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
        </div>
@endif
<div class="card">
    <div class="card-header">
        <form action="/pasien" method="get">
            @csrf
                <input type="text" class="form-control mb-2" placeholder="Search Data" name="search">
            </form>
            <a href="/dokter/tambah" class="btn btn-primary">Tambah Dokter</a>
        </div>
        <div class="card-body">
        <div class="table-responsive">          
            <table class="table table-bordered">
                @php
            $count = 0
            @endphp
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Keahlian</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    @php
                $count++
                @endphp
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$d->nama_doktor}}</td>
                        <td>{{$d->alamat_doktor}}</td>
                        <td>{{$d->umur}}</td>
                        <td>{{$d->Keahlian}}</td>
                        <td><div class="row">
                            <a href="/dokter/edit/{{$d->id}}" class="btn btn-success ml-2 mr-2">Edit</a>
                            <form action="/dokter/delete/{{$d->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apa kamu yakin?');">Hapus</button>
                            </form>
                        </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
    
            </div>
        </div>
        </div>




@endsection