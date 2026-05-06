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
      
      <a href="{{ route('v1.frontend.beranda.index') }}" class="logo d-flex align-items-center me-auto me-xl-0 text-decoration-none">
        <img src="{{ asset('images/logo brgr.png') }}" alt="logo" style="max-height: 45px;">
        <h1 class="sitename ms-2 mb-0" style="color: #212529; font-weight: 700; font-size: 24px;"> 
            My Burger <span class="text-warning">Queen</span>
        </h1>
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
                    <span class="fw-bold"><i class="bi bi-person-circle me-1"></i> Akun</span> 
                    <i class="bi bi-chevron-down toggle-dropdown ms-1"></i>
                </a>
                <ul>
                    <li><a href="{{ route('v1.frontend.profile.index') }}"><i class="bi bi-person me-2"></i> Profil Saya</a></li>
                    <li><a href="{{ route('v1.frontend.keranjang.index') }}"><i class="bi bi-cart3 me-2"></i> keranjang </a></li>
                    <li><a href="#"><i class="bi bi-receipt me-2"></i> Pesanan Saya</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-frontend').submit();">
                            <i class="bi bi-box-arrow-right me-2"></i> Keluar
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <form id="logout-frontend" action="{{ route('v1.form.logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

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
   /* --- HEADER COMPACT STYLE --- */
.header {
    background-color: #ffffff !important;
    border-bottom: 2px solid #ffc107 !important;
    height: 75px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.05);
}

/* Kunci lebar maksimal container biar gak ngelebar banget */
.header .container {
    max-width: 1140px; /* Standar ukuran layar yang nyaman di mata */
    padding: 0 15px;
}

.header .logo img {
    max-height: 40px;
}

.header .logo h1 {
    font-size: 22px;
    font-weight: 800;
    letter-spacing: -0.5px;
    color: #212529;
}

.header .logo h1 span {
    color: #ffc107;
}

/* --- NAVMENU SPACING --- */
.navmenu ul {
    gap: 10px; /* Kasih jarak antar menu biar gak rapet banget tapi gak jauh banget */
}

.navmenu a {
    color: #444 !important;
    font-size: 14px;
    font-weight: 600 !important;
    padding: 10px 15px !important;
    border-radius: 8px;
    transition: 0.2s;
}

.navmenu a:hover, .navmenu .active {
    color: #ffc107 !important;
    /* background-color: #fff9e6; Background soft pas hover */
}

/* --- DROPDOWN POSITIONING --- */
.navmenu .dropdown ul {
    border-radius: 12px !important;
    padding: 8px 0 !important;
    min-width: 180px;
    border: 1px solid #eee !important;
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.1) !important;
}

.navmenu .dropdown ul li a {
    padding: 10px 18px !important;
    font-size: 14px !important;
}

/* --- FOOTER FIX (BIAR GA NGELEBAR) --- */
.footer .container {
    max-width: 1140px;
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