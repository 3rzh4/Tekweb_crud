<?php

namespace App\Http\Controllers\Main;
use App\Models\pasien;
use App\Models\pembayaran;
use App\Http\Controllers\Controller;
use App\Models\dokter;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ruang;
use App\Models\inap;
use App\Models\obat;
use App\Models\orderObat;

class ViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        $pasien = pasien::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('count', 'month_name');
        $pembayaran = pembayaran::select(DB::raw("SUM(harga) as total"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->where('status','1')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('total', 'month_name');
        $labels_pasien      = $pasien->keys();
        $labels_pembayaran  = $pembayaran->keys();
        $data_pasien        = $pasien->values();
        $data_pembayaran    = $pembayaran->values();
        return view('admin/dashboard',compact('labels_pasien','labels_pembayaran', 'data_pasien','data_pembayaran'));
    }

    public function pasien(){
        $data= pasien::latest();
        if (request('search')) {
            $data->where('nama_pasien','like','%'.request('search').'%');
        }

        return view('admin/pasien/index',['data'=>$data->paginate(15)]);
    }

    public function dokter(){
        $data= dokter::latest();
        if (request('search')) {
            $data->where('nama_pasien','like','%'.request('search').'%');
        }

        return view('admin/dokter/index',['data'=>$data->paginate(15)]);
    }

    public function obat(){
        $data= obat::latest();
        if (request('search')) {
            $data->where('nama_obat','like','%'.request('search').'%')
            ->orWhere('Desc','like','%'.request('search').'%');
        }
        return view('admin/obat/index',['data'=>$data->paginate(15)]);
    }

    public function tagihan(){
        $data= pembayaran::with('pasien');
        if (request('search')) {
            $search = request('search');
            $data->whereHas('pasien',function ($query) use ($search){
                $query->where('nama_pasien','like','%'.$search.'%');
            });
        }
        return view('admin/tagihan/index',['data'=>$data->paginate(15)]);
        
    }
}
