<?php

namespace App\Http\Controllers\Main;
use App\Models\pasien;
use App\Models\pembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ruang;
use App\Models\inap;

class ViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        $ruang = ruang::select(DB::raw("COUNT(*) as count"))
                    ->where('is_used', '0')
                    ->pluck('count');
        $ruang_used = ruang::select(DB::raw("COUNT(*) as count"))
                    ->where('is_used', '1')
                    ->pluck('count');
        $pasien = pasien::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('count', 'month_name');
        $pembayaran = pembayaran::select(DB::raw("SUM(harga) as total"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('total', 'month_name');
        $labels_pasien      = $pasien->keys();
        $labels_pembayaran  = $pembayaran->keys();
        $data_pasien        = $pasien->values();
        $data_pembayaran    = $pembayaran->values();
        $data_ruang         = $ruang->values();
        $data_ruang_used    = $ruang_used->values();
        return view('admin/dashboard',compact('labels_pasien','labels_pembayaran', 'data_pasien','data_pembayaran','data_ruang','data_ruang_used'));
    }
}
