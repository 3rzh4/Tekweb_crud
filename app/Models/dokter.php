<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_doktor',
        'alamat_doktor',
        'umur',
        'keahlian',
    ];
}
