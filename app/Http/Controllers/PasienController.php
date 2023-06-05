<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'alamat_pasien' => 'required',
            'umur' => 'required|numeric',
        ]);
        pasien::create($request->all());
        return redirect('/pasien')->with('success', 'Pasien berhasil ditambah');
    }
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=pasien::where('id',$id)->first();
        return view('admin/pasien/update',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(pasien $pasien)
    {
        //
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'alamat_pasien' => 'required',
            'umur' => 'required|numeric',
        ]);
        pasien::where('id',$id)->update(
            [
                'nama_pasien'=>$request->nama_pasien,
                'alamat_pasien'=>$request->alamat_pasien,
                'umur'=>$request->umur
            ]
        );
        return redirect('/pasien')->with('success', 'Pasien berhasil diupdate');
    }

    public function add()
    {
        return view('admin/pasien/tambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pasien::where('id_pasien',$id)->delete();
        return redirect('/pasien')->with('success','Data berhasil dihapus');
    }
}
