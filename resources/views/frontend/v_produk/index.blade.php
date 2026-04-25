@extends('frontend.v_layouts.app') 
@section('content') 

<section id="menu" class="menu section">
    <!-- <div class="container text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Menu Unggulan <span class="text-warning">Burger Queen</span></h2>
        <p>Pilih rasa favoritmu dan rasakan kelezatan daging premium kami.</p>
    </div> -->

    <div class="container">
        <ul class="nav nav-tabs d-flex justify-content-center border-0 mb-5" data-aos="fade-up" data-aos-delay="100">
            @foreach ($kategori as $key => $kat)
                <li class="nav-item">
                    <a class="nav-link {{ $key == 0 ? 'active show' : '' }} fw-bold mx-2 shadow-sm rounded-pill px-4" 
                       data-bs-toggle="tab" 
                       href="#menu-{{ $kat->id }}"
                       style="transition: 0.3s;">
                        {{ $kat->nama_kategori }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            @foreach ($kategori as $key => $kat)
                <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}" id="menu-{{ $kat->id }}">
                    
                    <div class="row gy-4">
                        @foreach ($kat->produk as $produk)
                            <div class="col-lg-4 col-md-6">
                               <div class="menu-item-card p-3 shadow-sm border rounded-4 bg-white h-100 text-center" 
                                     onclick="location.href='{{ route('v1.frontend.produk.show', $produk->id) }}'" 
                                     style="cursor: pointer;">

                                    <div class="overflow-hidden rounded-4 mb-3" style="height: 250px;" onclick="event.stopPropagation();">
                                        <a href="{{ asset('storage/img-produk/'.$produk->foto) }}" class="glightbox">
                                            <img src="{{ asset('storage/img-produk/'.$produk->foto) }}" 
                                                 class="img-fluid w-100 h-100 object-fit-cover transition-img" 
                                                 alt="{{ $produk->nama_produk }}">
                                        </a>
                                    </div>

                                    <h4 class="fw-bold mb-2">{{ $produk->nama_produk }}</h4>

                                    <p class="text-muted small mb-3">
                                        {{ Str::limit(strip_tags($produk->detail), 80) }}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                                        <span class="fs-5 fw-bold text-dark">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>

                                        <a href="#" class="btn btn-warning btn-sm rounded-pill px-3 fw-bold shadow-sm" 
                                           onclick="event.stopPropagation();">
                                            <i class="bi bi-cart-plus me-1"></i> Pesan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .nav-tabs .nav-link {
        color: #212529;
        border: 2px solid #ffc107 !important;
    }
    .nav-tabs .nav-link.active {
        background-color: #ffc107 !important;
        color: #fff !important;
        border-color: #ffc107 !important;
    }
    .menu-item-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .menu-item-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .transition-img {
        transition: transform 0.5s ease;
    }
    .menu-item-card:hover .transition-img {
        transform: scale(1.1);
    }
    .object-fit-cover {
        object-fit: cover;
    }
</style>

@endsection