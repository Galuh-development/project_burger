@extends('backend.v_layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <!-- Judul -->
                    <h4 class="fw-bold text-warning mb-4">
                        Detail Produk
                    </h4>

                    <div class="row">

                        <!-- KIRI -->
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kategori</label>
                                <input type="text"
                                    class="form-control"
                                    value="{{ $show->kategori->nama_kategori }}"
                                    disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Produk</label>
                                <input type="text"
                                    class="form-control"
                                    value="{{ $show->nama_produk }}"
                                    disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Detail</label>
                                <div class="form-control bg-light" style="min-height:120px">
    {!! $show->detail !!}
</div>

                            </div>

                        </div>

                        <!-- KANAN -->
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Foto Utama</label>
                                <div class="border rounded p-2 bg-light text-center">
                                    <img src="{{ asset('storage/img-produk/' . $show->foto) }}"
                                        class="img-fluid rounded"
                                        style="max-height:250px;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Foto Tambahan</label>
                                <div class="row g-2">
                                    @foreach ($show->fotoProduk as $foto)
                                        <div class="col-4 text-center">
                                            <img src="{{ asset('storage/img-produk/' . $foto->foto) }}"
                                                class="img-fluid rounded mb-1"
                                                style="height:80px; object-fit:cover;">
                                            <form action="{{ route('backend.foto-produk.destroy', $foto->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tambah Foto -->
                            <div id="foto-container" class="mt-2"></div>
                            <button type="button"
                                class="btn btn-warning text-dark btn-sm add-foto">
                                + Tambah Foto
                            </button>

                        </div>

                    </div>

                </div>

                <!-- Footer -->
                <div class="border-top">
                    <div class="card-body text-end">
                        <a href="{{ route('backend.produk.index') }}"
                            class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fotoContainer = document.getElementById('foto-container');
    const addFotoButton = document.querySelector('.add-foto');

    addFotoButton.addEventListener('click', function () {
        fotoContainer.innerHTML = `
            <form action="{{ route('backend.foto-produk.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    <input type="hidden" name="produk_id" value="{{ $show->id }}">

    <div class="form-group">
        <label>Tambah Foto Produk</label>
        <input type="file" name="fotoProduk[]" multiple class="form-control" required>
    </div>

    <button type="submit" class="btn btn-warning mt-2">
        Upload Foto
    </button>
</form>


        `;
    });
});
</script>
