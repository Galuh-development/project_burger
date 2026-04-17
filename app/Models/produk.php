<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produk extends Model
{
    public $timestamps = true; 
    protected $table = "produk"; 
    protected $guarded = ['id']; 
protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

public function getRouteKeyName()
{
    return 'uuid'; // Memberitahu Laravel untuk mencari berdasarkan UUID, bukan ID
}

    public function kategori()
    { 
        return $this->belongsTo(Kategori::class);
    } 
    public function user() 
    { 
        return $this->belongsTo(User::class); 
    } 
    public function fotoProduk()
    {
    return $this->hasMany(FotoProduk::class, 'produk_id', 'id');
    }
}
