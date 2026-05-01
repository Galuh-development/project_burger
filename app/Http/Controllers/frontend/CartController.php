<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Ambil data cart milik user yang sedang login
        $cart = Cart::with('produk')->where('user_id', auth()->id())->get();
        return view('frontend.v_cart.index', compact('cart'));
    }

    // Proses tambah ke keranjang
    public function store(Request $request, $id) 
{
    // Cek apakah user sudah login
    if (!auth()->check()) {
        return redirect()->route('v1.form.login')->with('error', 'Silakan login dulu untuk memesan!');
    }

    // Nanti lo tinggal tambahin logic simpan ke database di sini
    // Contoh: Cart::create(['user_id' => auth()->id(), 'produk_id' => $id, 'qty' => $request->qty]);

    return redirect()->route('v1.frontend.cart.index')->with('success', 'Burger Queen masuk keranjang!');
}
    // Hapus satu item dari keranjang
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}
