<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan Pengurus | SIDADU AGAMA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f7f5;
            color: #263b32;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(120deg, #075b43, #087653);
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.10);
        }

        .brand {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand span {
            display: block;
            color: #e7c66b;
            font-size: 11px;
            letter-spacing: 2px;
            margin-top: 5px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .role-label {
            font-size: 12px;
            font-weight: bold;
            color: #f4df9c;
        }

        .nav-menu form {
            margin: 0;
        }

        .btn-logout {
            background: white;
            color: #bd3c32;
            border: 1px solid #f0c8c4;
            padding: 9px 16px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h2 {
            color: #075b43;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #718078;
            font-size: 14px;
        }

        .content-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.06);
            border-top: 4px solid #d5ad48;
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        .card-heading h3 {
            color: #075b43;
            font-size: 18px;
        }

        .total {
            background: #e8f4ed;
            color: #087653;
            padding: 8px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .alert-success {
            background: #e6f5eb;
            color: #17683a;
            border: 1px solid #c5e6d0;
            border-radius: 9px;
            padding: 13px 16px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #075b43;
            color: white;
            padding: 15px 13px;
            text-align: left;
            font-size: 12px;
            white-space: nowrap;
        }

        td {
            padding: 14px 13px;
            border-bottom: 1px solid #edf1ee;
            font-size: 13px;
            color: #52645a;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f7fbf8;
        }

        .number {
            text-align: center;
            width: 55px;
        }

        .name {
            color: #245b43;
            font-weight: bold;
        }

        .nik {
            white-space: nowrap;
            font-size: 12px;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status.Menunggu {
            background: #fff2cc;
            color: #856404;
        }

        .status.Disetujui {
            background: #d9f2e1;
            color: #17683a;
        }

        .status.Ditolak {
            background: #fde2e0;
            color: #a52d27;
        }

        .status.Dicairkan {
            background: #dceff3;
            color: #176274;
        }

        /* Styling Tombol Aksi */
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            background: #ffc107;
            color: #333;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-edit:hover {
            background: #e0a800;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .text-muted {
            color: #999;
            font-style: italic;
            font-size: 12px;
            white-space: nowrap;
        }

        .empty-state {
            text-align: center;
            padding: 45px 20px;
            color: #87958c;
        }

        .empty-state .symbol {
            font-size: 35px;
            margin-bottom: 12px;
        }

        .empty-state strong {
            display: block;
            color: #315344;
            margin-bottom: 7px;
        }

        .navigation {
            margin-top: 22px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-back {
            background: #087653;
            color: white;
        }

        .btn-back:hover {
            background: #075b43;
        }

        .footer {
            text-align: center;
            padding: 25px 15px;
            color: #89958e;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 17px 5%;
            }

            .container {
                margin-top: 25px;
            }

            .welcome h2 {
                font-size: 21px;
            }

            .content-card {
                padding: 18px 14px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="brand">
            SIDADU AGAMA
            <span>SISTEM INFORMASI PENDATAAN TERPADU KEAGAMAAN</span>
        </div>

        <div class="nav-menu">
            <div class="role-label">OPERATOR DESA</div>

            <form action="{{ url('/logout') }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
                @csrf
                <button type="submit" class="btn-logout">↪ Logout</button>
            </form>
        </div>
    </header>

    <main class="container">

        <div class="welcome">
            <h2>Riwayat Pengajuan Pengurus Masjid</h2>
            <p>
                Selamat datang, {{ $user->nama_lengkap }}.
                Pantau perkembangan pengajuan data pengurus masjid Anda.
            </p>
        </div>

        <section class="content-card">

            <div class="card-heading">
    <h3>Daftar Riwayat Pengajuan</h3>

    <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">

        <div class="total">
            Total Pengajuan: {{ $pengurus->count() }}
        </div>

        <a href="{{ route('operator-desa.pengurus.pdf') }}"
           style="
               display: inline-block;
               background: #087653;
               color: white;
               padding: 9px 15px;
               border-radius: 8px;
               text-decoration: none;
               font-size: 12px;
               font-weight: bold;
           ">
            ↓ Download PDF
        </a>

    </div>
</div>

            @if(session('success'))
                <div class="alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th class="number">No.</th>
                            <th>Nama Pengurus</th>
                            <th>NIK</th>
                            <th>Nama Masjid</th>
                            <th>Status Pengajuan</th>
                            <th>Catatan Penolakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pengurus as $item)
                            <tr>
                                <td class="number">{{ $loop->iteration }}</td>

                                <td class="name">
                                    {{ $item->nama_lengkap }}
                                </td>

                                <td class="nik">
                                    {{ $item->nik }}
                                </td>

                                <td>
                                    {{ $item->masjid->nama_masjid ?? '-' }}
                                </td>

                                <td>
                                    <span class="status {{ $item->status }}">
                                        {{ $item->status }}
                                    </span>
                                </td>

                                <td>
                                    {{ $item->catatan_penolakan ?: '-' }}
                                </td>

                                <!-- Perbaikan Struktur Kolom Aksi -->
                                <td>
                                    @if ($item->status === 'Menunggu')
                                        <div class="action-buttons">
                                            <a href="{{ url('/operator-desa/pengurus/' . $item->id . '/edit') }}" class="btn-edit">
                                                Edit
                                            </a>

                                            <form action="{{ url('/operator-desa/pengurus/' . $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data pengurus ini?')" style="margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-muted">
                                            Sudah diverifikasi
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="symbol">📋</div>
                                        <strong>Belum Ada Pengajuan</strong>
                                        Belum ada data pengurus masjid yang didaftarkan.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="navigation">
                <a href="{{ url('/dashboard/operator-desa') }}" class="btn btn-back">
                    ← Kembali ke Dashboard
                </a>
            </div>

        </section>

    </main>

    <footer class="footer">
        © {{ date('Y') }} SIDADU AGAMA | BangJP
    </footer>

</body>
</html>