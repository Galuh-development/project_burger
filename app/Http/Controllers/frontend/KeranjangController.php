<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\KeranjangDetail;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    // 1. Menampilkan isi keranjang
    public function index()
    {
        // Ambil keranjang milik user yang sedang login
        $keranjang = Keranjang::where('user_id', Auth::id())->first();

        // Jika keranjang ada, ambil detailnya beserta data produk
        $details = $keranjang 
            ? KeranjangDetail::with('produk')->where('keranjang_id', $keranjang->id)->get() 
            : collect();

        return view('frontend.v_keranjang.index', [
            'judul' => 'Keranjang Belanja',
            'details' => $details,
            'total' => $details->sum('subtotal') // Langsung hitung total bayar
        ]);
    }

    // 2. Menambahkan Burger ke Keranjang (Logic Otak)
    public function store(Request $request, $id)
    {
        // Validasi input qty
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $produk = Produk::findOrFail($id);
        $userId = Auth::id();

        // STEP A: Cek/Buat Header Keranjang
        // Cari keranjang user, kalau belum ada otomatis buat baru
        $keranjang = Keranjang::firstOrCreate([
            'user_id' => $userId
        ]);

        // STEP B: Cek apakah produk yang sama sudah ada di detail?
        $existingDetail = KeranjangDetail::where('keranjang_id', $keranjang->id)
            ->where('produk_id', $id)
            ->first();

        if ($existingDetail) {
            // Kalau sudah ada, cukup update qty dan subtotalnya
            $newQty = $existingDetail->qty + $request->qty;
            $existingDetail->update([
                'qty' => $newQty,
                'subtotal' => $newQty * $produk->harga
            ]);
        } else {
            // Kalau belum ada, buat baris detail baru
            KeranjangDetail::create([
                'keranjang_id' => $keranjang->id,
                'produk_id'    => $id,
                'qty'          => $request->qty,
                'subtotal'     => $request->qty * $produk->harga
            ]);
        }

        return redirect()->route('v1.frontend.keranjang.index')->with('success', 'Burger Queen berhasil ditambah!');
    }

    // 3. Menghapus satu item dari detail keranjang
    public function destroy($id)
    {
        // Cari detail berdasarkan ID dan pastikan milik user yang login
        $detail = KeranjangDetail::whereHas('keranjang', function($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);

        $detail->delete();

        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}
