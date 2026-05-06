<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangDetail extends Model
{
    protected $table = 'keranjang_detail'; 
    protected $fillable = ['keranjang_id', 'produk_id', 'qty', 'subtotal'];

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'keranjang_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
