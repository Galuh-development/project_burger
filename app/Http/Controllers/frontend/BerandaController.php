<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class BerandaController extends Controller
{
    public function berandaFrontend()
    {
        $kategori = Kategori::all();
        $produk = Produk::with('kategori')->latest()->get();

        return view('frontend.v_beranda.index', compact('kategori', 'produk'));
    }
}