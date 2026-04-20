<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Burger Queen</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('images/logo brgr.png') }}" rel="icon">
  <link href="{{ asset('frontend/template/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/template/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('frontend/template/css/main.css') }}" rel="stylesheet">
  
  
  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top bg-white shadow-sm border-bottom border-warning border-3">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      
      <a href="#('index.html')" class="logo d-flex align-items-center me-auto me-xl-0 text-decoration-none">
        <img src="{{ asset('images/logo brgr.png') }}" alt="logo" style="max-height: 50px;">
        <h1 class="sitename ms-2 mb-0" style="color: #212529;"> My Burger <span class="text-warning">Queen</span></h1>
      </a>
      <nav id="navmenu" class="navmenu">
    <ul>
        <li>
            <a href="{{ route('v1.frontend.beranda.index') }}" class="{{ Request::is('beranda*') ? 'active' : '' }}">Beranda</a>
        </li>
        <li>
            <a href="{{ route('v1.frontend.produk.index') }}" class="{{ Request::is('produk*') ? 'active' : '' }}">Menu</a>
        </li>
        <li class="dropdown">
            <a href="#" class="{{ Request::is('akun*') ? 'active' : '' }}">
                <span>Akun</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul>
                <li><a href="#">Profil Saya</a></li>
                <li><a href="#">Pesanan Saya</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a href="#" class="text-danger">Keluar</a></li>
            </ul>
        </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
    </div>
</header>

  <main class="main">
    
    <!-- Hero Section -->
    
    @yield('content')
  
    

 <footer id="footer" class="footer dark-background">

  <div class="container">
    <div class="row gy-3">
      
      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-geo-alt icon text-warning"></i>
        <div class="address">
          <h4>Alamat</h4>
          <p>Jl. Kayu Jati No. 2</p>
          <p>Kampus BSI, Jakarta Timur</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-telephone icon text-warning"></i>
        <div>
          <h4>Kontak</h4>
          <p>
            <strong>Telepon:</strong> <span>+62 812 3456 7890</span><br>
            <strong>Email:</strong> <span>hello@burgerqueen.com</span><br>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-clock icon text-warning"></i>
        <div>
          <h4>Jam Operasional</h4>
          <p>
            <strong>Senin-Sabtu:</strong> <span>10:00 - 22:00</span><br>
            <strong>Minggu:</strong> <span>11:00 - 21:00</span>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <h4>Ikuti Kami</h4>
        <div class="social-links d-flex">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="tiktok"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>

    </div>
  </div>

  <div class="container copyright text-center mt-4 border-top border-secondary pt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename text-warning">Burger Queen</strong> <span>All Rights Reserved</span></p>
    <div class="credits" style="font-size: 13px; opacity: 0.7;">
      Designed by <a href="https://bootstrapmade.com/" class="text-white-50">BootstrapMade</a>
    </div>
  </div>

</footer>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Preloader -->
  <div id="preloader"></div>

  <style>
    /* 1. Mematikan garis merah bawaan template (biasanya menggunakan ::before) */
  .navmenu ul li a::before {
      display: none !important;
      content: none !important;
  }
  
  /* 2. Mematikan border-bottom jika template menggunakannya */
  .navmenu ul li a {
      border-bottom: none !important;
      position: relative;
      padding: 8px 0;
      color: #212529 !important;
  }
  
  /* 3. Memastikan hanya garis kuning kita yang muncul */
  .navmenu ul li a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 3px; 
      bottom: -2px; 
      left: 0;
      background-color: #ffc107 !important; /* Kuning Burger Queen */
      transition: width 0.3s ease-in-out;
      display: block !important;
  }
  
  /* 4. Munculkan garis kuning saat hover */
  .navmenu ul li a:hover::after,
  .navmenu ul li a.active::after {
      width: 100%;
  }
  
  /* 5. Tetap jaga teks agar tidak berubah warna merah */
  .navmenu ul li a:hover {
      color: #212529 !important;
      background: none !important;
  }
  /* Warna default ikon (lingkaran abu-abu/gelap) */
  .footer .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: 1px solid rgba(255, 255, 255, 0.2);
      font-size: 16px;
      color: rgba(255, 255, 255, 0.7);
      margin-right: 10px;
      transition: 0.3s;
      text-decoration: none;
  }
  
  /* Efek Hover: Background jadi Kuning, Ikon jadi Hitam */
  .footer .social-links a:hover {
      background-color: #ffc107; /* Warna warning Bootstrap */
      color: #212529;            /* Warna teks gelap agar kontras */
      border-color: #ffc107;
      transform: translateY(-3px); /* Sedikit efek melompat ke atas */
  }
  /* --- SCROLL TOP --- */
  .scroll-top {
    background-color: #ffc107 !important; /* Warna kuning warning */
    color: #212529 !important;            /* Warna ikon (hitam agar kontras) */
  }
  
  .scroll-top:hover {
    background-color: #ffca2c !important; /* Kuning sedikit terang saat hover */
    color: #000 !important;
  }
  
  /* --- PRELOADER --- */
  #preloader:before {
    /* Mengubah warna garis putar (spinner) menjadi kuning */
    border-top: 3px solid #ffc107 !important;
  }
  
  #preloader:after {
    /* Opsional: Jika ada lingkaran luar, beri warna kuning transparan */
    border: 15px solid #ffc107 !important;
    opacity: 0.1;
  }
  </style>
<script src="{{ asset('frontend/template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/template/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('frontend/template/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend/template/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('frontend/template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('frontend/template/vendor/swiper/swiper-bundle.min.js') }}"></script>

<script src="{{ asset('frontend/template/js/main.js') }}"></script>
</body>

</html>