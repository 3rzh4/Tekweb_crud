<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'harga',
        'status'
    ];
    protected $casts = [
        'harga' => 'integer',
        'pasien_id'=>'integer'
    ];
    protected $dates = ['created_at'];

    public function pasien()
    {
        return $this->belongsTo(pasien::class);
    }
    public function obat()
    {
        return $this->belongsToMany(obat::class, 'order_obats')->withPivot('quantity');
    }
}
