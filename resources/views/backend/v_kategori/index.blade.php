@extends('backend.v_layouts.app')
@section('content')

<!-- contentAwal -->
<div class="row">
    <div class="col-12">

        <!-- Tombol Tambah -->
        <a href="{{ route('backend.kategori.create') }}" class="mb-3 d-inline-block">
            <button type="button" class="btn btn-warning text-dark shadow-sm">
                <i class="fas fa-plus"></i> Tambah Kategori
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
                                <th style="width: 80px;">No</th>
                                <th>Nama Kategori</th>
                                <th style="width: 160px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($index as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-semibold text-start ps-4">
                                    {{ $row->nama_kategori }}
                                </td>

                                <!-- Aksi -->
                                <td>
                                    <a href="{{ route('backend.kategori.edit', $row->id) }}"
                                        title="Ubah Data">
                                        <button type="button"
                                            class="btn btn-outline-warning btn-sm">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>

                                    <form method="POST"
                                        action="{{ route('backend.kategori.destroy', $row->id) }}"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm show_confirm"
                                            data-konf-delete="{{ $row->nama_kategori }}"
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
