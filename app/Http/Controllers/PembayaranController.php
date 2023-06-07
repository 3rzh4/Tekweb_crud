<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\orderObat;
use App\Models\pasien;
use App\Models\pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function destroy($id)
    {
        pembayaran::where('id',$id)->delete();
        return redirect('/tagihan')->with('success','Data berhasil dihapus');
    }
    public function add(){
        $pasien=pasien::all();
        $obat = obat::all();
        return view('admin/tagihan/tambah',['pasien'=>$pasien,'obat'=>$obat]);
    }

    public function store(Request $request)
    {
        $order = pembayaran::create(['pasien_id'=>$request->pasien_id,'status'=>0]);

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        $countProd=count($products);
        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->obat()->attach($products[$product], ['quantity' => $quantities[$product]]);
            }
        }
        $this->setHarga($countProd);
        return redirect('/tagihan');
    }
    public function setHarga($countProd){
        $id=pembayaran::latest()->first()->id;
        $getObat=orderObat::where('pembayaran_id',$id)->first()->obat_id;
        $getquantity=orderObat::where('pembayaran_id',$id)->first()->quantity;
        $getHarga =  obat::where('id',$getObat)->first()->harga;
        $total=pembayaran::where('id',$id)->update([
            'harga'=> $getHarga * $getquantity + 50000
        ]);
    }
    public function update($id){
        pembayaran::where('id',$id)->update(['status'=>1]);
        return redirect('/tagihan')->with('success', 'Tagihan telah success bayar');
    }
}
