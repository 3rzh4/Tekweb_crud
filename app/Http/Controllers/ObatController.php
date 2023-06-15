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
    public function show($id)
    {
        $data=obat::where('id',$id)->first();
        return view('admin/obat/update',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama_obat' => 'required',
            'Desc' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
        obat::where('id',$id)->update([
            'nama_obat'=>$request->nama_obat,
            'Desc'=>$request->Desc,
            'harga'=>$request->harga,
            'stok'=>$request->stok
            ]);
        return redirect('/obat')->with('success', 'Obat berhasil diupdate');
    }
}
