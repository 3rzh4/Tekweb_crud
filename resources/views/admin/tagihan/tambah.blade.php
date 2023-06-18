@extends('layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="/tagihan" style="color: inherit;text-decoration:none;"> Data tagihan </a>/ Tambah</h1>
    </div>
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
@endif
<div class="card">
    <div class="card-header">
        Buat Tagihan
    </div>
        <div class="card-body">
            <form action="/tagihan/create" method="post">
                @csrf
                <div class="form-group row">
                <label for="nama" class="col-sm-1 col-form-label">
                    Nama
                </label>
                <div class="col-sm-11">
                    <select name="pasien_id" id="" class="form-control selectpicker" aria-placeholder="Nama Pasien">
                        @foreach ($pasien as $p)
                        <option value="{{$p->id}}"> {{$p->nama_pasien}}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                Barang
                            </div>
                            <div class="card-body">
                                <table class="table" id="products_table">
                                    <thead>
                                        <tr>
                                            <th>Barang</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="product0">
                                            <td>
                                                <select name="products[]" class="form-control">
                                                    <option value="">-- Pilih Obat --</option>
                                                    @foreach ($obat as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->nama_obat }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="quantities[]" class="form-control" value="1" />
                                            </td>
                                        </tr>
                                        <tr id="product1"></tr>
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        <a id="add_row" class="btn btn-info pull-left">+ Add Row</a>
                                        <a id='delete_row' class="pull-right btn btn-danger">- Delete Row</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-primary" type="submit">
                        </div>
            </form>
        </div>
        </div>


<script>
    $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });
    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
    </script>

@endsection
