<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
{
    $kategori = Kategori::with('produk')->get();

    return view('frontend.v_produk.index', compact('kategori'));
}

public function show($id)
{
    $produk = Produk::findOrFail($id); // Ambil data atau 404 kalau ga ada
    return view('frontend.v_produk.show', compact('produk'));
}
}