<!DOCTYPE html> 
<html dir="ltr"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<!-- Tell the browser to be responsive to screen width --> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta name="description" content=""> 
<meta name="author" content=""> 
<!-- Favicon icon --> 
<link rel="icon" href="{{ asset('images/logo brgr.png') }}" type="image/png">
<title>Burger Queen</title> 
<!-- Custom CSS --> 
<link href="{{ asset('backend/matrix-admin-master/dist/css/style.min.css') }}" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --> 
<!-- WARNING: Respond.js doesn't work if you view the page via file:// --> 
<!--[if lt IE 9]> 
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
<![endif]-->
<style>

    .auth-wrapper {
        background: transparent !important;
    }
    /* .auth-box {
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        padding: 20px;
    } */
    .welcome-text {
        font-family: 'Amatic SC', cursive;
        font-weight: 700;
        font-size: 3rem;
        color: #333;
        margin-bottom: 0;
    }
    .input-group-text {
        border: none;
        border-radius: 10px 0 0 10px !important;
    }
    .form-control-lg {
        border-radius: 0 10px 10px 0 !important;
        border: 1px solid #eee;
        font-size: 1rem;
    }
    .form-control-lg:focus {
        border-color: #FFA425;
        box-shadow: none;
    }
    .btn-login {
        background: #333;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: bold;
        transition: 0.3s;
        border: none;
    }
    .btn-login:hover {
        background: #000;
        color: #FFA425;
        transform: translateY(-2px);
    }
    .btn-register {
        color: #333;
        text-decoration: none;
        font-weight: 600;
    }
    .btn-register:hover {
        color: #FF8C00;
    }
    /* #to-recover {
        color: #888;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
    } */
</style>
<!-- Tambahin Google Font biar ga kaku -->
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet"> 
</head> 
<body><div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
    <div class="auth-box bg-white ">
        <div id="loginform">
            <div class="text-center p-t-20 p-b-20">
                <h2 class="welcome-text">Burger Queen</h2>
                <span class="db">
                    <img src="{{ asset('images/logo brgr.png') }}" alt="logo" style="width: 120px; margin-top: 10px;" />
                </span>
                <p class="text-muted m-t-10">Silakan login untuk mulai memesan</p>
            </div>

            <!-- Pesan Error -->
            @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Peringatan!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form class="form-horizontal m-t-20" action="{{ route('v1.form.login') }}" method="post">
                @csrf
                <div class="row p-b-30">
                    <div class="col-12">
                        <!-- Email -->
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white"><i class="ti-email"></i></span>
                            </div>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email Address">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="text-right">
                            <a id="to-recover" href="javascript:void(0)">Lupa Password?</a>
                        </div>
                    </div>
                </div>

                <div class="row border-top border-secondary p-t-20">
                    <div class="col-12">
                        <button class="btn btn-login btn-block shadow" type="submit">LOGIN</button>
                    </div>
                </div>

                <div class="row m-t-20">
                    <div class="col-12 text-center">
                        <p>Belum punya akun? <a href="{{ route('v1.form.register') }}" class="btn-register">Daftar Sekarang</a></p>
                    </div>
                </div>
            </form>
        </div>

        <!-- Form Recover Password (Tetap Ada) -->
        <div id="recoverform" style="display:none;">
            <div class="text-center">
                <span class="text-dark">Masukkan email Anda untuk mereset password.</span>
            </div>
            <div class="row m-t-20">
                <form class="col-12" action="#">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger text-white"><i class="ti-email"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" placeholder="Email Address">
                    </div>
                    <div class="row m-t-20 p-t-20 border-top border-secondary">
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-success" id="to-login" type="button">Kembali Login</button>
                            <button class="btn btn-info" type="button">Kirim Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- All Required js --> 
    <!-- ============================================================== --> 
    <script src="{{ asset('backend/matrix-admin-master/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/matrix-admin-master/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/matrix-admin-master/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== --> 
    <!-- This page plugin js --> 
    <!-- ============================================================== --> 
    <script> 
        $('[data-toggle="tooltip"]').tooltip(); 
        $(".preloader").fadeOut(); 
        // ==============================================================  
        // Login and Recover Password  
        // ==============================================================  
        $('#to-recover').on("click", function() { 
            $("#loginform").slideUp(); 
            $("#recoverform").fadeIn(); 
        }); 
        $('#to-login').click(function() { 
 
            $("#recoverform").hide(); 
            $("#loginform").fadeIn(); 
        }); 
    </script> 


</body>

