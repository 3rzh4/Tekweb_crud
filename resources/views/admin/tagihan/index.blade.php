@extends('layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data tagihan</h1>
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
        <form action="/tagihan" method="get">
            @csrf
                <input type="text" class="form-control mb-2" placeholder="Search Data" name="search">
            </form>
            <a href="/tagihan/tambah" class="btn btn-primary">Tambah tagihan</a>
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
                    <th>Barang</th>
                    <th>Tagihan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
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

                        <td>{{$d->pasien->nama_pasien}}</td>
                        <td>{{$d->pasien->alamat_pasien}}</td>
                        <td>
                            @foreach ($d->obat as $item)
                            <li>{{$item->nama_obat}}</li>
                            @endforeach
                        </td>
                        <td>{{$d->harga}}</td>
                        <td>{{$d->created_at->format('Y-m-d')}}</td>
                        <td>
                            @if ($d->status == 1)
                            <a class="btn btn-success" style="color:white;">Lunas</a>
                            @else
                            <a class="btn btn-danger" style="color:white;">Belum Bayar</a>
                            @endif
                        </td>
                        <td><div class="row">
                            <form action="/tagihan/update/{{$d->id}}" method="post">
                                @csrf
                                @method('Put')
                                <button type="submit" class="btn btn-secondary mb-1" onclick="return confirm('apa kamu yakin?');">Bayar</button>
                            </form>
                            <form action="/tagihan/delete/{{$d->id}}" method="post">
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
