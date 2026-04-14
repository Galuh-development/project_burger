@extends('backend.v_layouts.app')
@section('content')

<div class="container-fluid p-4" 
     >

    <div class="text-center">

        <!-- HEADER IMAGE -->
        <img src="{{ asset('images/menu.png') }}"
             alt="Burger Queen"
             class="img-fluid hover-zoom"
             style="width: 500px; height: auto; border-radius: 10px; object-fit: cover;">

        <h1 class="fw-bold text-warning mt-3 mb-1" style="font-size: 2.5rem;">Burger Queen</h1>
        <p class="text-muted fst-italic mb-4" style="font-size:1rem;">
            Dashboard Sistem Manajemen Toko Online
        </p>

        <!-- WELCOME TEXT (tanpa card) -->
        <div class="mx-auto" style="max-width: 700px; padding: 15px;">
            <h3 class="fw-bold mb-2">
                Selamat Datang, <span class="text-warning">{{ Auth::user()->nama }}</span>
            </h3>

            <p class="mb-2">
                Anda masuk sebagai 
                <span class="badge px-3 py-1 fw-semibold"
                      style="background-color:
                        @if(Auth::user()->role == \App\Models\User::SUPERADMIN) #f4b400
                        @elseif(Auth::user()->role == \App\Models\User::ADMIN) #ff7043
                        @elseif(Auth::user()->role == \App\Models\User::STAFF) #26a69a
                        @elseif(Auth::user()->role == \App\Models\User::MANAGER) #42a5f5
                        @endif; color:#fff; border-radius: 12px;">
                    @if (Auth::user()->role == \App\Models\User::SUPERADMIN) Super Admin
                    @elseif (Auth::user()->role == \App\Models\User::ADMIN) Admin
                    @elseif (Auth::user()->role == \App\Models\User::STAFF) Staff
                    @elseif (Auth::user()->role == \App\Models\User::MANAGER) Manager
                    @endif
                </span>
            </p>

            <p class="text-muted mb-0" style="line-height:1.5;">
                Halaman beranda ini berfungsi sebagai pusat informasi awal aplikasi <span class="fw-bold">Burger Queen</span>. Gunakan menu di sisi kiri untuk mengelola data pengguna, produk, kategori, dan laporan.
            </p>
        </div>

        <!-- FOOTER -->

    </div>

</div>

<!-- HOVER ZOOM EFFECT -->
<style>
.hover-zoom {
    transition: transform 0.35s ease;
}
.hover-zoom:hover {
    transform: scale(1.08);
}
</style>

@endsection
