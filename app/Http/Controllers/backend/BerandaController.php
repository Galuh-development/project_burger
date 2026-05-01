<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Tambahkan model jika nanti butuh data statistik di dashboard
// use App\Models\Produk; 

class BerandaController extends Controller
{
    public function berandaBackend() 
    { 
        return view('backend.v_beranda.index', [ 
            'judul' => 'Dashboard Admin Burger Queen',
        ]); 
    } 
}