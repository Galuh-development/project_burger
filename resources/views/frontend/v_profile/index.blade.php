@extends('frontend.v_layouts.app')
@section('content')

<section id="profile-view" class="profile section-bg" style="padding-top: 100px; padding-bottom: 60px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8"> {{-- Ukuran kolom yang pas di tengah --}}
                <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="card-body p-4 p-md-5 text-center">
                        <h4 class="fw-bold mb-4">Profil <span class="text-warning">Saya</span></h4>
                        
                        <div class="mb-4">
                            @if($user->foto)
                                <img src="{{ asset('storage/img-user/'.$user->foto) }}" class="rounded-circle border border-4 border-warning shadow-sm" width="130" height="130" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/img-user/img-default.jpg') }}" class="rounded-circle border border-4 border-warning shadow-sm" width="130" height="130">
                            @endif
                        </div>

                        <div class="text-start">
                            <div class="mb-3 border-bottom pb-2">
                                <label class="small text-muted d-block">Nama Lengkap</label>
                                <span class="fw-bold text-dark">{{ $user->nama }}</span>
                            </div>
                            <div class="mb-3 border-bottom pb-2">
                                <label class="small text-muted d-block">Alamat Email</label>
                                <span class="fw-bold text-dark">{{ $user->email }}</span>
                            </div>
                            <div class="mb-3 border-bottom pb-2">
                                <label class="small text-muted d-block">Nomor HP</label>
                                <span class="fw-bold text-dark">{{ $user->hp ?? '-' }}</span>
                            </div>
                            <div class="mb-3 border-bottom pb-2">
                                <label class="small text-muted d-block">Password</label>
                                <span class="text-muted small">******** (Terproteksi)</span>
                            </div>
                        </div>

                        <div class="mt-4 d-grid gap-2">
                            <a href="{{ route('v1.frontend.profile.edit') }}" class="btn btn-warning rounded-pill fw-bold">
                                <i class="bi bi-pencil-square me-2"></i> Edit Profil
                            </a>
                            <a href="{{ route('v1.frontend.beranda.index') }}" class="btn btn-light rounded-pill text-muted">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection