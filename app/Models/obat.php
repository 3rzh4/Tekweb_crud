<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'Desc',
        'stok',
        'harga',
    ];
    protected $casts = [
        'harga' => 'integer',
    ];

    public function orderobat()
    {
        return $this->hasMany(orderObat::class, 'obat_id');
    }
}
