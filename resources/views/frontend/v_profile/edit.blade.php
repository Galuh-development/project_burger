@extends('frontend.v_layouts.app')
@section('content')

<section id="profile-edit" class="profile section-bg" style="padding-top: 100px; padding-bottom: 60px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="fw-bold mb-4 text-center">Update <span class="text-warning">Profil</span></h4>
                        
                        <form action="{{ route('v1.frontend.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control rounded-pill @error('nama') is-invalid @enderror" value="{{ old('nama', $user->nama) }}">
                                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control rounded-pill @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nomor HP</label>
                                    <input type="text" name="hp" class="form-control rounded-pill @error('hp') is-invalid @enderror" value="{{ old('hp', $user->hp) }}">
                                    @error('hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Password Baru <span class="text-muted fw-normal">(Kosongkan jika tidak ingin ganti)</span></label>
                                    <input type="password" name="password" class="form-control rounded-pill @error('password') is-invalid @enderror" placeholder="Kombinasi Huruf Besar, Kecil, Angka & Simbol">
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <div class="form-text small mt-1">Minimal 8 karakter dengan kombinasi simbol & angka.</div>
                                </div>
                                
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-bold">Foto Profil (Maks 1MB)</label>
                                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                                    <div class="form-text mt-1 text-muted small">Format: JPG, JPEG, PNG, GIF.</div>
                                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning rounded-pill fw-bold py-2">
                                    Simpan Perubahan
                                </button>
                                <a href="{{ route('v1.frontend.profile.index') }}" class="btn btn-outline-secondary rounded-pill">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection