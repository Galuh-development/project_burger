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
        // Ambil produk yang statusnya aktif saja (misal 1)
        $produk = Produk::with('kategori')->where('status', 1)->latest()->get();

        return view('frontend.v_beranda.index', [
            'judul' => 'Selamat Datang di Burger Queen',
            'kategori' => $kategori,
            'produk' => $produk
        ]);
    }
}