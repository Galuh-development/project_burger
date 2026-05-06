@extends('frontend.v_layouts.app') <!-- Pastikan lo pakai layout utama lo -->
@section('content')

<section id="cart" class="cart section-bg" style="margin-top: 100px; min-height: 80vh;">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Keranjang Belanja</h2>
      <p>Pesanan <span>Burger Queen</span> Anda</p>
    </div>

    <div class="row g-5">
      <!-- Daftar Item Keranjang -->
      <div class="col-lg-8">
        <div class="card shadow-sm border-0" style="border-radius: 15px;">
          <div class="card-body p-4">
            @if($details->count() > 0)
              @foreach($details as $item)
              <div class="row align-items-center mb-4 border-bottom pb-3">
                <div class="col-md-2 col-4">
                  <img src="{{ asset('storage/img-produk/' . $item->produk->foto) }}" class="img-fluid rounded shadow-sm" alt="{{ $item->produk->nama_produk }}">
                </div>
                <div class="col-md-5 col-8">
                  <h5 class="fw-bold mb-1">{{ $item->produk->nama_produk }}</h5>
                  <p class="text-muted mb-0">Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                </div>
                <div class="col-md-3 col-6 mt-md-0 mt-3 text-center">
                  <span class="badge bg-warning text-dark px-3 py-2" style="border-radius: 10px;">
                    Qty: {{ $item->qty }}
                  </span>
                </div>
                <div class="col-md-2 col-6 mt-md-0 mt-3 text-end">
                  <p class="fw-bold mb-0">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                  <form action="{{ route('v1.frontend.keranjang.destroy', $item->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Hapus burger ini?')">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </div>
              </div>
              @endforeach
            @else
              <div class="text-center py-5">
                <i class="bi bi-cart-x" style="font-size: 3rem; color: #ccc;"></i>
                <p class="mt-3">Keranjang masih kosong. Yuk jajan burger dulu!</p>
                <a href="{{ route('v1.frontend.produk.index') }}" class="btn btn-warning rounded-pill px-4">Lihat Menu</a>
              </div>
            @endif
          </div>
        </div>
      </div>

      <!-- Ringkasan Pembayaran -->
      <div class="col-lg-4">
        <div class="card shadow-sm border-0" style="border-radius: 15px; background-color: #fff;">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-4">Ringkasan</h4>
            <div class="d-flex justify-content-between mb-3">
              <span>Total Item</span>
              <span class="fw-bold">{{ $details->sum('qty') }}</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-4">
              <span class="fs-5">Total Bayar</span>
              <span class="fs-5 fw-bold text-danger">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <button class="btn btn-warning w-100 py-3 fw-bold rounded-pill shadow-sm" {{ $details->count() == 0 ? 'disabled' : '' }}>
              Lanjut ke Pembayaran (Checkout)
            </button>
            <a href="{{ route('v1.frontend.produk.index') }}" class="btn btn-outline-secondary w-100 mt-3 rounded-pill">
              Tambah Menu Lain
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

@endsection