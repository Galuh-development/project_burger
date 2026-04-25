<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    use HasFactory;
    protected $fillable = ['user_id', 'produk_id', 'qty'];

    // Relasi ke tabel Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
