<?php

namespace App\Http\Controllers;

use App\Models\obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_obat' => 'required',
            'Desc' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
        obat::create($request->all());
        return redirect('/obat')->with('success', 'Obat berhasil ditambah');
    }

    public function destroy($id)
    {
        obat::where('id',$id)->delete();
        return redirect('/obat')->with('success','Data berhasil dihapus');
    }

    public function add()
    {
        return view('admin/obat/tambah');
    }
}
