@extends('backend.v_layouts.app')
@section('content')

<!-- contentAwal -->
<div class="row">
    <div class="col-12">

        <!-- Tombol Tambah -->
        <a href="{{ route('backend.user.create') }}" class="mb-3 d-inline-block">
            <button type="button" class="btn btn-warning text-dark shadow-sm">
                <i class="fas fa-plus"></i> Tambah User
            </button>
        </a>

        <!-- Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <!-- Judul -->
                <h5 class="card-title fw-bold text-warning mb-3 text-center">
                    🤖 {{ $judul }}
                </h5>

                <!-- Tabel -->
                <div class="table-responsive">
                    <table id="zero_config"
                        class="table table-striped table-hover align-middle text-center">

                        <thead class="table-warning">
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($index as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->email }}</td>
                                <td class="fw-semibold">{{ $row->nama }}</td>

                                <!-- Role -->
                                <td>
                                    @if ($row->role == \App\Models\User::SUPERADMIN)
                                        <span class="badge bg-warning text-dark px-3">Super Admin</span>
                                    @elseif ($row->role == \App\Models\User::ADMIN)
                                        <span class="badge bg-success text-dark border px-3">Admin</span>
                                    @elseif ($row->role == \App\Models\User::STAFF)
                                        <span class="badge bg-light text-dark px-3">Staff</span>
                                    @elseif ($row->role == \App\Models\User::MANAGER)
                                        <span class="badge bg-secondary text-white px-3">Manager</span>
                                    @endif
                                </td>


                                <!-- Status -->
                                <td>
                                    @if ($row->status == 1)
                                        <span class="badge bg-success px-3">
                                            Aktif
                                        </span>
                                    @elseif($row->status == 0)
                                        <span class="badge bg-secondary px-3">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                <!-- Aksi -->
                                <td>
                                    <a href="{{ route('backend.user.edit', $row->id) }}"
                                        title="Ubah Data">
                                        <button type="button"
                                            class="btn btn-outline-warning btn-sm">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>

                                    <form method="POST"
                                        action="{{ route('backend.user.destroy', $row->id) }}"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm show_confirm"
                                            data-konf-delete="{{ $row->nama }}"
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
