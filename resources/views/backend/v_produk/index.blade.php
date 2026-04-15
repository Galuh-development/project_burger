@extends('backend.v_layouts.app')
@section('content')

<!-- contentAwal -->
<div class="row">
    <div class="col-12">

        <!-- Tombol Tambah -->
        <a href="{{ route('backend.produk.create') }}" class="mb-3 d-inline-block">
            <button type="button" class="btn btn-warning text-dark shadow-sm">
                <i class="fas fa-plus"></i> Tambah Produk
            </button>
        </a>

        <!-- Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <!-- Judul -->
                <h5 class="card-title fw-bold text-warning mb-3 text-center">
                    🍔 {{ $judul }}
                </h5>

                <!-- Tabel -->
                <div class="table-responsive">
                    <table id="zero_config"
                        class="table table-striped table-hover align-middle text-center">

                        <thead class="table-warning">
                            <tr>
                                <th style="width:60px;">No</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th style="width:200px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($index as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <!-- Kategori -->
                                <td class="fw-semibold">
                                    {{ $row->kategori->nama_kategori }}
                                </td>

                                <!-- Status -->
                                <td>
                                    @if ($row->status == 1)
                                        <span class="badge bg-success px-3">
                                            Publish
                                        </span>
                                    @elseif ($row->status == 0)
                                        <span class="text-warning px-3">
                                            Blok
                                        </span>
                                    @endif
                                </td>

                                <!-- Nama Produk -->
                                <td class="text-start fw-semibold">
                                    {{ $row->nama_produk }}
                                </td>

                                <!-- Harga -->
                                <td class="text-nowrap">
                                    Rp {{ number_format($row->harga, 0, ',', '.') }}
                                </td>

                                <!-- Stok -->
                                <td>
                                    <span class="fw-bold">{{ $row->stok }}</span>
                                </td>

                                <!-- Aksi -->
                                <td>
                                    <a href="{{ route('backend.produk.edit', $row->id) }}"
                                       title="Ubah Data">
                                        <button type="button"
                                            class="btn btn-outline-warning btn-sm">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>

                                    <a href="{{ route('backend.produk.show', $row) }}"
                                       title="Kelola Gambar">
                                        <button type="button"
                                            class="btn btn-outline-info btn-sm">
                                            <i class="fas fa-image"></i>
                                        </button>
                                    </a>

                                    <form method="POST"
                                        action="{{ route('backend.produk.destroy', $row->id) }}"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm show_confirm"
                                            data-konf-delete="{{ $row->nama_produk }}"
                                            title="Hapus Data">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- contentAkhir -->

@endsection
