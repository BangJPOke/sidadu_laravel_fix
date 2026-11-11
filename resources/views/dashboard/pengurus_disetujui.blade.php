
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengurus Disetujui | SIDADU AGAMA</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3f7f4;
            margin: 0;
            color: #263b30;
        }

        .navbar {
            background: linear-gradient(110deg, #14532d, #166534);
            color: white;
            padding: 17px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            box-shadow: 0 3px 12px rgba(0,0,0,.12);
        }

        .brand {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand small {
            display: block;
            color: #e9d38a;
            font-size: 11px;
            letter-spacing: 2px;
            margin-top: 3px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .role {
            font-size: 12px;
            color: #f4e4ae;
            font-weight: 700;
        }

        .btn-logout {
            background: #fff;
            color: #166534;
            border: none;
            padding: 9px 16px;
            border-radius: 7px;
            font-weight: 700;
            cursor: pointer;
        }

        .main {
            max-width: 1250px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .welcome {
            background: linear-gradient(120deg, #166534, #21834b);
            color: white;
            padding: 27px 30px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 7px 20px rgba(22,101,52,.13);
            position: relative;
            overflow: hidden;
        }

        .welcome h1 {
            margin: 0 0 9px;
            font-size: 25px;
        }

        .welcome p {
            margin: 0;
            color: #e4f3e8;
            line-height: 1.6;
        }

        .gold-line {
            width: 65px;
            height: 4px;
            background: #e5c46b;
            border-radius: 5px;
            margin-top: 17px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 18px rgba(0,0,0,.05);
            border: 1px solid #e7eee8;
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 10px;
        }

        .card h2 {
            color: #185b35;
            font-size: 20px;
            margin: 0;
        }

        .description {
            color: #718078;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin: 15px 0;
            font-size: 14px;
        }

        .alert-success {
            background: #e1f4e6;
            color: #176534;
            border: 1px solid #b9e3c4;
        }

        .alert-error {
            background: #fff0ef;
            color: #a52a2a;
            border: 1px solid #f1c5c2;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
        }

        th {
            background: #176238;
            color: white;
            padding: 14px 12px;
            text-align: left;
            font-size: 13px;
            white-space: nowrap;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #e8eee9;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f6faf7;
        }

        .status {
            display: inline-block;
            background: #e0f3e5;
            color: #176534;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .nominal {
            font-weight: 800;
            color: #176534;
            white-space: nowrap;
        }

        .btn-detail {
            display: inline-block;
            text-decoration: none;
            background: #fff7df;
            color: #87620b;
            border: 1px solid #ead28b;
            padding: 8px 11px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
            white-space: nowrap;
        }

        .btn-detail:hover {
            background: #f8e9b9;
        }

        .btn-cairkan {
            background: #176534;
            color: white;
            border: none;
            padding: 9px 12px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .btn-cairkan:hover {
            background: #104725;
        }

        .bottom-navigation {
            margin-top: 22px;
        }

        .btn-kembali {
            display: inline-block;
            background: #edf5ef;
            color: #176534;
            text-decoration: none;
            padding: 10px 17px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid #d4e6d8;
        }

        .btn-kembali:hover {
            background: #dceee0;
        }

        .empty {
            text-align: center;
            color: #7b8980;
            padding: 35px !important;
        }

        .footer {
            text-align: center;
            padding: 25px 15px;
            color: #829087;
            font-size: 12px;
            margin-top: 35px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 15px 18px;
            }

            .main {
                margin: 22px auto;
                padding: 0 12px;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .card {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <div class="brand">
        SIDADU AGAMA
        <small>SISTEM INFORMASI PENDATAAN TERPADU KEAGAMAAN</small>
    </div>

    <div class="nav-right">
        <span class="role">BAGIAN KESRA</span>

        <form action="{{ url('/logout') }}" method="POST"
              onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
            @csrf
            <button type="submit" class="btn-logout">↪ Logout</button>
        </form>
    </div>
</header>

<main class="main">

    <section class="welcome">
        <h1>Data Pengurus Disetujui</h1>
        <p>
            Kelola data pengurus masjid yang telah diverifikasi oleh Admin Kecamatan.
            Periksa dokumen dan proses pencairan insentif sesuai ketentuan.
        </p>
        <div class="gold-line"></div>
    </section>

    <section class="card">

        <div class="card-heading">
            <h2>Daftar Pengurus Masjid</h2>
        </div>

        <p class="description">
            Berikut daftar pengurus yang telah disetujui oleh Admin Kecamatan.
        </p>

        @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengurus</th>
                        <th>NIK</th>
                        <th>Masjid</th>
                        <th>Desa</th>
                        <th>Peran</th>
                        <th>Nominal Insentif</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pengurus as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->nama_lengkap }}</strong></td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->masjid->nama_masjid ?? '-' }}</td>
                            <td>{{ $item->masjid->desa->nama_desa ?? '-' }}</td>
                            <td>{{ $item->peran }}</td>

                            <td class="nominal">
                                Rp {{ number_format((float) $item->nominal_insentif, 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="status">{{ $item->status }}</span>
                            </td>

                            <td>
                                <a class="btn-detail"
                                   href="{{ url('/bagian-kesra/pengurus/'.$item->id.'/detail') }}">
                                    Periksa Dokumen
                                </a>

                                <form method="POST"
                                      action="{{ url('/bagian-kesra/pengurus/'.$item->id.'/cairkan') }}"
                                      onsubmit="return confirm('Apakah insentif pengurus ini benar-benar sudah dicairkan?');">
                                    @csrf
                                    <button type="submit" class="btn-cairkan">
                                        Cairkan Insentif
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty">
                                Belum ada pengurus yang disetujui.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bottom-navigation">
            <a class="btn-kembali" href="{{ url('/dashboard/bagian-kesra') }}">
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
