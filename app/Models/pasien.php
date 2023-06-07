<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pasien',
        'alamat_pasien',
        'umur',
    ];
    

    public function pembayaran(){
        return $this->hasOne(pembayaran::class,'pasien_id');
    }

}
