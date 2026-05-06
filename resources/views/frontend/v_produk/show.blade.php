@extends('frontend.v_layouts.app') {{-- Sesuaikan dengan nama file layout utama kamu --}}

@section('content')
<section id="menu-detail" class="menu-detail section-bg" style="padding-top: 120px; padding-bottom: 60px;">
    <div class="container" data-aos="fade-up">
        
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 20px;">
                    <img src="{{ asset('storage/img-produk/'.$produk->foto) }}" class="img-fluid" alt="{{ $produk->nama_produk }}">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <span class="text-black fw-bold text-uppercase">{{ $produk->kategori->nama_kategori }}</span>
                    <h2 class="display-5 fw-bold mb-3">{{ $produk->nama_produk }}</h2>
                    <h3 class="text-danger fw-bold mb-4">Rp <span id="display-harga">{{ number_format($produk->harga, 0, ',', '.') }}</span></h3>
                    
                    <p class="text-muted mb-4">
                        {!! $produk->detail !!}
                    </p>

                    <hr class="my-4">

                  {{-- Ganti '#' dengan route simpan keranjang lo --}}
                    <form action="{{ route('v1.frontend.keranjang.store', $produk->id) }}" method="POST">
                        @csrf

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="qty" class="form-label mb-0">Jumlah Porsi:</label>
                            </div>

                            <div class="col-3">
                                {{-- Input Jumlah --}}
                                <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" oninput="updateTotal()">

                                {{-- Hidden input harga buat JS (Opsional) --}}
                                <input type="hidden" id="harga-satuan" value="{{ $produk->harga }}">
                            </div>

                            <div class="col-12 mt-4 d-grid d-md-flex gap-3 justify-content-md-start">
                                {{-- Tombol Submit --}}
                                <button type="submit" class="btn btn-warning btn-lg px-md-5 rounded-pill shadow-sm fw-bold">
                                    <i class="bi bi-cart-plus me-2"></i> Tambah ke Keranjang
                                </button>
                            
                                {{-- Tombol Kembali --}}
                                <a href="{{ route('v1.frontend.produk.index') }}" class="btn btn-outline-secondary btn-lg px-md-4 rounded-pill">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
function updateTotal() {
    // 1. Ambil harga satuan & jumlah qty
    const hargaSatuan = document.getElementById('harga-satuan').value;
    const qty = document.getElementById('qty').value;
    
    // 2. Hitung total
    const total = hargaSatuan * qty;
    
    // 3. Format ke rupiah (tambah titik ribuan)
    const formatted = new Intl.NumberFormat('id-ID').format(total);
    
    // 4. Update tampilan harga
    document.getElementById('display-harga').innerText = formatted;
}

// Tambahan: Cegah form submit saat tekan enter di input qty
document.getElementById('qty').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        return false;
    }
});
</script>
</section>
@endsection