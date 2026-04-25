@extends('frontend.v_cart.index')

@section('content')
<section style="padding-top: 120px; min-height: 80vh;">
    <div class="container">
        <h2 class="mb-4">Keranjang <span class="text-warning">Belanja</span></h2>

        @if($cart->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalSemua = 0; @endphp
                    @foreach($cart as $item)
                    @php 
                        $subtotal = $item->produk->harga * $item->qty; 
                        $totalSemua += $subtotal;
                    @endphp
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/' . $item->produk->gambar) }}" width="70" class="rounded me-3">
                                <strong>{{ $item->produk->nama_produk }}</strong>
                            </div>
                        </td>
                        <td>Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('v1.frontend.cart.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fw-bold bg-light">
                        <td colspan="3" class="text-end">Total Pembayaran:</td>
                        <td colspan="2" class="text-danger">Rp {{ number_format($totalSemua, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('v1.frontend.produk.index') }}" class="btn btn-outline-dark rounded-pill">Tambah Burger Lagi</a>
            <a href="#" class="btn btn-warning px-5 rounded-pill shadow">Lanjut ke Pembayaran (Checkout)</a>
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-cart-x display-1 text-muted"></i>
            <p class="mt-3">Keranjang kosong. Yuk, cari burger favoritmu!</p>
            <a href="{{ route('v1.frontend.produk.index') }}" class="btn btn-warning rounded-pill mt-3">Lihat Menu</a>
        </div>
        @endif
    </div>
</section>
@endsection