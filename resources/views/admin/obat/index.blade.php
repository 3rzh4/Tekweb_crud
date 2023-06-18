@extends('layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Stok Barang</h1>
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
        <form action="/obat" method="get">
            @csrf
                <input type="text" class="form-control mb-2" placeholder="Search Data" name="search">
            </form>
            <a href="/obat/tambah" class="btn btn-primary">Tambah Barang</a>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                @php
            $count = 0
            @endphp
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 10%">Nama Barang</th>
                    <th style="width: 50%">Deskripsi</th>
                    <th style="width: 10%">Harga</th>
                    <th style="width: 5%">Stok</th>
                    <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    @php
                $count++
                @endphp
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$d->nama_obat}}</td>
                        <td>{{$d->Desc}}</td>
                        <td>{{$d->harga}}</td>
                        <td>{{$d->stok}}</td>
                        <td><div class="row">
                            <a href="/obat/edit/{{$d->id}}" class="btn btn-success ml-2 mr-2">Edit</a>
                            <form action="/obat/delete/{{$d->id}}" method="post">
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
