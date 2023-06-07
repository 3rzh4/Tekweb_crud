<?php

namespace App\Http\Controllers;

use App\Models\dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_doktor' => 'required',
            'alamat_doktor' => 'required',
            'umur' => 'required|numeric',
            'Keahlian' => 'required',
        ]);
        dokter::create($request->all());
        return redirect('/dokter')->with('success', 'Dokter berhasil ditambah');
    }

    public function show($id)
    {
        $data=dokter::where('id',$id)->first();
        return view('admin/dokter/update',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama_doktor' => 'required',
            'alamat_doktor' => 'required',
            'umur' => 'required|numeric',
            'Keahlian' => 'required',
        ]);
        dokter::where('id',$id)->update(
            [
                'nama_doktor'=>$request->nama_doktor,
                'alamat_doktor'=>$request->alamat_doktor,
                'umur'=>$request->umur,
                'Keahlian'=>$request->Keahlian
            ]
        );
        return redirect('/dokter')->with('success', 'Dokter berhasil diupdate');
    }

    public function add()
    {
        return view('admin/dokter/tambah');
    }

    public function destroy($id)
    {
        dokter::where('id',$id)->delete();
        return redirect('/dokter')->with('success','Data berhasil dihapus');
    }
}
