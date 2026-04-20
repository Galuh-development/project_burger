@extends('frontend.v_layouts.app') 
@section('content') 
<section id="hero" class="hero section light-background">

  <div class="container">
    <div class="row gy-5 justify-content-center justify-content-lg-between align-items-center">
      
      <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">The Real Taste of<br><span class="text-warning">Burger Queen</span></h1>
        <p data-aos="fade-up" data-aos-delay="100">
          Nikmati kelezatan burger premium dengan daging pilihan dan bahan-bahan segar setiap hari. Karena Anda adalah raja dan ratu di setiap gigitannya.
        </p>
        
        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          <a href="{{ route('v1.frontend.produk.index') }}" class="btn-get-started shadow-sm" style="background-color: #ffc107; color: #212529; border: none; font-weight: bold; padding: 12px 30px; border-radius: 50px; text-decoration: none;">
            Lihat Menu Kami
          </a>
        </div>
      </div>

      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
        <img src="{{ asset('images/menu.png') }}" class="img-fluid animated rounded-3" alt="Burger Queen Hero" style="width: 100%;">
      </div>

    </div>
  </div>

</section>@endsection