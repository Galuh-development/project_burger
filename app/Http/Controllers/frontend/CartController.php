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
        // Pastikan user login dulu
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Login dulu ya!');
        }

        // Cek apakah produk yang sama sudah ada di keranjang user ini
        $cek = Cart::where('user_id', auth()->id())->where('produk_id', $id)->first();

        if ($cek) {
            // Kalau ada, cukup update quantity-nya saja
            $cek->update([
                'qty' => $cek->qty + $request->qty
            ]);
        } else {
            // Kalau belum ada, buat baris baru
            Cart::create([
                'user_id' => auth()->id(),
                'produk_id' => $id,
                'qty' => $request->qty
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Berhasil masuk keranjang!');
    }

    // Hapus satu item dari keranjang
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}
