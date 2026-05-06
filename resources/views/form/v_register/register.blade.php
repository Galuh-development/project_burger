<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $judul }} - Burger Queen</title>
  
  <!-- Favicons -->
  <link href="{{ asset('images/logo_brgr.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  
  <!-- Main CSS File -->
  <link href="{{ asset('frontend/template/css/main.css') }}" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .register-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    /* .register-card {
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      max-width: 500px;
      width: 100%;
    } */
    .btn-book-a-table {
      background: #FFA425;
      border: 0;
      padding: 10px 40px;
      color: black;
      transition: 0.4s;
      border-radius: 50px;
      width: 100%;
    }
    /* .btn-book-a-table:hover {
      background: #FFA425;
    } */
    .logo-img {
      max-width: 120px;
      margin-bottom: 20px;
    }
    .section-header h2 {
      font-size: 32px;
      font-family: var(--font-primary);
      color: var(--color-secondary);
    }
  </style>
</head>

<body>

  <div class="register-container">
    <div class="register-card text-center">
      
      <!-- Logo Burger Queen -->
      <a href="{{ route('v1.frontend.beranda.index') }}">
        <img src="{{ asset('images/logo brgr.png') }}" alt="Logo" class="logo-img">
      </a>

      <div class="section-header">
        <h4>Daftar Akun</h4>
        <p>Gabung jadi member <span>Burger Queen</span> sekarang!</p>
      </div>

      <!-- Menampilkan Error Validasi -->
      @if ($errors->any())
          <div class="alert alert-danger text-start">
              <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{ route('v1.form.register.process') }}" method="POST" class="text-start mt-4">
        @csrf
        
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat Email</label>
          <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">No. Handphone</label>
          <input type="text" name="hp" class="form-control" placeholder="Contoh: 08123456789" value="{{ old('hp') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
        </div>

        <div class="mt-4">
          <button type="submit" class="btn-book-a-table">Daftar Sekarang</button>
        </div>

        <div class="text-center mt-4">
          <p class="mb-0 text-muted">Sudah punya akun?</p>
          <a href="{{ route('v1.form.login') }}" class="fw-bold" style="color: var(--color-primary); text-decoration: none;">
            Login di sini
          </a>
        </div>
      </form>

    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>