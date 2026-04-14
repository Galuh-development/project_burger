<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $judul }}</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #f4b400;
        }

        .header p {
            margin: 4px 0;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #f4b400;
            color: #000;
            padding: 8px;
            border: 1px solid #000;
            text-align: center;
        }

        table td {
            padding: 6px;
            border: 1px solid #000;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 30px;
            width: 100%;
        }

        .footer .ttd {
            float: right;
            text-align: center;
        }
    </style>
</head>
<body onload="window.print()">

    <!-- HEADER -->
    <div class="header">
        <h2>🍔 BURGER QUEEN</h2>
        <p>Laporan Data User</p>
        <p>
            Periode :
            {{ date('d-m-Y', strtotime($tanggalAwal)) }}
            s/d
            {{ date('d-m-Y', strtotime($tanggalAkhir)) }}
        </p>
    </div>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cetak as $row)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->email }}</td>
                    <td class="text-center">
                        @if ($row->role == \App\Models\User::SUPERADMIN)
                            Super Admin
                        @elseif ($row->role == \App\Models\User::ADMIN)
                            Admin
                        @elseif ($row->role == \App\Models\User::STAFF)
                            Staff
                        @elseif ($row->role == \App\Models\User::MANAGER)
                            Manager
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($row->status == 1)
                            Aktif
                        @elseif($row->status == 0)
                            NonAktif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Data user tidak ditemukan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        <div class="ttd">
            <p>{{ date('d F Y') }}</p>
            <br><br><br>
            <p><strong>Admin Burger Queen</strong></p>
        </div>
    </div>

</body>
</html>
