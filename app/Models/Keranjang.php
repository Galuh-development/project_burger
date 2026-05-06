<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang'; 
    protected $fillable = ['user_id'];

    public function keranjang_detail()
    {
        return $this->hasMany(KeranjangDetail::class, 'keranjang_id');
    }
}
