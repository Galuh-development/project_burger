<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo brgr.png') }}">
    <title>Burger Queen</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/matrix-admin-master/assets/extra-libs/multicheck/multicheck.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/matrix-admin-master/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/matrix-admin-master/dist/css/style.min.css') }}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    /* --- CUSTOM BACKEND YELLOW THEME --- */

/* Hover pada item dropdown user */
.user-dd .dropdown-item:hover {
    background: #ffc107 !important;
    color: #212529 !important;
}

/* Warna ikon saat di-hover */
.user-dd .dropdown-item:hover i {
    color: #212529 !important;
}

/* Jika ada sidebar atau nav-link yang aktif/hover */
.navbar-nav .nav-link:hover {
    color: #ffc107 !important;
}

/* Warna divider agar senada */
.dropdown-divider {
    border-top: 1px solid #eee;
}

/* Khusus tombol logout agar tetap tegas tapi kuning saat hover */
.user-dd .dropdown-item.text-danger:hover {
    background: #dc3545 !important; /* Tetap merah pas logout biar alert */
    color: #fff !important;
}
.sidebar-link {
    background-color: transparent !important;
    transition: none !important;
}

.sidebar-link.active {
    background-color: #ffc107 !important;
    color: ##212529;
}

.sidebar-link.has-arrow {
    background-color: transparent !important;
    color: ##212529;
}

.sidebar-link.has-arrow[aria-expanded="true"] {
    background-color: transparent !important;
    color: ##212529;
}
.sidebar-link.has-arrow {
    background-color: transparent !important;
}

.sidebar-link.has-arrow[aria-expanded="true"] {
    background-color: transparent !important;
}


</style>

</head>

<body> 
    <!-- ============================================================== --> 
    <!-- Preloader - style you can find in spinners.css --> 
    <!-- ============================================================== --> 
    <div class="preloader"> 
        <div class="lds-ripple"> 
            <div class="lds-pos"></div> 
            <div class="lds-pos"></div> 
        </div> 
    </div> 
    <!-- ============================================================== --> 
    <!-- Main wrapper - style you can find in pages.scss --> 
    <!-- ============================================================== --> 
    <div id="main-wrapper"> 
        <!-- ============================================================== --> 
        <!-- Topbar header - style you can find in pages.scss --> 
        <!-- ============================================================== --> 
        <header class="topbar" data-navbarbg="skin5"> 
            <nav class="navbar top-navbar navbar-expand-md navbar-dark"> 
                <div class="navbar-header" data-logobg="skin5"> 
                    <!-- This is for the sidebar toggle which is visible on mobile only --> 
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a> 
                    <!-- ============================================================== --> 
                    <!-- Logo --> 
                    <!-- ============================================================== --> 
                    <a class="navbar-brand text-center" href="{{ route('v1.backend.beranda.index') }}"> 
                        <!-- Logo icon --> 
                        
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //--> 
                            <!-- Dark Logo icon --> 
                        <img src="{{ asset('images/logo brgr.png') }}" alt="homepage" class="light-logo mx-auto d-block" width="70">
                        <div class="small fw-bold text-warning text-center mt-1">My Burger Queen</div>
                        
                        <!--End Logo icon --> 
                        <!-- Logo text --> 
                         
                        <!-- Logo icon --> 
                        <!-- <b class="logo-icon"> --> 
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //--> 
                        <!-- Dark Logo icon --> 
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> --> 

                        <!-- </b> --> 
                        <!--End Logo icon --> 
                    </a> 
<!-- ============================================================== --> 
                    <!-- End Logo --> 
                    <!-- ============================================================== --> 
                    <!-- ============================================================== --> 
                    <!-- Toggle which is visible on mobile only --> 
                    <!-- ============================================================== --> 
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a> 
                </div> 
                <!-- ============================================================== --> 
                <!-- End Logo --> 
                <!-- ============================================================== --> 
                <div class="navbar-collapse " id="navbarSupportedContent" > 
                    <!-- ============================================================== --> 
                    <!-- toggle and nav items --> 
                    <!-- ============================================================== --> 
                    <ul class="navbar-nav float-left mr-auto"> 
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li> 
                        <!-- ============================================================== --> 
                        <!-- create new --> 
                        <!-- ============================================================== --> 
 
                        <!-- ============================================================== --> 
                        <!-- Search --> 
                        <!-- ============================================================== --> 
                    </ul> 
                    <!-- ============================================================== --> 
                    <!-- Right side toggle and nav items --> 
                    <!-- ============================================================== --> 
                    <ul class="navbar-nav float-right"> 
                        <!-- ============================================================== --> 
                        <!-- Comment --> 
                        <!-- ============================================================== --> 
 
                        <!-- ============================================================== --> 
                        <!-- End Comment --> 
                        <!-- ============================================================== --> 
                        <!-- ============================================================== --> 
                        <!-- Messages --> 
                        <!-- ============================================================== --> 
 
                        <!-- ============================================================== --> 
                        <!-- End Messages --> 
                        <!-- ============================================================== --> 
 
                        <!-- ============================================================== --> 
                        <!-- User profile and search --> 
                        <!-- ============================================================== --> 
                        <li class="nav-item dropdown"> 
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                @if (Auth::user()->foto) 
                                <img src="{{ asset('storage/img-user/' . Auth::user()->foto) }}" alt="user" class="rounded-circle" width="31"> 
                                @else 
                                <img src="{{ asset('storage/img-user/img-default.jpg') }}" alt="user" class="rounded-circle" width="31"> 
                                @endif 
                            </a> 
                            <div class="dropdown-menu dropdown-menu-right user-dd animated"> 
    <a class="dropdown-item" href="{{ route('v1.backend.user.edit', Auth::user()->id) }}">
        <i class="ti-user m-r-5 m-l-5"></i> Profil Saya
    </a> 

    <!-- Link Keluar -->
    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('keluar-app').submit();">
        <i class="fa fa-power-off m-r-5 m-l-5"></i> Keluar
    </a> 

    <!-- Form Logout Tersembunyi (WAJIB ADA) -->
    <form id="keluar-app" action="{{ route('v1.form.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="dropdown-divider"></div> 
</div> 
                        </li>
                        <!-- ============================================================== --> 
                        <!-- User profile and search --> 
                        <!-- ============================================================== --> 
                    </ul> 
                </div> 
            </nav> 
    </header> 
        <!-- ============================================================== --> 
        <!-- End Topbar header --> 
        <!-- ============================================================== --> 
        <!-- ============================================================== --> 
        <!-- Left Sidebar - style you can find in sidebar.scss  --> 
        <!-- ============================================================== --> 
        <aside class="left-sidebar" data-sidebarbg="skin5"> 
            <!-- Sidebar scroll--> 
            <div class="scroll-sidebar"> 
                <!-- Sidebar navigation--> 
                <nav class="sidebar-nav"> 
                    <ul id="sidebarnav" class="p-t-30"> 
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('v1.backend.beranda.index') ? 'active' : '' }}" href="{{ route('v1.backend.beranda.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span></a> 
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('v1.backend.user.index') ? 'active' : '' }}" href="{{ route('v1.backend.user.index') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User</span></a> 
                        </li>  
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-shopping"></i><span class="hide-menu">Data Produk </span></a> 
                            <ul aria-expanded="false" class="collapse  first-level">  
                                <li class="sidebar-item"><a href="{{ route('v1.backend.kategori.index') }}" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Kategori </span></a> </li> 
                                <li class="sidebar-item"><a href="{{ route('v1.backend.produk.index') }}" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Produk </span></a> </li>
            
                            </ul> 
                        </li> 
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark " href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan </span></a> 
                            <ul aria-expanded="false" class="collapse  first-level"> 
                                <li class="sidebar-item"><a href="{{ route('v1.backend.laporan.user.form') }}" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> User </span></a></li> 
                                <li class="sidebar-item"><a href="{{ route('v1.backend.laporan.produk.form') }}" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Produk </span></a></li> 
                            </ul> 
                        </li> 
                    </ul> 
                </nav> 
                <!-- End Sidebar navigation --> 
            </div> 
            <!-- End Sidebar scroll-->
        </aside> 
        <!-- ============================================================== --> 
        <!-- End Left Sidebar - style you can find in sidebar.scss  --> 
        <!-- ============================================================== --> 
        <!-- ============================================================== --> 
        <!-- Page wrapper  --> 
        <!-- ============================================================== --> 
        <div class="page-wrapper"> 
            <!-- ============================================================== --> 
            <!-- Bread crumb and right sidebar toggle --> 
            <!-- ============================================================== --> 
            <!-- <div class="page-breadcrumb"> 
                <div class="row"> 
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <h4 class="page-title">Tables</h4> 
                        <div class="ml-auto text-right"> 
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb"> 
                                    <li class="breadcrumb-item"><a href="#">Home</a></li> 
                                    <li class="breadcrumb-item active" aria-current="page">Library</li> 
                                </ol> 
                            </nav> 
                        </div> 
                    </div> 
                </div> 
            </div>  -->
            <!-- ============================================================== --> 
            <!-- End Bread crumb and right sidebar toggle --> 
            <!-- ============================================================== --> 
            <!-- ============================================================== --> 
            <!-- Container fluid  --> 
            <!-- ============================================================== --> 
            <div class="container-fluid"> 
                <!-- ============================================================== --> 
                <!-- Start Page Content --> 
                <!-- ============================================================== --> 
        <!-- @yieldAwal --> 
                @yield('content') 
                <!-- @yieldAkhir--> 
                
                <!-- <div class="row"> 
                    <div class="col-12"> 
                        <div class="card"> 
                            <div class="card-body"> 
                                <h5 class="card-title">Basic Datatable</h5> 
                                <div class="table-responsive"> 
                                    
                                </div> 
 
                            </div> 
                        </div> 
                    </div> 
                </div>  -->
                <!-- ============================================================== --> 
                <!-- End PAge Content --> 
                <!-- ============================================================== --> 
                <!-- ============================================================== --> 
                <!-- Right sidebar --> 
                <!-- ============================================================== --> 
                <!-- .right-sidebar --> 
                <!-- ============================================================== --> 
                <!-- End Right sidebar --> 
                <!-- ============================================================== --> 
            </div> 
            <!-- ============================================================== --> 
            <!-- End Container fluid  --> 
            <!-- ============================================================== --> 
            <!-- ============================================================== --> 
            <!-- footer --> 
            <!-- ============================================================== --> 
            <footer class="footer text-center text-muted "> 
                © 2026 My Burger Queen - Admin Panel 
                <!-- <a href="https://bsi.ac.id/">Kuliah..? BSI Aja !!!</a>  -->
            </footer> 
            <!-- ============================================================== --> 
            <!-- End footer --> 
            <!-- ============================================================== --> 
        </div> 
        <!-- ============================================================== --> 
        <!-- End Page wrapper  --> 
        <!-- ============================================================== --> 
    </div> 
    <!-- ============================================================== --> 
    <!-- End Wrapper --> 
    <!-- ============================================================== --> 
    <!-- ============================================================== --> 
    <!-- All Jquery --> 
    <!-- ============================================================== --> 
    <script src="{{ asset('backend/matrix-admin-master/assets/libs/jquery/dist/jquery.min.js') }}"></script> 
    <!-- Bootstrap tether Core JavaScript --> 
    <script src="{{ asset('backend/matrix-admin-master/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script> 
    <script src="{{ asset('backend/matrix-admin-master/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script> 
    <!-- slimscrollbar scrollbar JavaScript --> 
    <script src="{{ asset('backend/matrix-admin-master/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script> 
    <script src="{{ asset('backend/matrix-admin-master/assets/extra-libs/sparkline/sparkline.js') }}"></script> 
    <!--Wave Effects --> 
    <script src="{{ asset('backend/matrix-admin-master/dist/js/waves.js') }}"></script> 
    <!--Menu sidebar --> 
    <script src="{{ asset('backend/matrix-admin-master/dist/js/sidebarmenu.js') }}"></script> 
    <!--Custom JavaScript --> 
    <script src="{{ asset('backend/matrix-admin-master/dist/js/custom.min.js') }}"></script> 
    <!-- this page js --> 
    <script src="{{ asset('backend/matrix-admin-master/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{ asset('backend/matrix-admin-master/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script> 
    <script src="{{ asset('backend/matrix-admin-master/assets/extra-libs/DataTables/datatables.min.js') }}"></script> 
    <script> 
        /**************************************** 
         *       Basic Table                   * 
         ****************************************/ 
        $('#zero_config').DataTable(); 
    </script> 

<!-- form keluar app --> 
<form id="keluar-app" action="{{ route('v1.form.logout') }}" method="POST" class="d
none"> 
@csrf 
</form> 

<!-- sweetalert --> 
<script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script> 
<!-- sweetalert End --> 
<!-- konfirmasi success--> 
@if (session('success')) 
<script> 
    Swal.fire({ 
        icon: 'success', 
        title: 'Berhasil!', 
        text: "{{ session('success') }}" 
    }); 
</script> 
@endif 

<script type="text/javascript"> 
        //Konfirmasi delete 
        $('.show_confirm').click(function(event) { 
            var form = $(this).closest("form"); 
            var konfdelete = $(this).data("konf-delete"); 
            event.preventDefault(); 
            Swal.fire({ 
                title: 'Konfirmasi Hapus Data?', 
                html: "Data yang dihapus <strong>" + konfdelete + "</strong> tidak dapat dikembalikan!", 
                icon: 'warning', 
                showCancelButton: true, 
                confirmButtonColor: '#3085d6', 
                cancelButtonColor: '#d33', 
                confirmButtonText: 'Ya, dihapus',
                cancelButtonText: 'Batal' 
            }).then((result) => { 
                if (result.isConfirmed) { 
                    Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success') 
                        .then(() => { 
                            form.submit(); 
                        }); 
                } 
            }); 
        }); 
</script> 
<script>
// previewFoto
    function previewFoto() 
    {
        const foto = document.querySelector('input[name="foto"]');
        const fotoPreview = document.querySelector('.foto-preview');
        fotoPreview.style.display = 'block';
        const fotoReader = new FileReader();
        fotoReader.readAsDataURL(foto.files[0]);
        fotoReader.onload = function(fototvent) 
        {
            fotoPreview.src = fotoEvent.target.result;
            fotoPreview.style.width = "100%";
        }
    }
</script>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> 
        <!-- <script 
        src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> --> 
        <script> 
        ClassicEditor 
        .create(document.querySelector('#ckeditor')) 
        .catch(error => { 
        console.error(error); 
        }); 
</script> 
<!-- konfirmasi success End-->
    <!-- form keluar app end --> 
</body> 
</html> 